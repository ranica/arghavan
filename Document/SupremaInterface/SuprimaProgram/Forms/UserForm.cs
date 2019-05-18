using BaseDAL.Model;
using Newtonsoft.Json;
using SuprimaProgram.Helper;
using SuprimaProgram.Model;
using System;
using System.Collections.Generic;
using System.ComponentModel;
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
    public partial class UserForm : Form
    {

        #region Variable

        private TcpClient client = null;
        private PersonModel personResult = null;
        private ComboDataModel dataResult = null;

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


        public UserForm()
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

        /// <summary>
        /// Bind Events
        /// </summary>
        private void bindEvents()
        {
            enrollButton.Click                  += enrollButton_Click;
            nextButton.Click                    += nextButton_Click;
            previousButton.Click                += previousButton_Click;
            finishButton.Click                  += finishButton_Click;
            mainTabControl.SelectedIndexChanged += MainTabControl_SelectedIndexChanged;
        }

        /// <summary>
        /// Prepare
        /// </summary>
        private void prepare()
        {
            client = new TcpClient();
            client.Connect("127.0.0.1", 10000);

            Thread thread = new Thread(() =>
            {
                while (client?.Connected == true)
                {
                    byte[] data = new byte[1024];

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

                    log(System.Text.Encoding.UTF8.GetString(pureData));
                }
            });

            thread.Start();

            write(client, FP.FingerPrintController.C_DEVICES_LIST);
        }


        /// <summary>
        /// Load Combo fingerprint device 
        /// </summary>
        /// <param name="msg"></param>
        private void log(string msg)
        {
            this.Invoke(new Action(() =>
            {

                string[] data = msg.Split(FP.FingerPrintController.C_SEPARATOR);

                if (data[0] == FingerPrintController.FingerPrintController.C_DEVICES_LIST)
                {
                    devicesComboBox.Items.Clear();

                    devicesComboBox.Items.AddRange(data);

                    reloadGroupCombo();

                }
                else if (data[0] == FingerPrintController.FingerPrintController.C_READ_TEMPLATE)
                {
                    //tData = data[3];
                }
                else if (data[0] == FingerPrintController.FingerPrintController.C_IDENTIFY_TEMPLATE)
                {
                }
            }));
        }

        private void MainTabControl_SelectedIndexChanged(object sender, EventArgs e)
        {
            updateUi();
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
            nextButton.Visible = (step < count - 1);
            finishButton.Visible = (step == count - 1);
        }

        /// <summary>
        /// Reload Group ComboBox 
        /// </summary>
        private async void reloadGroupCombo()
        {
            #region ComboBox GroupComboBox
           
            RestfulHelper restfulHelper = new RestfulHelper(HttpClientData.baseUrl);
            string resultContent = await restfulHelper.request("/api/get-data");


            dataResult = JsonConvert.DeserializeObject<Model.ComboDataModel>(resultContent);

            this.Invoke(new Action(() =>
            {
                groupComboBox.DisplayMember = "name";
                groupComboBox.ValueMember = "id";
                groupComboBox.DataSource = dataResult.successGroup;

            }));


            #endregion
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
        private void nextButton_Click(object sender, EventArgs e)
        {
            int step = 0;
            CommandResult opResult = null;

            // Get step
            step = mainTabControl.SelectedIndex;

            // Validate step
            opResult = validate(step);

            if (opResult.status == BaseDAL.Base.EnumCommandStatus.success)
            {
                switch (step)
                {
                    case 0:
                        {
                            // Fill Search Data
                            string data = searchTextBox.Text.Trim();
                            loadData(data);
                            enableTab(viewTabPage, true);
                        }
                        break;
                    case 1:
                        {
                            // view info usr
                            enableTab(fingerprintTabPage, true);
                        }
                        break;

                   

                    default:
                        break;
                }

                nextStep(step);
            }

            else
                MessageBox.Show(opResult.model.ToString(), "اخطار", MessageBoxButtons.OK, MessageBoxIcon.Warning);
        }

        /// <summary>
        /// Load Data by code , nationalId
        /// </summary>
        /// <param name="data"></param>
        private async void loadData(string data)
        {
            try
            {
                DateTime nextYear = DateTime.Now.nextYear();

                RestfulHelper restfulHelper = new RestfulHelper(HttpClientData.baseUrl);

                personResult = await restfulHelper.requestSearch(searchTextBox.Text.Trim(), "/api/search-user");

                if (personResult.success.Length > 0)
                {
                    PersonResponseData personResponseData = personResult.success[0] ?? null;


                    if (personResponseData.card_endDate.HasValue)
                    {
                        nextYear = personResponseData.card_endDate.Value;
                    }

                    String cardDate = ExtensionsDateTime.toPersianDate(nextYear);


                    //codeTextBox.Text =
                    //    personResponseData.user_id.ToString();

                    nameTextBox.Text =
                        personResponseData.people_name;

                    lastnameTextBox.Text =
                        personResponseData.people_lastname;

                    natioalcodeTextBox.Text =
                        personResponseData.people_nationalId;

                    //stateUserTextBox.Text =
                    //    personResponseData.user_state == 1 ? "کاربر فعال" : "کاربر غیرفعال";

                    codeTextBox.Text =
                        personResponseData.user_code;

                    groupComboBox.SelectedValue =
                        personResponseData.group_id;

                }
                else
                {
                    MessageBox.Show("کد وارد شده نامعتبر می باشد", "اخطار", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                }
            }
            catch (Exception ex)
            {
                LoggerExtensions.log(ex);
            }
        }

        /// <summary>
        /// Finish Button
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void finishButton_Click(object sender, EventArgs e)
        {
            CloseSuccess();
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

        /// <summary>
		/// Close Form
		/// </summary>
		private void CloseSuccess()
        {
            DialogResult = System.Windows.Forms.DialogResult.OK;
            Close();
        }

        /// <summary>
        /// Check search data
        /// </summary>
        /// <param name="step"></param>
        /// <returns></returns>
        private CommandResult validate(int step)
        {
            CommandResult result;
            string data = searchTextBox.Text.Trim();

            if (data.isNullOrEmptyOrWhiteSpaceOrLen(10))
                result = CommandResult.makeErrorResult("ERROR", "کد کاربری وارد شده نامعتبر است");
            else
                result = CommandResult.makeSuccessResult("OK");

            return result;
        }

        /// <summary>
        /// Enroll Button
        /// </summary>
        /// <param name="sender"></param>
        /// <param name="e"></param>
        private void enrollButton_Click(object sender, EventArgs e)
        {
            string msg =
                $"{FP.FingerPrintController.C_ENROLL}" +
                    $"{FP.FingerPrintController.C_SEPARATOR}{devicesComboBox.Text}" +
                    $"{FP.FingerPrintController.C_SEPARATOR}{0}" +
                    $"{FP.FingerPrintController.C_SEPARATOR}{subId}";

            write(client,
                   msg);
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

        #endregion
    }
}
