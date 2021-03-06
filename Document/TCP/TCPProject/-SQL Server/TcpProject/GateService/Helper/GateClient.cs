﻿using BaseDAL.Model;
using Common.BLL.Entity.IAU;
using Common.BLL.Logic.IAU;
using Common.Enum;
using Common.Model;
using Common.Network.Core;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Diagnostics;
using System.Linq;
using System.Text;
using System.Threading;

namespace GateService.Helper
{
	/// <summary>
	/// Gate Client
	/// </summary>
	public class GateClient
	{
		#region Events
		public event Common.Network.Core.NetTcpClient.Connect onConnect;
		public event Common.Network.Core.NetTcpClient.Disconnect onDisconnect;
		public event Common.Network.Core.NetTcpClient.ReceiveData onReceiveData;
		public event Common.Network.Core.NetTcpClient.SendData onSendData;
		public event Common.Network.Core.NetTcpClient.Error onError;
		#endregion

		#region Variables
		private ManualResetEvent msr;
		private Thread connectorThread, writeThread;
		private TimeSpan _connectorInterval, _writeInterval;
		private NetTcpClient tcpClient;
		private int index = 0, countConnect = 0 ;

        private const string sendDataInput = "[53011]";
        private const string sendDataDonotInput = "[53010]";

        private const string sendDataOutput = "[54011]";
        private const string sendDataDonotOutput = "[54010]";
        #endregion

        #region Properties
        /// <summary>
        /// Connect interval
        /// </summary>		
        public TimeSpan connectorInterval
		{
			get
			{
				if (null == _connectorInterval)
					_connectorInterval = new TimeSpan (0, 0, 15);

				return _connectorInterval;
			}
			set
			{
				_connectorInterval = value;
			}
		}

		/// <summary>
		/// Write Interval
		/// </summary>		 
		public TimeSpan writeInterval
		{
			get
			{
				if (null == _writeInterval)
					_writeInterval = new TimeSpan (0, 0, 10);

				return _writeInterval;
			}
			set
			{
				_writeInterval = value;
			}
		}

		#endregion

		#region Methods
        /// <summary>
        /// 
        /// </summary>
        /// <param name="host"></param>
        /// <param name="port"></param>
        /// <param name="bufferSize"></param>
		public GateClient (string host, int port, int bufferSize)
		{
			#region Pars Args
			try
			{
				connectorInterval	= TimeSpan.Parse(ConfigurationManager.AppSettings["Interval"]);
				writeInterval		= TimeSpan.Parse(ConfigurationManager.AppSettings["writeInterval"]);
				countConnect		= int.Parse( ConfigurationManager.AppSettings["countConnect"]);
				//connectorInterval = new TimeSpan (0, 0, 30);
				//writeInterval = new TimeSpan (0, 2, 0);

				msr = new ManualResetEvent (false);
			
				tcpClient = new NetTcpClient (host, port, bufferSize);

				tcpClient.onConnect			+= tcpClient_onConnect;
				tcpClient.onDisconnect		+= tcpClient_onDisconnect;
				tcpClient.onError			+= tcpClient_onError;
				tcpClient.onReceiveData		+= tcpClient_onReceiveData;
				tcpClient.onSendData		+= tcpClient_onSendData;
			}
			catch (Exception ex)
			{
                LoggerExtension.log(ex);
			}
			#endregion			
		}

		/// <summary>
		/// On Send data
		/// </summary>
		/// <param name="sender"></param>
		/// <param name="data"></param>
		void tcpClient_onSendData (NetTcpClient sender, CommandResult data)
		{
			if (null != onSendData)
				onSendData (sender, data);
		}

		/// <summary>
		/// OnError
		/// </summary>
		/// <param name="sender"></param>
		/// <param name="data"></param>
		void tcpClient_onError (NetTcpClient sender, CommandResult data)
		{
			if (null != onError)
			{
				onError (sender, data);


				if (null != writeThread)
					writeThread.Abort();
				index ++;
			}

			///TODO : PARSE ERROR
			if (data.id == 999)
			{
				if (index < countConnect)
				{ 
					tryToConnect ();
					if (msr.WaitOne ())
						connect ();
				}				
			}
		}

		/// <summary>
		/// OnDisConnect
		/// </summary>
		/// <param name="sender"></param>
		void tcpClient_onDisconnect (NetTcpClient sender)
		{
			if (null != onDisconnect)
			{
				onDisconnect (sender);

				if (null != writeThread)
					writeThread.Abort();
			}
		}

		/// <summary>
		/// On Connect
		/// </summary>
		/// <param name="sender"></param>
		void tcpClient_onConnect (NetTcpClient sender)
		{
			if (null != onConnect)
			{				
				onConnect (sender);	
				tryToWriteData ();
			}
        }		

		/// <summary>
		/// Parse recieved data
		/// </summary>
		/// <param name="sender"></param>
		/// <param name="data"></param>
		void tcpClient_onReceiveData (Common.Network.Core.NetTcpClient sender, CommandResult data)
		{
			if (null != onReceiveData)
				onReceiveData (sender, data);

			parseData (sender, data);
		}

		/// <summary>
		/// Connect
		/// </summary>
		/// <param name="sender"></param>
		/// <param name="e"></param>
		public void connect ()
		{			
			tcpClient.connect ();
		}

		/// <summary>
		/// Disconnect
		/// </summary>
		/// <param name="sender"></param>
		/// <param name="e"></param>
		public void disconnect ()
		{
			tcpClient.disconnect ();
		}

		/// <summary>
		/// Write data
		/// </summary>
		/// <param name="data"></param>
		public void write (string data)
		{
			try
			{
				tcpClient.write (data, Encoding.UTF8);
			}
			catch (Exception ex)
			{				
                LoggerExtension.log(ex);
            }
        }

		/// <summary>
		/// Try to connect
		/// </summary>
		private void tryToConnect ()
		{
			msr.Reset ();

			connectorThread = new Thread (new ThreadStart (() =>
			{
				try
				{
					Thread.Sleep (connectorInterval);
					msr.Set ();
				}
				catch (Exception ex)
				{
                    LoggerExtension.log(ex);
                }
			}));
			connectorThread.Start ();
		}

		/// <summary>
		/// Try to write data
		/// </summary>
		private void tryToWriteData ()
		{
			writeThread = new Thread (new ThreadStart (() =>
			{
				try
				{
					while (true)
					{
						Thread.Sleep (writeInterval);
						write ("[5000]");
					}
				}
				catch (Exception ex)
				{
                    LoggerExtension.log(ex);
                }
			}));
			writeThread.Start ();
		}

        /// <summary>
        /// Parse data
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="data"></param>
        /// 

        private void parseData(Common.Network.Core.NetTcpClient sender, CommandResult data)
        {
            try
            {
                if ((null != data) && (null != data.model))
                {
                    string cmd = Encoding.UTF8.GetString(data.model as byte[]);

                    #region traffic done or dont done


                    // Pass output
                    if (cmd.ToLower().StartsWith("[6401") && cmd.ToLower().EndsWith("]"))
                    {
                        int passStatus = (int)(Int64.Parse(cmd.Substring(5, 1), System.Globalization.NumberStyles.HexNumber));
                        gitLog.saveLogUserPass(sender.host, passStatus == 0 ? false : true);
                    }


                    // Pass Input
                    if (cmd.ToLower().StartsWith("[6301") && cmd.ToLower().EndsWith("]"))
                    {
                        int passStatus = (int)(Int64.Parse(cmd.Substring(5, 1), System.Globalization.NumberStyles.HexNumber));
                        gitLog.saveLogUserPass(sender.host, passStatus == 0 ? false : true);
                    }

                    #endregion


                    if (cmd.ToLower().StartsWith("[5308") && cmd.ToLower().Length == 14 && cmd.ToLower().StartsWith("[") && cmd.ToLower().EndsWith("]"))
                    {
                        RegisterData((int)EnumDirection.input, sender, cmd);
                    }
                    else if (cmd.ToLower().StartsWith("[5408") && cmd.ToLower().Length == 14 && cmd.ToLower().StartsWith("[") && cmd.ToLower().EndsWith("]"))
                    {
                        RegisterData((int)EnumDirection.output, sender, cmd);
                    }
                }
            }
            catch (Exception ex)
            {

                LoggerExtension.log(ex);
            }
            
        }

        /// <summary>
        /// Register Data
        /// </summary>
        /// <param name="typeGateDirect"></param>
        /// <param name="sender"></param>
        /// <param name="cmd"></param>

        private void RegisterData(int typeGateDirect, NetTcpClient sender, string cmd)
        {
            try
            {
                device _host = new device();

                string kart = Convert.ToString((Int64.Parse(cmd.Substring(5, 8), System.Globalization.NumberStyles.HexNumber)));

                //set direction gate by code kart
                if (typeGateDirect == (int)EnumDirection.input)
                    _host = gitDevice.GetDevice(sender.host, (int)EnumDirection.input);

                else if (typeGateDirect == (int)EnumDirection.output)
                    _host = gitDevice.GetDevice(sender.host, (int)EnumDirection.output);


                option _option = gitOption._infoOption;
                user user = gitUser.GetUser(kart, sender.host);

                if (null != user)
                {
                    gitUser._lstUser.Add(user);

                    int result = gitLog.kartLicense(sender.host, kart, _host, _option);

                    switch (result)
                    {
                        case 2:
                            {
                                if (typeGateDirect == (int)EnumDirection.input)
                                    write(sendDataInput);
                                else if (typeGateDirect == (int)EnumDirection.output)
                                    write(sendDataOutput);
                            }
                            break;
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                        case 7:
                        case 8:
                        case 9:
                        case 10:
                        case 11:
                        case 15:
                            {
                                if (typeGateDirect == (int)EnumDirection.input)
                                    write(sendDataDonotInput);
                                else if (typeGateDirect == (int)EnumDirection.output)
                                    write(sendDataDonotOutput);

                                gitUser.removeUser(kart);
                            }
                            break;
                    }

                    ListInfo.removeKart(sender.host);
                }
                else
                {
                    if (typeGateDirect == (int)EnumDirection.input)
                        write(sendDataDonotInput);
                    else if (typeGateDirect == (int)EnumDirection.output)
                        write(sendDataDonotOutput);

                    gitLog.kartUnkown(sender.host, _host, _option);
                }
            }
            catch (Exception ex)
            {

                LoggerExtension.log(ex);
            }
            

        }

        #endregion
    }
}
	
		
	

