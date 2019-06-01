using BaseDAL.Model;
using SuprimaProgram.Helper;
using SuprimaProgram.Helper.Enum;
using SuprimaProgram.Model;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Configuration;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Net.Sockets;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

using FP = FingerPrintController;

namespace SuprimaProgram.Forms
{
    public partial class IdentifyForm : Form
    {

        #region Variable

        private TcpClient client = null;

        private PersonModel personResult = null;

        private ComboDataModel dataResult = null;
        private int finger_image_quality = 0;
        private int finger_user_id = 0;
        private int? user_id = 0;

        private ImageLoader imageLoader;

        private EnumReceiveMode receiveMode = EnumReceiveMode.TEXT;

        private Thread connectThread = null;

        //private uint userId
        //{
        //    get
        //    {
        //        return (uint)userIdUpDown.Value;
        //    }
        //}

        private byte subId = 0;

        private string tData = "";


        #endregion


        #region Methods

        public IdentifyForm()
        {
            InitializeComponent();

            init();
        }

        /// <summary>
        /// Initilizer
        /// </summary>
        private void init()
        {
            updateUi();

            prepare();

            bindEvents();
        }

        private void bindEvents()
        {
            mainTabControl.SelectedIndexChanged += mainTabControl_SelectedIndexChanged;
            showButton.Click += showButton_Click;
            previousButton.Click += previousButton_Click;
        }

        private void mainTabControl_SelectedIndexChanged(object sender, EventArgs e)
        {
            updateUi();
        }



        /// <summary>
        /// Prepare
        /// </summary>
        private void prepare()
        {
            try
            {
                connectThread?.Abort();

            }
            finally
            {
                connectThread = null;
            }

            client = new TcpClient();
            string ip_client = ConfigurationManager.AppSettings["client"].ToString();
            int port_client = Convert.ToInt32(ConfigurationManager.AppSettings["port"]);
            client.Connect(ip_client, port_client);



            connectThread = new Thread(() =>
            {
                while (client?.Connected == true)
                {
                    byte[] data = new byte[1024];

                    try
                    {
                        int len = client.GetStream()
                                        .Read(data,
                                               0,
                                               data.Length);

                        if (len == 0)
                        {
                            return;
                        }

                        byte[] pureData = new byte[len];


                        Array.Copy(data,
                                    pureData,
                                    len);

                        log(pureData);
                    }
                    catch (Exception ex)
                    {
                        log(ex.Message);
                    }
                }

            });

            connectThread.Start();

            write(client, FP.FingerPrintController.C_DEVICES_LIST);
        }

        /// <summary>
        /// Write to TCPClient
        /// </summary>
        /// <param name="client"></param>
        /// <param name="msg"></param>
        private void write(TcpClient client, string msg)
        {
            byte[] data = System.Text.Encoding.UTF8.GetBytes(msg);

            client.GetStream()
                .Write(data,
                        0,
                        data.Length);
        }

        /// <summary>
        /// Update UI
        /// </summary>
        private void updateUi()
        {
            int step = mainTabControl.SelectedIndex;
            int count = mainTabControl.TabPages.Count;
            //(step > count -1)
            previousButton.Visible = (step > 0);
            showButton.Visible = (step < count - 1);
            //finishButton.Visible = (step == count - 1);
        }

        /// <summary>
        /// Previous Button
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>

        private void previousButton_Click(object sender, EventArgs e)
        {
            int step = 0;
            step = mainTabControl.SelectedIndex;
            // Get step
            previouseStep(step);
        }

        /// <summary>
        /// Select previous step
        /// </summary>
        /// <param name="step"></param>
        private void previouseStep(int step)
        {
            if (--step > -1)
                mainTabControl.SelectedIndex = step;
        }

        /// <summary>
        /// Next Button
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void showButton_Click(object sender, EventArgs e)
        {
            int step = 0;

            // Get step
            step = mainTabControl.SelectedIndex;


            switch (step)
            {
                case 0:
                    {
                        if (devicesComboBox.Text != null)
                        {
                            identify();
                        }
                        else
                        {
                            MessageBox.Show("لطفا نام دستگاه را انتخاب نمایید", "خطا", MessageBoxButtons.OK);
                        }
                      
                        
                        enableTab(viewTabPage, true);
                    }
                    break;
             

                default:
                    break;
            }

            nextStep(step);
          
            
        }

        /// <summary>
        /// Identify
        /// </summary>
        private void identify()
        {

            receiveMode = EnumReceiveMode.TEXT;

            string msg =
               $"{FP.FingerPrintController.C_IDENTIFY}" +
               $"{FP.FingerPrintController.C_SEPARATOR}" +
               $"{devicesComboBox.Text}";

            write(client,
                   msg);

            //loadData();
        }
        /// <summary>
        /// Load Data by finger_user_id
        /// </summary>
        private async void loadData()
        {
            try
            {
                DateTime nextYear = DateTime.Now.nextYear();

                RestfulHelper restfulHelper = new RestfulHelper(HttpClientData.baseUrl);

                personResult = await restfulHelper.requestLoadByFingerprintById(finger_user_id, 
                                                                                "/api/get-fingerprint-by-user-id");

                if (personResult.success.Length > 0)
                {
                    PersonResponseData personResponseData = personResult.success[0] ?? null;

                    user_id = personResponseData.user_id;

                    nameTextBox.Text =
                        personResponseData.people_name;

                    lastnameTextBox.Text =
                        personResponseData.people_lastname;

                    codeTextBox.Text =
                        personResponseData.user_code;

                    int finger_user_id = personResponseData.fingerprint_user_id ?? 0;

                    fingerUserIdTextBox.Text = finger_user_id.ToString();


                   

                    if (personResponseData.fingerprint_image != null)
                    {
                        fingerprintUserPictureBox.Image = imageLoader.byteArrayToImage(personResponseData.fingerprint_image);

                    }
                    else
                        fingerprintUserPictureBox.Image = SuprimaProgram.Properties.Resources.image_placeholder;


                }
                else
                {
                    MessageBox.Show("کد وارد شده نامعتبر می باشد", "اخطار", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                }
            }
            catch (Exception ex)
            {
                LoggerExtensions.log(ex);
                MessageBox.Show("error exception");
            }
        }

        /// <summary>
        /// Enable Tab
        /// </summary>
        /// <param name="page"></param>
        /// <param name="enable"></param>
        public void enableTab(TabPage page, bool enable)
        {
            enableControls(page.Controls, enable);
        }

        /// <summary>
        /// Enable Controls
        /// </summary>
        /// <param name="ctls"></param>
        /// <param name="enable"></param>
        private static void enableControls(Control.ControlCollection ctls, bool enable)
        {
            foreach (Control ctl in ctls)
            {
                ctl.Enabled = enable;
                enableControls(ctl.Controls, enable);
            }
        }

        /// <summary>
        /// Select next step
        /// </summary>
        /// <param name="step"></param>
        private void nextStep(int step)
        {
            if (step == mainTabControl.TabPages.Count - 1)
            {
                CloseSuccess();
            }
            else if (++step < mainTabControl.TabPages.Count)
                mainTabControl.SelectedIndex = step;
        }

        private void CloseSuccess()
        {
            DialogResult = System.Windows.Forms.DialogResult.OK;
            Close();
        }

        /// <summary>
        /// Log Message
        /// </summary>
        /// <param name="msg"></param>
        private void log(string msg)
        {
            //this.Invoke(new Action(() =>
            //{
            //    //logListBox.Items.Insert(0,
            //                        msg);

            string[] data = msg.Split(FP.FingerPrintController.C_SEPARATOR);

            if (data[0] == FingerPrintController.FingerPrintController.C_DEVICES_LIST)
            {
                devicesComboBox.Items.Clear();

                devicesComboBox.Items.AddRange(data);

                devicesComboBox.SelectedIndex = 1;
            }

            else if (data[0] == FingerPrintController.FingerPrintController.C_READ_TEMPLATE)
            {
                tData = data[3];
            }

            else if (data[0] == FingerPrintController.FingerPrintController.C_IDENTIFY_TEMPLATE)
            {
            }

            else if (data[0] == FingerPrintController.FingerPrintController.C_READ_IMAGE)
            {
                //picFinger.Image = Image.FromHbitmap(data[1]);
            }

            else if (data[0] == FingerPrintController.FingerPrintController.C_IDENTIFY)
            {
                this.Invoke(new Action(() =>
                {
                    finger_user_id = Convert.ToInt32(data[1]);
                    //finger_image_quality = Convert.ToInt32(data[2]);
                    fingerprintUserIdTextBox.Text = data[1];

                }));
            }
        }

        /// <summary>
        /// Load Combo fingerprint device 
        /// </summary>
        /// <param name="msg"></param>
        private void log(byte[] data)
        {
            // Parse data
            string str = System.Text.Encoding.UTF8.GetString(data);


            if (str.StartsWith(FP.FingerPrintController.C_BEGIN_IMAGE))
            {
                receiveMode = EnumReceiveMode.IMAGE;

                string[] subData = str.Split('\t');

                int size = Convert.ToInt32(subData[1]);

                imageLoader = new ImageLoader(size);
            }
            else if (str.StartsWith(FP.FingerPrintController.C_END_IMAGE))
            {
                //identifyPictureBox.Image = null;
                identifyPictureBox.Image = imageLoader?.toBitmap();

                receiveMode = EnumReceiveMode.TEXT;
            }
            else
            {
                if (receiveMode == EnumReceiveMode.IMAGE)
                {
                    imageLoader?.addBytes(data);
                }
                else
                {
                    log(str);
                }
            }

        }




        #endregion
    }
}
