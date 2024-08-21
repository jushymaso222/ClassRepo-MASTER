using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Security.Cryptography;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Backend_Work.Modules;

namespace Backend_Work.Backend
{
    public partial class AddGame : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["LoggedIn"] != null && Session["LoggedIn"].ToString() == "TRUE")
            {

            }
            else
            {
                Response.Redirect("~/Backend/Default.aspx");
            }

            if (!IsPostBack && Request.QueryString["ID"] != null)
            {
                btnAdd.Visible = false;
                btnAdd.Enabled = false;

                string strID = Request.QueryString["ID"].ToString();
                lblID.Text = strID;

                int intID = Convert.ToInt32(strID);

                Game temp = new Game();
                SqlDataReader dr = temp.FindSingleGame(intID);

                while (dr.Read())
                {
                    txtGName.Text = dr["Title"].ToString();
                    txtShortDesc.Text = dr["ShortDesc"].ToString();
                    txtGDesc.Text = dr["FullDesc"].ToString();
                    txtGPrice.Text = dr["Price"].ToString();
                    txtIMGName.Text = dr["Img"].ToString();
                    txtDev.Text = dr["Developer"].ToString();
                    txtPub.Text = dr["Publisher"].ToString();
                    calDate.VisibleDate = DateTime.Parse(dr["DatePublished"].ToString()).Date;
                    calDate.SelectedDate = DateTime.Parse(dr["DatePublished"].ToString()).Date;
                    selGenre.SelectedIndex = GetIndex(dr["Genre"].ToString());
                }
            } else
            {
                btnDelete.Visible = false;
                btnDelete.Enabled = false;
                btnUpdate.Visible = false;
                btnUpdate.Enabled = false;
            }
        }

        public int GetIndex(string input)
        {
            int index = 0;

            switch (input)
            {
                case "RPG":
                    index = 1;
                    break;
                case "Adventure":
                    index = 2;
                    break;
                case "Sports":
                    index = 3;
                    break;
                case "Racing":
                    index = 4;
                    break;
                case "Platformer":
                    index = 5;
                    break;
                case "Survival":
                    index = 6;
                    break;
                case "Beat Em' Up":
                    index = 7;
                    break;
                case "Battle Royale":
                    index = 8;
                    break;
                case "Action":
                    index = 9;
                    break;
                case "Simulation":
                    index = 10;
                    break;
                case "Puzzle":
                    index = 11;
                    break;
                case "Horror":
                    index = 12;
                    break;
                case "Strategy":
                    index = 13;
                    break;
                case "FPS":
                    index = 14;
                    break;
                case "Fighting":
                    index = 15;
                    break;
                case "Sandbox":
                    index = 16;
                    break;
                case "MMO":
                    index = 17;
                    break;
                case "Stealth":
                    index = 18;
                    break;
            }
            return index;
        }

        public bool ValidateForm()
        {
            bool result = true;
            if (txtGName.Text == "" || txtGName.Text == null)
            {
                txtGName.Text = "";
                txtGName.Attributes.Add("placeholder", "Required*");
                result = false;
            }
            if (txtShortDesc.Text == "" || txtShortDesc.Text == null)
            {
                txtShortDesc.Text = "";
                txtShortDesc.Attributes.Add("placeholder", "Required*");
                result = false;
            }
            if (txtIMGName.Text != "" && txtIMGName != null)
            {
                if (!txtIMGName.Text.Contains(".png"))
                {
                    txtIMGName.Text = "";
                    txtIMGName.Attributes.Add("placeholder", "Must be a png*");
                    result = false;
                }
            }
            bool check = Double.TryParse(txtGPrice.Text, out Double number);
            if (txtGPrice.Text == "" || txtGPrice.Text == null)
            {
                txtGPrice.Text = "";
                txtGPrice.Attributes.Add("placeholder", "Required*");
                result = false;
            }
            else if (!check)
            {
                txtGPrice.Text = "";
                txtGPrice.Attributes.Add("placeholder", "Must be a valid number*");
                result = false;
            }
            if (selGenre.SelectedIndex == -1)
            {
                selGenre.SelectedIndex = -1;
                result = false;
            }
            return result;
        }

        protected void btnAdd_Click(object sender, EventArgs e)
        {
            if (ValidateForm())
            {
                Game temp = new Game();
                temp.title = txtGName.Text;
                temp.shortDesc = txtShortDesc.Text;
                temp.fullDesc = txtGDesc.Text;
                temp.imgURL = txtIMGName.Text;
                temp.price = Double.Parse(txtGPrice.Text);
                temp.developer = txtDev.Text;
                temp.publisher = txtPub.Text;
                temp.datePublilshed = calDate.SelectedDate;
                temp.genre = selGenre.SelectedItem.Text;

                lblFeedback.Text = temp.AddARecord();
            }
        }

        protected void btnBack_Click(object sender, EventArgs e)
        {
            Response.Redirect("~/Backend/ControlPanel.aspx");
        }

        protected void btnUpdate_Click(object sender, EventArgs e)
        {
            if (ValidateForm())
            {
                Game temp = new Game();
                temp.title = txtGName.Text;
                temp.shortDesc = txtShortDesc.Text;
                temp.fullDesc = txtGDesc.Text;
                temp.imgURL = txtIMGName.Text;
                temp.price = Double.Parse(txtGPrice.Text);
                temp.developer = txtDev.Text;
                temp.publisher = txtPub.Text;
                temp.datePublilshed = calDate.SelectedDate;
                temp.genre = selGenre.SelectedItem.Text;

                lblFeedback.Text = temp.UpdateRecord(Int32.Parse(lblID.Text));
            }
        }

        protected void btnDelete_Click(object sender, EventArgs e)
        {
            Game temp = new Game();
            temp.DeleteRecord(Int32.Parse(lblID.Text));
            Response.Redirect("~/Backend/ManageRecords.aspx");
        }
    }
}