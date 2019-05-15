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
        private uint userId
        {
            get
            {
                return (uint)userIdUpDown.Value;
            }
        }

        private byte subId = 0;

        private string tData = "";


        #endregion
        #region Methods


        public UserForm()
        {
            InitializeComponent();

            init();
        }

        private void init()
        {
            prepare();

            bindEvents();
        }

        /// <summary>
        /// Bind Events
        /// </summary>
        private void bindEvents()
        {
            enrollButton.Click += enrollButton_Click;
            searchButton.Click += SearchButton_Click;
        }

        private void SearchButton_Click(object sender, EventArgs e)
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


                    //userIdTextBox.Text =
                    //    personResponseData.user_id.ToString();

                    //nameTextBox.Text =
                    //    personResponseData.people_name;

                    //lastnameTextBox.Text =
                    //    personResponseData.people_lastname;

                    //natioalcodeTextBox.Text =
                    //    personResponseData.people_nationalId;

                    //stateUserTextBox.Text =
                    //    personResponseData.user_state == 1 ? "کاربر فعال" : "کاربر غیرفعال";

                    //codeTextBox.Text =
                    //    personResponseData.user_code;

                    //groupComboBox.SelectedValue =
                    //    personResponseData.group_id;

                    //cardTypeComboBox.SelectedValue =
                    //    personResponseData.card_type_id ?? -1;

                    //cdnTextBox.Text =
                    //    personResponseData.card_cdn;

                    //stateCheckBox.Checked =
                    //    personResponseData.card_state == 1 ? true : false;

                    //dateTextBox.Text = cardDate;
                }
                else
                {
                    ClearPanels(dataGroupBox);
                    MessageBox.Show("کد وارد شده نامعتبر می باشد", "اخطار", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                }
            }
            catch (Exception ex)
            {
                LoggerExtensions.log(ex);
            }
        }

        private void enrollButton_Click(object sender, EventArgs e)
        {
            string msg =
                $"{FP.FingerPrintController.C_ENROLL}" +
                    $"{FP.FingerPrintController.C_SEPARATOR}{devicesComboBox.Text}" +
                    $"{FP.FingerPrintController.C_SEPARATOR}{userId}" +
                    $"{FP.FingerPrintController.C_SEPARATOR}{subId}";

            write(client,
                   msg);
        }

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

        private void log(string msg)
        {
            this.Invoke(new Action(() =>
            {

                string[] data = msg.Split(FP.FingerPrintController.C_SEPARATOR);

                if (data[0] == FingerPrintController.FingerPrintController.C_DEVICES_LIST)
                {
                    devicesComboBox.Items.Clear();

                    devicesComboBox.Items.AddRange(data);
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
