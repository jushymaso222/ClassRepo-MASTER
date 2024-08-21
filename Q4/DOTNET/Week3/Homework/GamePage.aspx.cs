using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Diagnostics;
using System.EnterpriseServices;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Backend_Work.Modules;

namespace Backend_Work
{
    public partial class GamePage : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack && Request.QueryString["ID"] != null)
            {
                string strID = Request.QueryString["ID"].ToString();
                int intID = Convert.ToInt32(strID);

                Game temp = new Game();
                SqlDataReader dr = temp.FindSingleGame(intID);

                while (dr.Read())
                {
                    lblTitle.Text = dr["Title"].ToString();
                    lblDesc.Text = dr["FullDesc"].ToString();
                    lblDev.Text = dr["Developer"].ToString();
                    imgIcon.ImageUrl = "~/Games/"+dr["Img"].ToString();
                    lblPub.Text = dr["Publisher"].ToString();
                    Double price = Double.Parse(dr["Price"].ToString().ToString());
                    string strPrice = price.ToString();
                    if (price % 1 == 0)
                    {
                        strPrice += ".00";
                    }
                    lblPrice.Text = "$"+strPrice;
                    lblDate.Text = " " + dr["DatePublished"].ToString().Substring(0, dr["DatePublished"].ToString().Length-11);


                }
            }
        }

        protected void btnBuy_Click(object sender, EventArgs e)
        {

        }
    }
}