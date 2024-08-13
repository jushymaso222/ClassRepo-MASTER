using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Backend_Work.Backend
{
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnLogin_Click(object sender, EventArgs e)
        {
            if (txtUName.Text == "jushymaso222" && txtPW.Text == "conT1nuum#")
            {
                Session["UName"] = txtUName.Text;
                Session["LoggedIn"] = "TRUE";
                lblFeedback.Text = "Success!";
                Response.Redirect("~/Backend/ControlPanel.aspx");
            } else
            {
                Session["UName"] = "";
                Session["LoggedIn"] = "FALSE";
                lblFeedback.Text = "Login Failed!";
            }
        }
    }
}