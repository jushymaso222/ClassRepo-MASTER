using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace SE256_MasterPages.Backend
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnLogin_Click(object sender, EventArgs e)
        {
            if(txtUName.Text == "jushymaso222" && txtPW.Text == "password")
            {
                Session["User"] = txtUName.Text;
                Session["LoggedIn"] = "TRUE";
                lblFeedback.Text = "Login Success.";
                Response.Redirect("~/Backend/ControlPanel.aspx");
            }
            else
            {
                Session["User"] = "";
                Session["LoggedIn"] = false;
                lblFeedback.Text = "Login Failed, please try again.";
            }

        }
    }
}