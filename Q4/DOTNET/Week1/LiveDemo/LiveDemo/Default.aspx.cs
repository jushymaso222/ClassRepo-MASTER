using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace LiveDemo
{
    public partial class _Default : Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnNum_Click(object sender, EventArgs e)
        {
            Button temp = (Button)sender;
            textLCD.Text += temp.Text;
        }

        protected void btnPlus_Click(object sender, EventArgs e)
        {
            Session["Num1"] = textLCD.Text;
            Session["Opperand"] = "+";

            textLCD.Text = "";
        }

        protected void btnMinus_Click(object sender, EventArgs e)
        {
            Session["Num1"] = textLCD.Text;
            Session["Opperand"] = "-";

            textLCD.Text = "";
        }

        protected void btnEquals_Click(object sender, EventArgs e)
        {
            Double Num1 = Double.Parse(Session["Num1"].ToString());
            Double Num2 = Double.Parse(textLCD.Text);
            String Opperand = Session["Opperand"].ToString();
            Double Result;

            switch(Opperand)
            {
                case "+":
                    Result = Num1 + Num2;
                    break;
                case "-":
                    Result = Num1 - Num2;
                    break;
                default:
                    Result = 0;
                    break;
            }

            textLCD.Text = Result.ToString();
        }

        protected void btnBack_Click(object sender, EventArgs e)
        {
            if (textLCD.Text.Length > 0)
            {
                textLCD.Text = textLCD.Text.Remove(textLCD.Text.Length - 1, 1);
            }
        }

        protected void btnClear_Click(object sender, EventArgs e)
        {
            textLCD.Text = "";
        }

    }
}