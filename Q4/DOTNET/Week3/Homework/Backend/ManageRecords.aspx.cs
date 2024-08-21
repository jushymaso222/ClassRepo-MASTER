using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Backend_Work.Modules;

namespace Backend_Work.Backend
{
    public partial class ManageRecords : System.Web.UI.Page
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

        protected void btnSearch_Click(object sender, EventArgs e)
        {
            Game temp = new Game();

            DataSet ds = temp.SearchRecord_DS(txtTitle.Text, txtDeveloper.Text);
            dgResults.DataSource = ds;
            dgResults.DataMember = ds.Tables[0].TableName;
            dgResults.DataBind();
        }
    }
}