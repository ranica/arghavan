namespace SuprimaProgram.Forms
{
    partial class IdentifyForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.mainTabControl = new System.Windows.Forms.TabControl();
            this.identifyTabPage = new System.Windows.Forms.TabPage();
            this.viewTabPage = new System.Windows.Forms.TabPage();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.label4 = new System.Windows.Forms.Label();
            this.devicesComboBox = new System.Windows.Forms.ComboBox();
            this.detailGroupBox = new System.Windows.Forms.GroupBox();
            this.label13 = new System.Windows.Forms.Label();
            this.qualityFingerTextBox = new System.Windows.Forms.TextBox();
            this.label12 = new System.Windows.Forms.Label();
            this.lastnameTextBox = new System.Windows.Forms.TextBox();
            this.label11 = new System.Windows.Forms.Label();
            this.nameTextBox = new System.Windows.Forms.TextBox();
            this.label9 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.fingerUserIdTextBox = new System.Windows.Forms.TextBox();
            this.codeTextBox = new System.Windows.Forms.TextBox();
            this.fingerprintUserPictureBox = new System.Windows.Forms.PictureBox();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.label14 = new System.Windows.Forms.Label();
            this.fingerprintUserIdTextBox = new System.Windows.Forms.TextBox();
            this.identifyPictureBox = new System.Windows.Forms.PictureBox();
            this.showButton = new System.Windows.Forms.Button();
            this.previousButton = new System.Windows.Forms.Button();
            this.mainTabControl.SuspendLayout();
            this.identifyTabPage.SuspendLayout();
            this.viewTabPage.SuspendLayout();
            this.groupBox1.SuspendLayout();
            this.detailGroupBox.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.fingerprintUserPictureBox)).BeginInit();
            this.groupBox2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.identifyPictureBox)).BeginInit();
            this.SuspendLayout();
            // 
            // mainTabControl
            // 
            this.mainTabControl.Controls.Add(this.identifyTabPage);
            this.mainTabControl.Controls.Add(this.viewTabPage);
            this.mainTabControl.Location = new System.Drawing.Point(8, 10);
            this.mainTabControl.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.mainTabControl.Name = "mainTabControl";
            this.mainTabControl.RightToLeft = System.Windows.Forms.RightToLeft.Yes;
            this.mainTabControl.RightToLeftLayout = true;
            this.mainTabControl.SelectedIndex = 0;
            this.mainTabControl.Size = new System.Drawing.Size(590, 344);
            this.mainTabControl.TabIndex = 0;
            // 
            // identifyTabPage
            // 
            this.identifyTabPage.Controls.Add(this.groupBox1);
            this.identifyTabPage.Location = new System.Drawing.Point(4, 26);
            this.identifyTabPage.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.identifyTabPage.Name = "identifyTabPage";
            this.identifyTabPage.Padding = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.identifyTabPage.Size = new System.Drawing.Size(582, 314);
            this.identifyTabPage.TabIndex = 0;
            this.identifyTabPage.Text = "تشخیص اثرانگشت";
            this.identifyTabPage.UseVisualStyleBackColor = true;
            // 
            // viewTabPage
            // 
            this.viewTabPage.Controls.Add(this.groupBox2);
            this.viewTabPage.Controls.Add(this.detailGroupBox);
            this.viewTabPage.Location = new System.Drawing.Point(4, 26);
            this.viewTabPage.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.viewTabPage.Name = "viewTabPage";
            this.viewTabPage.Padding = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.viewTabPage.Size = new System.Drawing.Size(582, 314);
            this.viewTabPage.TabIndex = 1;
            this.viewTabPage.Text = "نمایش اطلاعات";
            this.viewTabPage.UseVisualStyleBackColor = true;
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.label4);
            this.groupBox1.Controls.Add(this.devicesComboBox);
            this.groupBox1.Location = new System.Drawing.Point(6, 20);
            this.groupBox1.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Padding = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.groupBox1.Size = new System.Drawing.Size(530, 284);
            this.groupBox1.TabIndex = 0;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "تشخیص اثرانگشت";
            // 
            // label4
            // 
            this.label4.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(390, 43);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(123, 17);
            this.label4.TabIndex = 2;
            this.label4.Text = "نام دستگاه را انتخاب نمایید";
            // 
            // devicesComboBox
            // 
            this.devicesComboBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.devicesComboBox.FormattingEnabled = true;
            this.devicesComboBox.Location = new System.Drawing.Point(256, 75);
            this.devicesComboBox.Margin = new System.Windows.Forms.Padding(4, 7, 4, 7);
            this.devicesComboBox.Name = "devicesComboBox";
            this.devicesComboBox.Size = new System.Drawing.Size(254, 25);
            this.devicesComboBox.TabIndex = 3;
            // 
            // detailGroupBox
            // 
            this.detailGroupBox.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.detailGroupBox.Controls.Add(this.label13);
            this.detailGroupBox.Controls.Add(this.qualityFingerTextBox);
            this.detailGroupBox.Controls.Add(this.label12);
            this.detailGroupBox.Controls.Add(this.lastnameTextBox);
            this.detailGroupBox.Controls.Add(this.label11);
            this.detailGroupBox.Controls.Add(this.nameTextBox);
            this.detailGroupBox.Controls.Add(this.label9);
            this.detailGroupBox.Controls.Add(this.label7);
            this.detailGroupBox.Controls.Add(this.fingerUserIdTextBox);
            this.detailGroupBox.Controls.Add(this.codeTextBox);
            this.detailGroupBox.Controls.Add(this.fingerprintUserPictureBox);
            this.detailGroupBox.Font = new System.Drawing.Font("B Yekan", 7.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.detailGroupBox.Location = new System.Drawing.Point(6, 7);
            this.detailGroupBox.Name = "detailGroupBox";
            this.detailGroupBox.Size = new System.Drawing.Size(356, 297);
            this.detailGroupBox.TabIndex = 1;
            this.detailGroupBox.TabStop = false;
            this.detailGroupBox.Text = "مشخصات ثبت شده";
            // 
            // label13
            // 
            this.label13.AutoSize = true;
            this.label13.Location = new System.Drawing.Point(269, 235);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(76, 17);
            this.label13.TabIndex = 48;
            this.label13.Text = "کیفیت ثبت شده";
            // 
            // qualityFingerTextBox
            // 
            this.qualityFingerTextBox.Enabled = false;
            this.qualityFingerTextBox.Font = new System.Drawing.Font("B Yekan", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.qualityFingerTextBox.Location = new System.Drawing.Point(166, 261);
            this.qualityFingerTextBox.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.qualityFingerTextBox.Name = "qualityFingerTextBox";
            this.qualityFingerTextBox.Size = new System.Drawing.Size(175, 26);
            this.qualityFingerTextBox.TabIndex = 47;
            this.qualityFingerTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(285, 129);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(60, 17);
            this.label12.TabIndex = 46;
            this.label12.Text = "نام خانوادگی";
            // 
            // lastnameTextBox
            // 
            this.lastnameTextBox.Enabled = false;
            this.lastnameTextBox.Font = new System.Drawing.Font("B Yekan", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.lastnameTextBox.Location = new System.Drawing.Point(166, 151);
            this.lastnameTextBox.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.lastnameTextBox.Name = "lastnameTextBox";
            this.lastnameTextBox.Size = new System.Drawing.Size(176, 26);
            this.lastnameTextBox.TabIndex = 45;
            this.lastnameTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Location = new System.Drawing.Point(322, 74);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(23, 17);
            this.label11.TabIndex = 44;
            this.label11.Text = "نام ";
            // 
            // nameTextBox
            // 
            this.nameTextBox.Enabled = false;
            this.nameTextBox.Font = new System.Drawing.Font("B Yekan", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.nameTextBox.Location = new System.Drawing.Point(166, 95);
            this.nameTextBox.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.nameTextBox.Name = "nameTextBox";
            this.nameTextBox.Size = new System.Drawing.Size(176, 26);
            this.nameTextBox.TabIndex = 43;
            this.nameTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(240, 183);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(104, 17);
            this.label9.TabIndex = 42;
            this.label9.Text = "کد اثرانگشت ثبت شده";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(268, 21);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(77, 17);
            this.label7.TabIndex = 41;
            this.label7.Text = "شماره دانشجویی";
            // 
            // fingerUserIdTextBox
            // 
            this.fingerUserIdTextBox.Enabled = false;
            this.fingerUserIdTextBox.Font = new System.Drawing.Font("B Yekan", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.fingerUserIdTextBox.Location = new System.Drawing.Point(166, 204);
            this.fingerUserIdTextBox.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.fingerUserIdTextBox.Name = "fingerUserIdTextBox";
            this.fingerUserIdTextBox.Size = new System.Drawing.Size(175, 26);
            this.fingerUserIdTextBox.TabIndex = 40;
            this.fingerUserIdTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // codeTextBox
            // 
            this.codeTextBox.Enabled = false;
            this.codeTextBox.Font = new System.Drawing.Font("B Yekan", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.codeTextBox.Location = new System.Drawing.Point(166, 44);
            this.codeTextBox.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.codeTextBox.Name = "codeTextBox";
            this.codeTextBox.Size = new System.Drawing.Size(176, 26);
            this.codeTextBox.TabIndex = 39;
            this.codeTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // fingerprintUserPictureBox
            // 
            this.fingerprintUserPictureBox.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.fingerprintUserPictureBox.Image = global::SuprimaProgram.Properties.Resources.image_placeholder;
            this.fingerprintUserPictureBox.Location = new System.Drawing.Point(7, 44);
            this.fingerprintUserPictureBox.Margin = new System.Windows.Forms.Padding(4, 7, 4, 7);
            this.fingerprintUserPictureBox.Name = "fingerprintUserPictureBox";
            this.fingerprintUserPictureBox.Size = new System.Drawing.Size(148, 201);
            this.fingerprintUserPictureBox.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.fingerprintUserPictureBox.TabIndex = 38;
            this.fingerprintUserPictureBox.TabStop = false;
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.label14);
            this.groupBox2.Controls.Add(this.fingerprintUserIdTextBox);
            this.groupBox2.Controls.Add(this.identifyPictureBox);
            this.groupBox2.Location = new System.Drawing.Point(368, 7);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Size = new System.Drawing.Size(202, 297);
            this.groupBox2.TabIndex = 50;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "اطلاعات دریافتی";
            // 
            // label14
            // 
            this.label14.AutoSize = true;
            this.label14.Location = new System.Drawing.Point(78, 21);
            this.label14.Name = "label14";
            this.label14.Size = new System.Drawing.Size(63, 17);
            this.label14.TabIndex = 51;
            this.label14.Text = "کد اثرانگشت";
            // 
            // fingerprintUserIdTextBox
            // 
            this.fingerprintUserIdTextBox.Enabled = false;
            this.fingerprintUserIdTextBox.Font = new System.Drawing.Font("B Yekan", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.fingerprintUserIdTextBox.Location = new System.Drawing.Point(16, 44);
            this.fingerprintUserIdTextBox.Name = "fingerprintUserIdTextBox";
            this.fingerprintUserIdTextBox.Size = new System.Drawing.Size(175, 26);
            this.fingerprintUserIdTextBox.TabIndex = 50;
            this.fingerprintUserIdTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // identifyPictureBox
            // 
            this.identifyPictureBox.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.identifyPictureBox.Image = global::SuprimaProgram.Properties.Resources.image_placeholder;
            this.identifyPictureBox.Location = new System.Drawing.Point(30, 78);
            this.identifyPictureBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.identifyPictureBox.Name = "identifyPictureBox";
            this.identifyPictureBox.Size = new System.Drawing.Size(146, 178);
            this.identifyPictureBox.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.identifyPictureBox.TabIndex = 49;
            this.identifyPictureBox.TabStop = false;
            // 
            // showButton
            // 
            this.showButton.Location = new System.Drawing.Point(12, 357);
            this.showButton.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.showButton.Name = "showButton";
            this.showButton.Size = new System.Drawing.Size(100, 39);
            this.showButton.TabIndex = 5;
            this.showButton.Text = "نمایش";
            this.showButton.UseVisualStyleBackColor = true;
            // 
            // previousButton
            // 
            this.previousButton.Location = new System.Drawing.Point(498, 357);
            this.previousButton.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.previousButton.Name = "previousButton";
            this.previousButton.Size = new System.Drawing.Size(100, 39);
            this.previousButton.TabIndex = 4;
            this.previousButton.Text = "قبلی";
            this.previousButton.UseVisualStyleBackColor = true;
            // 
            // IdentifyForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 17F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(604, 399);
            this.Controls.Add(this.showButton);
            this.Controls.Add(this.previousButton);
            this.Controls.Add(this.mainTabControl);
            this.Font = new System.Drawing.Font("B Yekan", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.Name = "IdentifyForm";
            this.Text = "تشخیص اثرانگشت";
            this.mainTabControl.ResumeLayout(false);
            this.identifyTabPage.ResumeLayout(false);
            this.viewTabPage.ResumeLayout(false);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.detailGroupBox.ResumeLayout(false);
            this.detailGroupBox.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.fingerprintUserPictureBox)).EndInit();
            this.groupBox2.ResumeLayout(false);
            this.groupBox2.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.identifyPictureBox)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TabControl mainTabControl;
        private System.Windows.Forms.TabPage identifyTabPage;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.TabPage viewTabPage;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.ComboBox devicesComboBox;
        private System.Windows.Forms.GroupBox detailGroupBox;
        private System.Windows.Forms.Label label13;
        private System.Windows.Forms.TextBox qualityFingerTextBox;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.TextBox lastnameTextBox;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.TextBox nameTextBox;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.TextBox fingerUserIdTextBox;
        private System.Windows.Forms.TextBox codeTextBox;
        private System.Windows.Forms.PictureBox fingerprintUserPictureBox;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.Label label14;
        private System.Windows.Forms.TextBox fingerprintUserIdTextBox;
        private System.Windows.Forms.PictureBox identifyPictureBox;
        private System.Windows.Forms.Button showButton;
        private System.Windows.Forms.Button previousButton;
    }
}