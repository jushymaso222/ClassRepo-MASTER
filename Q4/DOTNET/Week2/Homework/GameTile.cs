using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Web;

namespace Backend_Work
{
    public class GameTile
    {
        public String name;
        public String desc;
        public String img;
        public String price;

        public GameTile(String gameName, String gameImage, String gameDescription, String gamePrice)
        {
            name = gameName;
            desc = gameDescription;
            img = "~/Games/"+gameImage;
            price = gamePrice;
        }
    }
}