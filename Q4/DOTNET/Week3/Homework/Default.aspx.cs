using Backend_Work.Modules;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;

namespace Backend_Work
{
    public partial class _Default : Page
    {
        private List<GameTile> games = new List<GameTile>();

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                Game temp = new Game();
                DataSet newData = temp.SearchRecord_DS("");
                for (int i = 0; i < newData.Tables[0].Rows.Count; i++)
                {
                    Double price = Double.Parse(newData.Tables[0].Rows[i]["Price"].ToString());
                    string strPrice = price.ToString();
                    if (price % 1 == 0)
                    {
                        strPrice += ".00";
                    }
                    games.Add(new GameTile(newData.Tables[0].Rows[i]["Title"].ToString(), newData.Tables[0].Rows[i]["Img"].ToString(), newData.Tables[0].Rows[i]["ShortDesc"].ToString(), $"${strPrice}"));
                }
                /*games.Add(new GameTile("Minecraft", "minecraft.png", "A voxel based sandbox game.", "$30.00"));
                games.Add(new GameTile("Factorio", "factorio.png", "A top-down factory building game.", "$20.00"));
                games.Add(new GameTile("7 Days to Die", "7days.png", "An expansive zombie survival game.", "$40.00"));
                games.Add(new GameTile("Call of Duty: Black Ops 3", "bo3.png", "A combat game with zombies.", "$60.00"));
                games.Add(new GameTile("Have a Nice Death", "hand.png", "A side-scrolling rogue-lite.", "$15.00"));*/
            }
            Session["DefaultInstance"] = this;

            String template;
            if (games.Count > 0)
            {
                String gameTiles = "<div>";
                foreach (GameTile game in games)
                {
                    template = $"<div class=\"gameTile\"> <img class=\"icon\" src = \"{game.img}\" alt=\"Icon for {game.name}\" /> <div class=\"content\"> <h2>{game.name}</h2> <p>{game.desc}</p> <h3>{game.price}</h3> </div> <h3 class=\"buyButton\">Buy Now</h3> </div>";
                    gameTiles += template;
                }
                gameTiles += "</div>";
                gameTilesContent.Text = gameTiles;
            }
        }

        public void AddToList(GameTile game)
        {
            games.Add(game);
        }

        protected void searchBtn_Click(object sender, EventArgs e)
        {
            Game temp = new Game();
            DataSet newData = temp.SearchRecord_DS(SearchTextBox.Text);
            games.Clear();
            for (int i = 0; i < newData.Tables[0].Rows.Count; i++)
            {
                Double price = Double.Parse(newData.Tables[0].Rows[i]["Price"].ToString());
                string strPrice = price.ToString();
                if (price % 1 == 0)
                {
                    strPrice += ".00";
                }
                games.Add(new GameTile(newData.Tables[0].Rows[i]["Title"].ToString(), newData.Tables[0].Rows[i]["Img"].ToString(), newData.Tables[0].Rows[i]["ShortDesc"].ToString(), $"${strPrice}"));
            }
        }
    }
}



