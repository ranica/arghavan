namespace SuprimaProgram.Forms
{
    partial class UserForm
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
            this.searchTabPage = new System.Windows.Forms.TabPage();
            this.groupBox2 = new System.Windows.Forms.GroupBox();
            this.label8 = new System.Windows.Forms.Label();
            this.searchTextBox = new System.Windows.Forms.TextBox();
            this.viewTabPage = new System.Windows.Forms.TabPage();
            this.detailGroupBox = new System.Windows.Forms.GroupBox();
            this.natioalcodeTextBox = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.codeTextBox = new System.Windows.Forms.TextBox();
            this.groupComboBox = new System.Windows.Forms.ComboBox();
            this.label15 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.lastnameTextBox = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.nameTextBox = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.fingerprintTabPage = new System.Windows.Forms.TabPage();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.enrollPictureBox = new System.Windows.Forms.PictureBox();
            this.label4 = new System.Windows.Forms.Label();
            this.enrollButton = new System.Windows.Forms.Button();
            this.devicesComboBox = new System.Windows.Forms.ComboBox();
            this.finishButton = new System.Windows.Forms.Button();
            this.previousButton = new System.Windows.Forms.Button();
            this.nextButton = new System.Windows.Forms.Button();
            this.mainTabControl.SuspendLayout();
            this.searchTabPage.SuspendLayout();
            this.groupBox2.SuspendLayout();
            this.viewTabPage.SuspendLayout();
            this.detailGroupBox.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.fingerprintTabPage.SuspendLayout();
            this.groupBox1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.enrollPictureBox)).BeginInit();
            this.SuspendLayout();
            // 
            // mainTabControl
            // 
            this.mainTabControl.Controls.Add(this.searchTabPage);
            this.mainTabControl.Controls.Add(this.viewTabPage);
            this.mainTabControl.Controls.Add(this.fingerprintTabPage);
            this.mainTabControl.Font = new System.Drawing.Font("B Yekan", 7.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.mainTabControl.Location = new System.Drawing.Point(9, 14);
            this.mainTabControl.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.mainTabControl.Name = "mainTabControl";
            this.mainTabControl.RightToLeftLayout = true;
            this.mainTabControl.SelectedIndex = 0;
            this.mainTabControl.Size = new System.Drawing.Size(644, 292);
            this.mainTabControl.TabIndex = 0;
            // 
            // searchTabPage
            // 
            this.searchTabPage.Controls.Add(this.groupBox2);
            this.searchTabPage.Location = new System.Drawing.Point(4, 24);
            this.searchTabPage.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.searchTabPage.Name = "searchTabPage";
            this.searchTabPage.Padding = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.searchTabPage.Size = new System.Drawing.Size(636, 264);
            this.searchTabPage.TabIndex = 0;
            this.searchTabPage.Text = "جستجوی کاربر";
            this.searchTabPage.UseVisualStyleBackColor = true;
            // 
            // groupBox2
            // 
            this.groupBox2.Controls.Add(this.label8);
            this.groupBox2.Controls.Add(this.searchTextBox);
            this.groupBox2.Location = new System.Drawing.Point(9, 8);
            this.groupBox2.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.groupBox2.Name = "groupBox2";
            this.groupBox2.Padding = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.groupBox2.Size = new System.Drawing.Size(617, 212);
            this.groupBox2.TabIndex = 30;
            this.groupBox2.TabStop = false;
            this.groupBox2.Text = "جستجوی کاربر";
            // 
            // label8
            // 
            this.label8.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label8.AutoSize = true;
            this.label8.Font = new System.Drawing.Font("B Yekan", 7.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.label8.Location = new System.Drawing.Point(331, 59);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(219, 17);
            this.label8.TabIndex = 5;
            this.label8.Text = " شماره پرسنلی / دانشجویی / کدملی را وارد نمایید";
            // 
            // searchTextBox
            // 
            this.searchTextBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.searchTextBox.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.searchTextBox.Location = new System.Drawing.Point(331, 100);
            this.searchTextBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.searchTextBox.Name = "searchTextBox";
            this.searchTextBox.Size = new System.Drawing.Size(267, 26);
            this.searchTextBox.TabIndex = 1;
            this.searchTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // viewTabPage
            // 
            this.viewTabPage.Controls.Add(this.detailGroupBox);
            this.viewTabPage.Location = new System.Drawing.Point(4, 24);
            this.viewTabPage.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.viewTabPage.Name = "viewTabPage";
            this.viewTabPage.Padding = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.viewTabPage.Size = new System.Drawing.Size(636, 264);
            this.viewTabPage.TabIndex = 1;
            this.viewTabPage.Text = "نمایش ";
            this.viewTabPage.UseVisualStyleBackColor = true;
            // 
            // detailGroupBox
            // 
            this.detailGroupBox.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.detailGroupBox.Controls.Add(this.natioalcodeTextBox);
            this.detailGroupBox.Controls.Add(this.label6);
            this.detailGroupBox.Controls.Add(this.textBox1);
            this.detailGroupBox.Controls.Add(this.label1);
            this.detailGroupBox.Controls.Add(this.pictureBox1);
            this.detailGroupBox.Controls.Add(this.codeTextBox);
            this.detailGroupBox.Controls.Add(this.groupComboBox);
            this.detailGroupBox.Controls.Add(this.label15);
            this.detailGroupBox.Controls.Add(this.label5);
            this.detailGroupBox.Controls.Add(this.lastnameTextBox);
            this.detailGroupBox.Controls.Add(this.label3);
            this.detailGroupBox.Controls.Add(this.nameTextBox);
            this.detailGroupBox.Controls.Add(this.label2);
            this.detailGroupBox.Font = new System.Drawing.Font("B Yekan", 7.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.detailGroupBox.Location = new System.Drawing.Point(9, 11);
            this.detailGroupBox.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.detailGroupBox.Name = "detailGroupBox";
            this.detailGroupBox.Padding = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.detailGroupBox.Size = new System.Drawing.Size(620, 241);
            this.detailGroupBox.TabIndex = 29;
            this.detailGroupBox.TabStop = false;
            this.detailGroupBox.Text = "مشخصات";
            // 
            // natioalcodeTextBox
            // 
            this.natioalcodeTextBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.natioalcodeTextBox.Location = new System.Drawing.Point(262, 96);
            this.natioalcodeTextBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.natioalcodeTextBox.Name = "natioalcodeTextBox";
            this.natioalcodeTextBox.Size = new System.Drawing.Size(211, 23);
            this.natioalcodeTextBox.TabIndex = 27;
            this.natioalcodeTextBox.Tag = "pn";
            this.natioalcodeTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label6
            // 
            this.label6.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(484, 101);
            this.label6.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(40, 17);
            this.label6.TabIndex = 26;
            this.label6.Text = "کد ملی:";
            // 
            // textBox1
            // 
            this.textBox1.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.textBox1.Location = new System.Drawing.Point(262, 189);
            this.textBox1.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.textBox1.Name = "textBox1";
            this.textBox1.Size = new System.Drawing.Size(211, 23);
            this.textBox1.TabIndex = 25;
            this.textBox1.Tag = "fam";
            this.textBox1.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label1
            // 
            this.label1.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(484, 198);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(85, 17);
            this.label1.TabIndex = 24;
            this.label1.Text = "وضعیت اثرانگشت:";
            // 
            // pictureBox1
            // 
            this.pictureBox1.Location = new System.Drawing.Point(55, 22);
            this.pictureBox1.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(155, 197);
            this.pictureBox1.TabIndex = 23;
            this.pictureBox1.TabStop = false;
            // 
            // codeTextBox
            // 
            this.codeTextBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.codeTextBox.Location = new System.Drawing.Point(262, 65);
            this.codeTextBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.codeTextBox.Name = "codeTextBox";
            this.codeTextBox.Size = new System.Drawing.Size(211, 23);
            this.codeTextBox.TabIndex = 20;
            this.codeTextBox.Tag = "pn";
            this.codeTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // groupComboBox
            // 
            this.groupComboBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.groupComboBox.Enabled = false;
            this.groupComboBox.FormattingEnabled = true;
            this.groupComboBox.Location = new System.Drawing.Point(262, 33);
            this.groupComboBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.groupComboBox.Name = "groupComboBox";
            this.groupComboBox.Size = new System.Drawing.Size(211, 23);
            this.groupComboBox.TabIndex = 22;
            this.groupComboBox.Tag = "grp";
            // 
            // label15
            // 
            this.label15.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label15.AutoSize = true;
            this.label15.Location = new System.Drawing.Point(484, 39);
            this.label15.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label15.Name = "label15";
            this.label15.Size = new System.Drawing.Size(30, 17);
            this.label15.TabIndex = 11;
            this.label15.Text = "گروه:";
            // 
            // label5
            // 
            this.label5.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(484, 72);
            this.label5.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(102, 17);
            this.label5.TabIndex = 13;
            this.label5.Text = "کد پرسنلی/دانشجویی:";
            // 
            // lastnameTextBox
            // 
            this.lastnameTextBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.lastnameTextBox.Location = new System.Drawing.Point(262, 158);
            this.lastnameTextBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.lastnameTextBox.Name = "lastnameTextBox";
            this.lastnameTextBox.Size = new System.Drawing.Size(211, 23);
            this.lastnameTextBox.TabIndex = 18;
            this.lastnameTextBox.Tag = "fam";
            this.lastnameTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label3
            // 
            this.label3.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(484, 165);
            this.label3.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(63, 17);
            this.label3.TabIndex = 15;
            this.label3.Text = "نام خانوادگی:";
            // 
            // nameTextBox
            // 
            this.nameTextBox.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.nameTextBox.Location = new System.Drawing.Point(262, 127);
            this.nameTextBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.nameTextBox.Name = "nameTextBox";
            this.nameTextBox.Size = new System.Drawing.Size(211, 23);
            this.nameTextBox.TabIndex = 17;
            this.nameTextBox.Tag = "nam";
            this.nameTextBox.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            // 
            // label2
            // 
            this.label2.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(484, 132);
            this.label2.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(23, 17);
            this.label2.TabIndex = 16;
            this.label2.Text = "نام:";
            // 
            // fingerprintTabPage
            // 
            this.fingerprintTabPage.Controls.Add(this.groupBox1);
            this.fingerprintTabPage.Location = new System.Drawing.Point(4, 24);
            this.fingerprintTabPage.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.fingerprintTabPage.Name = "fingerprintTabPage";
            this.fingerprintTabPage.Size = new System.Drawing.Size(636, 264);
            this.fingerprintTabPage.TabIndex = 2;
            this.fingerprintTabPage.Text = "ثبت اثر انگشت";
            this.fingerprintTabPage.UseVisualStyleBackColor = true;
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.enrollPictureBox);
            this.groupBox1.Controls.Add(this.label4);
            this.groupBox1.Controls.Add(this.enrollButton);
            this.groupBox1.Controls.Add(this.devicesComboBox);
            this.groupBox1.Location = new System.Drawing.Point(18, 12);
            this.groupBox1.Margin = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Padding = new System.Windows.Forms.Padding(3, 4, 3, 4);
            this.groupBox1.Size = new System.Drawing.Size(606, 231);
            this.groupBox1.TabIndex = 33;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "ثبت اثر انگشت";
            // 
            // enrollPictureBox
            // 
            this.enrollPictureBox.Location = new System.Drawing.Point(31, 25);
            this.enrollPictureBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.enrollPictureBox.Name = "enrollPictureBox";
            this.enrollPictureBox.Size = new System.Drawing.Size(155, 197);
            this.enrollPictureBox.TabIndex = 33;
            this.enrollPictureBox.TabStop = false;
            // 
            // label4
            // 
            this.label4.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(442, 43);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(123, 17);
            this.label4.TabIndex = 32;
            this.label4.Text = "نام دستگاه را انتخاب نمایید";
            // 
            // enrollButton
            // 
            this.enrollButton.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.enrollButton.Location = new System.Drawing.Point(369, 139);
            this.enrollButton.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.enrollButton.Name = "enrollButton";
            this.enrollButton.Size = new System.Drawing.Size(189, 41);
            this.enrollButton.TabIndex = 20;
            this.enrollButton.Text = "ثبت اثر انگشت";
            this.enrollButton.UseVisualStyleBackColor = true;
            // 
            // devicesComboBox
            // 
            this.devicesComboBox.FormattingEnabled = true;
            this.devicesComboBox.Location = new System.Drawing.Point(312, 80);
            this.devicesComboBox.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.devicesComboBox.Name = "devicesComboBox";
            this.devicesComboBox.Size = new System.Drawing.Size(276, 23);
            this.devicesComboBox.TabIndex = 31;
            // 
            // finishButton
            // 
            this.finishButton.Location = new System.Drawing.Point(13, 309);
            this.finishButton.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.finishButton.Name = "finishButton";
            this.finishButton.Size = new System.Drawing.Size(100, 39);
            this.finishButton.TabIndex = 30;
            this.finishButton.Text = "پایان";
            this.finishButton.UseVisualStyleBackColor = true;
            // 
            // previousButton
            // 
            this.previousButton.Location = new System.Drawing.Point(553, 309);
            this.previousButton.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.previousButton.Name = "previousButton";
            this.previousButton.Size = new System.Drawing.Size(100, 39);
            this.previousButton.TabIndex = 31;
            this.previousButton.Text = "قبلی";
            this.previousButton.UseVisualStyleBackColor = true;
            // 
            // nextButton
            // 
            this.nextButton.Location = new System.Drawing.Point(14, 309);
            this.nextButton.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.nextButton.Name = "nextButton";
            this.nextButton.Size = new System.Drawing.Size(100, 39);
            this.nextButton.TabIndex = 32;
            this.nextButton.Text = "بعدی";
            this.nextButton.UseVisualStyleBackColor = true;
            // 
            // UserForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 15F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(665, 353);
            this.Controls.Add(this.nextButton);
            this.Controls.Add(this.previousButton);
            this.Controls.Add(this.finishButton);
            this.Controls.Add(this.mainTabControl);
            this.Font = new System.Drawing.Font("B Yekan", 7.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(178)));
            this.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "UserForm";
            this.RightToLeft = System.Windows.Forms.RightToLeft.Yes;
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "ثبت اثرانگشت";
            this.mainTabControl.ResumeLayout(false);
            this.searchTabPage.ResumeLayout(false);
            this.groupBox2.ResumeLayout(false);
            this.groupBox2.PerformLayout();
            this.viewTabPage.ResumeLayout(false);
            this.detailGroupBox.ResumeLayout(false);
            this.detailGroupBox.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.fingerprintTabPage.ResumeLayout(false);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.enrollPictureBox)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TabControl mainTabControl;
        private System.Windows.Forms.TabPage searchTabPage;
        private System.Windows.Forms.TabPage viewTabPage;
        private System.Windows.Forms.TabPage fingerprintTabPage;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.TextBox searchTextBox;
        private System.Windows.Forms.GroupBox detailGroupBox;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.TextBox codeTextBox;
        private System.Windows.Forms.ComboBox groupComboBox;
        private System.Windows.Forms.Label label15;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.TextBox lastnameTextBox;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.TextBox nameTextBox;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Button enrollButton;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.ComboBox devicesComboBox;
        private System.Windows.Forms.GroupBox groupBox2;
        private System.Windows.Forms.Button finishButton;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.TextBox natioalcodeTextBox;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.PictureBox enrollPictureBox;
        private System.Windows.Forms.Button previousButton;
        private System.Windows.Forms.Button nextButton;
    }
}