using SE256_MasterPages.App_Code;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace SE256_MasterPages.Backend
{
    public partial class EbookMgr : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["LoggedIn"] == null || Session["LoggedIn"] != "TRUE")
            {
                Response.Redirect("~/Backend");
            }

            string strEBook_ID = "";
            int intEBook_ID = 0;

            if (!IsPostBack && Request.QueryString["EBook_ID"] != null)
            {
                btnAdd.Visible = false;
                btnAdd.Enabled = false;

                strEBook_ID = Request.QueryString["EBook_ID"].ToString();
                lblBookID.Text = strEBook_ID;

                intEBook_ID = Convert.ToInt32(strEBook_ID);

                EBook temp = new EBook();
                SqlDataReader dr = temp.FindOneEBook(intEBook_ID);

                while (dr.Read())
                {
                    txtTitle.Text = dr["Title"].ToString();
                    txtAuthorFirst.Text = dr["AuthorFirst"].ToString();
                    txtAuthorLast.Text = dr["AuthorLast"].ToString();
                    txtAuthorEmail.Text = dr["Email"].ToString();
                    txtPages.Text = dr["Pages"].ToString();
                    txtPrice.Text = dr["Price"].ToString();
                    txtBookmarkPage.Text = dr["BookmarkPage"].ToString();

                    calDatePublished.VisibleDate = DateTime.Parse(dr["DatePublished"].ToString()).Date;
                    calDatePublished.SelectedDate = DateTime.Parse(dr["DatePublished"].ToString()).Date;

                    calDateRental.VisibleDate = DateTime.Parse(dr["DateRentalExpires"].ToString()).Date;
                    calDateRental.SelectedDate = DateTime.Parse(dr["DateRentalExpires"].ToString()).Date;
                }
            } else
            {
                btnDelete.Visible = false;
                btnDelete.Enabled = false;
                btnUpdate.Visible = false;
                btnUpdate.Enabled = false;
                btnCancel.Visible = false;
                btnCancel.Enabled = false;
            }
        }

        protected void btnAdd_Click(object sender, EventArgs e)
        {

            EBook temp = new EBook();

            temp.Title = txtTitle.Text;
            temp.AuthorFirst = txtAuthorFirst.Text;
            temp.AuthorLast = txtAuthorLast.Text;
            temp.Email = txtAuthorEmail.Text;
            temp.DatePublished = calDatePublished.SelectedDate;
            temp.DateRentalExpires = calDateRental.SelectedDate;


            Int32 intPages = 0;
            if(Int32.TryParse(txtPages.Text, out intPages))
            {
                temp.Pages = intPages;
            }


            Double dblPrice = 0;
            if(Double.TryParse(txtPrice.Text, out dblPrice))
            {
                temp.Price = dblPrice;
            }

            Int32 intBookmarkPage = 0;
            if (Int32.TryParse(txtBookmarkPage.Text, out intBookmarkPage))
            {
                temp.Pages = intBookmarkPage;
            }


            if (temp.Feedback.Contains("ERROR:"))
            {
                lblFeedback.Text = temp.Feedback;
            }
            else
            {
                lblFeedback.Text = temp.AddARecord();

            }

        }

        protected void btnUpdate_Click(object sender, EventArgs e)
        {

        }

        protected void btnDelete_Click(object sender, EventArgs e)
        {

        }

        protected void btnCancel_Click(object sender, EventArgs e)
        {

        }
    }
}