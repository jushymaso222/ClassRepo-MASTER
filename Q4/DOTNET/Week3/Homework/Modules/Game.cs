using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Data;
using System.Linq;
using System.Web;

namespace Backend_Work.Modules
{
    public class Game
    {
        private string title;
        private string shortDesc;
        private string fullDesc;
        private Double price;
        private string imgURL;
        private string developer;
        private string publisher;
        private DateTime datePublilshed;
        private string genre;
        private GameTile tile;

        private string GetConnected()
        {
            return @"Server=sql.neit.edu\\studentsqlserver,4500;Database=Dev_202430_JMason;User Id=Dev_202430_JMason;Password=008021377;";

        }

        public DataSet SearchRecord_DS(string strSearch)
        {
            DataSet ds = new DataSet();
            SqlCommand comm = new SqlCommand();

            string strSql = "SELECT * FROM Games WHERE 0=0";

            if (strSearch.Length > 0)
            {
                strSql += " AND Title LIKE @Title OR Developer Like @Developer";
                comm.Parameters.AddWithValue("@Title", "%" + strSearch + "%");
                comm.Parameters.AddWithValue("@Developer", "%" + strSearch + "%");
            }

            SqlConnection conn = new SqlConnection();

            string strConn = GetConnected();
            conn.ConnectionString = strConn;

            comm.Connection = conn;
            comm.CommandText = strSql;

            SqlDataAdapter da = new SqlDataAdapter();
            da.SelectCommand = comm;

            conn.Open();
            da.Fill(ds, "Games_Temp");
            conn.Close();

            return ds;
        }



    }
}