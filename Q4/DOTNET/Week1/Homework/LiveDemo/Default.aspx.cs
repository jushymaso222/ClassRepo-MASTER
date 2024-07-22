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
            if (!IsPostBack)
            {
                Session["Num1"] = "None";
                Session["Result"] = 0;
            }
        }

        protected void btnNum_Click(object sender, EventArgs e)
        {
            Button temp = (Button)sender;
            textLCD.Text += temp.Text;
        }
        protected void btnMEM_Click(object sender, EventArgs e)
        {
            Button temp = (Button)sender;
            String mode = temp.Text;

            switch(mode)
            {
                case "MS":
                    //Memory store
                    Session["Mem"] = textLCD.Text;
                    textLCD.Text = "";
                    Session["Num1"] = "None";
                    break;
                case "MR":
                    //Memory restore
                    if (Session["Mem"].ToString() != "0")
                    {
                        textLCD.Text = Session["Mem"].ToString();
                    }
                    break;
                case "MC":
                    //Memory clear
                    Session["Mem"] = "0";
                    break;
            }
            labelMem.Text = $"Stored in Memory: {Session["Mem"].ToString()}";
        }
        protected void btnOperate_Click(object sender, EventArgs e)
        {
            Button temp = (Button)sender;
            String mode = temp.Text;
            String last = "None";

            Session["Opperand"] = temp.Text;
            if (Session["Num1"].ToString() != "None")
            {
                Double Num1 = Double.Parse(Session["Num1"].ToString());
                Double Num2 = Double.Parse(textLCD.Text);
                Double result;

                switch (Session["Opperand"].ToString())
                {
                    case "+":
                        result = Num1 + Num2;
                        last = "Addition";
                        break;
                    case "-":
                        result = Num1 - Num2;
                        last = "Subtraction";
                        break;
                    case "x":
                        result = Num1 * Num2;
                        last = "Multiplication";
                        break;
                    case "÷":
                        if (Num2 != 0)
                        {
                            result = Num1 / Num2;
                            last = "Division";
                        } else
                        {
                            result = 0;
                            textLCD.Text = "ERR: DIVIDE BY 0";
                            last = "None";
                        }
                        break;
                    default:
                        last = "None";
                        result = 0;
                        break;
                }

                Session["Num1"] = result;
                textLCD.Text = "";
            } else
            {
                if (textLCD.Text != "")
                {
                    Session["Num1"] = textLCD.Text;
                    textLCD.Text = "";
                    last = "None";
                }
            }
            labelLast.Text = $"Last Operation: {last}";
        }
        protected void btnEquals_Click(object sender, EventArgs e)
        {
            if ((textLCD.Text != "") && (Session["Num1"].ToString() != "None"))
            {
                Double Num1 = Double.Parse(Session["Num1"].ToString());
                Double Num2 = Double.Parse(textLCD.Text);
                String Opperand = Session["Opperand"].ToString();
                String last;

                switch (Opperand)
                {
                    case "+":
                        Session["Result"] = Num1 + Num2;
                        last = "Addition";
                        break;
                    case "-":
                        Session["Result"] = Num1 - Num2;
                        last = "Subtraction";
                        break;
                    case "x":
                        Session["Result"] = Num1 * Num2;
                        last = "Multiplication";
                        break;
                    case "÷":
                        Session["Result"] = Num1 / Num2;
                        last = "Division";
                        break;
                    default:
                        Session["Result"] = 0;
                        last = "None";
                        break;
                }

                textLCD.Text = Session["Result"].ToString();
                Session["Num1"] = "None";
                labelLast.Text = $"Last Operation: {last}";
            }
        }

        protected void btnClear_Click(object sender, EventArgs e)
        {
            textLCD.Text = "";
            Session["Num1"] = "None";
            Session["Result"] = 0;
        }

    }
}