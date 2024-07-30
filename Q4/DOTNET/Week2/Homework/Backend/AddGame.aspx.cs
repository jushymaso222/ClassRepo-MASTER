using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

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
        }
        protected void btnAdd_Click(object sender, EventArgs e)
        {
            String gName = txtGName.Text;
            String gImg = txtIMGName.Text;
            String gDesc = txtGDesc.Text;
            String gPrice = txtGPrice.Text;

            _Default df = (_Default)Session["DefaultInstance"];
            df.AddToList(new GameTile(gName, gImg, gDesc, gPrice));
            lblFeedback.Text = "Game Added!";
        }

        protected void btnBack_Click(object sender, EventArgs e)
        {
            Response.Redirect("~/Backend/ControlPanel.aspx");
        }
    }
}