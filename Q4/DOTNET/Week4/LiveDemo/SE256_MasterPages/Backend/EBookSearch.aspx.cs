using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using System.Data;
using System.Data.SqlClient;
using SE256_MasterPages.App_Code;

namespace SE256_MasterPages.Backend
{
    public partial class EBookSearch : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["LoggedIn"] == null || Session["LoggedIn"] != "TRUE")
            {
                Response.Redirect("~/Backend");
            }
        }

        protected void btnSearch_Click(object sender, EventArgs e)
        {
            EBook temp = new EBook();

            DataSet ds = temp.SearchRecord_DS(txtTitle.Text,txtAuthorLast.Text);
            dgResults.DataSource = ds;
            dgResults.DataMember = ds.Tables[0].TableName;
            dgResults.DataBind();

            //-----------------------------------------------------

            SqlDataReader dr = temp.SearchRecord_DR(txtTitle.Text, txtAuthorLast.Text);
            rptSearch.DataSource = dr;
            rptSearch.DataBind();

            //-----------------------------------------------------

            litResults.Text = "<table>";
            litResults.Text += "<th>Title</th> <th>First Name</th> <th>Last Name</th> <th>Date Published</th> <th>Edit</th>";
            
            while (dr.Read())
            {
                litResults.Text +=
                    "<tr>" +
                    "<td>" + dr["Title"].ToString() + "</td>" +
                    "<td>" + dr["AuthorFirst"].ToString() + "</td>" +
                    "<td>" + dr["AuthorLast"].ToString() + "</td>" +
                    "<td>" + dr["DatePublished"].ToString() + "</td>" +
                    "<td>" + "<a href='EBookMgr.aspx?EBook_ID=" + dr["EBook_ID"].ToString() + "'>" + "</td>" +
                    "</tr>";
            }
            litResults.Text += "</table>";
        }
    }
}