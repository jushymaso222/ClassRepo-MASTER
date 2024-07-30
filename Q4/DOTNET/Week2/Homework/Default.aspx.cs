using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Backend_Work
{
    public partial class _Default : Page
    {
        private List<GameTile> games = new List<GameTile>();

        protected void Page_Load(object sender, EventArgs e)
        {
            if (!IsPostBack)
            {
                games.Add(new GameTile("Minecraft", "minecraft.png", "A voxel based sandbox game.", "$30.00"));
                games.Add(new GameTile("Factorio", "factorio.png", "A top-down factory building game.", "$20.00"));
                games.Add(new GameTile("7 Days to Die", "7days.png", "An expansive zombie survival game.", "$40.00"));
                games.Add(new GameTile("Call of Duty: Black Ops 3", "bo3.png", "A combat game with zombies.", "$60.00"));
                games.Add(new GameTile("Have a Nice Death", "hand.png", "A side-scrolling rogue-lite.", "$15.00"));
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
    }
}



