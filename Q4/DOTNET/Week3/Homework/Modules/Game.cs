using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Data;
using System.Linq;
using System.Web;
using System.Diagnostics;

namespace Backend_Work.Modules
{
    public class Game
    {
        public string title;
        public string shortDesc;
        public string fullDesc;
        public Double price;
        public string imgURL;
        public string developer;
        public string publisher;
        public DateTime datePublilshed;
        public string genre;
        public GameTile tile;

        private string GetConnected()
        {
            return @"Server=sql.neit.edu\\studentsqlserver,4500;Database=Dev_202430_JMason;User Id=Dev_202430_JMason;Password=008021377;";

        }

        public DataSet SearchRecord_DS(string strSearch, string strSearch2 = null)
        {
            DataSet ds = new DataSet();
            SqlCommand comm = new SqlCommand();

            string strSql = "SELECT * FROM Games WHERE 0=0";

            if (strSearch2 != null)
            {
                if (strSearch.Length > 0)
                {
                    strSql += " AND Title LIKE @Title";
                    comm.Parameters.AddWithValue("@Title", "%" + strSearch + "%");
                }
                if (strSearch2.Length > 0)
                {
                    strSql += " AND Developer LIKE @Developer";
                    comm.Parameters.AddWithValue("@Title", "%" + strSearch2 + "%");
                }
            } else if (strSearch.Length > 0)
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

        public string AddARecord()
        {
            string strResult = "";

            SqlConnection Conn = new SqlConnection();
            Conn.ConnectionString = GetConnected();

            string strSQL = "INSERT INTO Games (Title, ShortDesc, FullDesc, Price, IMG, Developer, Publisher, DatePublished, Genre)" +
                "VALUES (@Title, @ShortDesc, @FullDesc, @Price, @IMG, @Developer, @Publisher, @DatePublished, @Genre)";

            SqlCommand comm = new SqlCommand();
            comm.CommandText = strSQL;
            comm.Connection = Conn;

            comm.Parameters.AddWithValue("@Title", title);
            comm.Parameters.AddWithValue("@ShortDesc", shortDesc);
            comm.Parameters.AddWithValue("@FullDesc", fullDesc);
            comm.Parameters.AddWithValue("@Price", price);
            comm.Parameters.AddWithValue("@IMG", imgURL);
            comm.Parameters.AddWithValue("@Developer", developer);
            comm.Parameters.AddWithValue("@Publisher", publisher);
            comm.Parameters.AddWithValue("@DatePublished", datePublilshed);
            comm.Parameters.AddWithValue("@Genre", genre);

            try
            {
                Conn.Open();

                int intRecs = comm.ExecuteNonQuery();
                strResult = $"SUCCESS: Inserted {intRecs} records.";

                Conn.Close();
            }
            catch (Exception err)
            {
                strResult = "ERROR: " + err.Message;
            }

            return strResult;

        }

        public SqlDataReader FindSingleGame(int intID)
        {
            SqlConnection conn = new SqlConnection();
            SqlCommand comm = new SqlCommand();

            string strConn = GetConnected();
            string strSQL = "SELECT * FROM Games WHERE ID = @ID";

            conn.ConnectionString = strConn;
            comm.Connection = conn;
            comm.CommandText = strSQL;
            comm.Parameters.AddWithValue("@ID", intID);

            conn.Open();
            return comm.ExecuteReader();
        }

        public string UpdateRecord(int intID)
        {
            Int32 intRecords = 0;
            string strResult = "";

            SqlConnection conn = new SqlConnection();
            SqlCommand comm = new SqlCommand();

            string strSQL = "UPDATE Games SET Title = @Title, ShortDesc = @ShortDesc, FullDesc = @FullDesc, Price = @Price, Img = @Img, Developer = @Developer, Publisher = @Publisher, DatePublished = @DatePublished, Genre = @Genre WHERE ID = @ID";
            conn.ConnectionString = GetConnected();

            comm.CommandText = strSQL;
            comm.Connection = conn;

            comm.Parameters.AddWithValue("@ID", intID);
            comm.Parameters.AddWithValue("@Title", title);
            comm.Parameters.AddWithValue("@ShortDesc", shortDesc);
            comm.Parameters.AddWithValue("@FullDesc", fullDesc);
            comm.Parameters.AddWithValue("@Price", price);
            comm.Parameters.AddWithValue("@Img", imgURL);
            comm.Parameters.AddWithValue("@Developer", developer);
            comm.Parameters.AddWithValue("@Publisher", publisher);
            comm.Parameters.AddWithValue("@DatePublished", datePublilshed);
            comm.Parameters.AddWithValue("@Genre", genre);

            try
            {
                conn.Open();
                intRecords = comm.ExecuteNonQuery();
                strResult = intRecords.ToString() + " Records Updated.";
            }
            catch (Exception err)
            {
                strResult = "ERROR: " + err.Message;
            }
            finally
            {
                conn.Close();
            }

            return strResult;
        }

        public string DeleteRecord(int intID)
        {
            Int32 intRecords = 0;
            string strResult = "";

            SqlConnection conn = new SqlConnection();
            SqlCommand comm = new SqlCommand();

            string strSQL = "DELTE FROM Games WHERE ID = @ID";
            conn.ConnectionString = GetConnected();

            comm.Connection = conn;
            comm.CommandText = strSQL;
            comm.Parameters.AddWithValue("@ID", intID);

            try
            {
                conn.Open();
                intRecords = comm.ExecuteNonQuery();
                strResult = intRecords.ToString() + " Records Deleted.";
            }
            catch (Exception err)
            {
                strResult = "ERROR: " + err.Message;
            }
            finally
            {
                conn.Close();
            }

            return strResult;
        }
    }
}