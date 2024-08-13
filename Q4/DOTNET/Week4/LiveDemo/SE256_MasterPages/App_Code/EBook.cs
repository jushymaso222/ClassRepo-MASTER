using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Web;

namespace SE256_MasterPages.App_Code
{
    public class EBook : Book
    {

        private DateTime dateRentalExpires;
        private int bookmarkPage;

        private int eBook_Id;


        public DateTime DateRentalExpires
        {
            get { return dateRentalExpires; }

            set
            {
                if (ValidationLibrary.IsAFutureDate(value))
                {
                    dateRentalExpires = value;
                }
                else
                {
                    feedback += "\nERROR: You must enter a future date.";
                }
            }
        }

        public int BookmarkPage
        {
            get { return bookmarkPage; }

            set
            {
                if(value >= 0 && value <= Pages)
                {
                    bookmarkPage = value;
                }
                else
                {
                    feedback += "\nERROR: Not a valid page number";
                }
            }
        }

        private string GetConnected()
        {
            return @"Server=sql.neit.edu\\studentsqlserver,4500;Database=Dev_202430_JMason;User Id=Dev_202430_JMason;Password=008021377;";

        }

        public EBook() : base()
        {
            BookmarkPage = 0;
            dateRentalExpires = DateTime.Now.AddDays(14);
        }




        public string AddARecord()
        {
            string strResult = "";

            SqlConnection Conn = new SqlConnection();
            Conn.ConnectionString = GetConnected();

            string strSQL = "INSERT INTO EBooks (Title, AuthorFirst, AuthorLast, Email, Pages, Price, DatePublished, DateRentalExpires,BookmarkPage)" +
                "VALUES (@Title, @AuthorFirst, @AuthorLast, @Email, @Pages, @Price, @DatePublished, @DateRentalExpires, @BookmarkPage)";

            SqlCommand comm = new SqlCommand();
            comm.CommandText = strSQL;
            comm.Connection = Conn;

            comm.Parameters.AddWithValue("@Title", Title);
            comm.Parameters.AddWithValue("@AuthorFirst", AuthorFirst);
            comm.Parameters.AddWithValue("@AuthorLast", AuthorLast);
            comm.Parameters.AddWithValue("@Email", Email);
            comm.Parameters.AddWithValue("@Pages", Pages);
            comm.Parameters.AddWithValue("@Price", Price);
            comm.Parameters.AddWithValue("@DatePublished", DatePublished);
            comm.Parameters.AddWithValue("@DateRentalExpires", DateRentalExpires);
            comm.Parameters.AddWithValue("@BookmarkPage", BookmarkPage);

            try
            {
                Conn.Open();

                int intRecs = comm.ExecuteNonQuery();
                strResult = $"SUCCESS: Inserted {intRecs} records.";

                Conn.Close();
            }
            catch(Exception err)
            {
                strResult = "ERROR: " + err.Message;
            }

            return strResult;








        }

        public DataSet SearchRecord_DS(string strTitle, string strAuthorLast)
        {
            DataSet ds = new DataSet();
            SqlCommand comm = new SqlCommand();

            string strSql = "SELECT EBook_ID, Title, AuthorFirst, AuthorLast, DatePublished FROM Ebooks WHERE 0=0";

            if (strTitle.Length > 0)
            {
                strSql += " AND Title LIKE @Title";
                comm.Parameters.AddWithValue("@Title", "%" + strTitle + "%");
            }

            if (strAuthorLast.Length > 0)
            {
                strSql += " AND AuthorLast LIKE @AuthorLast";
                comm.Parameters.AddWithValue("@AuthorLast", "%" + strAuthorLast + "%");
            }

            SqlConnection conn = new SqlConnection();

            string strConn = GetConnected();
            conn.ConnectionString = strConn;

            comm.Connection = conn;
            comm.CommandText = strSql;

            SqlDataAdapter da = new SqlDataAdapter();
            da.SelectCommand = comm;

            conn.Open();
            da.Fill(ds, "Ebooks_Temp");
            conn.Close();

            return ds;
        }

        public SqlDataReader SearchRecord_DR(string strTitle, string strAuthorLast)
        {
            SqlCommand comm = new SqlCommand();

            string strSql = "SELECT EBook_ID, Title, AuthorFirst, AuthorLast, DatePublished FROM Ebooks WHERE 0=0";

            if (strTitle.Length > 0)
            {
                strSql += " AND Title LIKE @Title";
                comm.Parameters.AddWithValue("@Title", "%" + strTitle + "%");
            }

            if (strAuthorLast.Length > 0)
            {
                strSql += " AND AuthorLast LIKE @AuthorLast";
                comm.Parameters.AddWithValue("@AuthorLast", "%" + strAuthorLast + "%");
            }

            SqlConnection conn = new SqlConnection();

            string strConn = GetConnected();
            conn.ConnectionString = strConn;

            comm.Connection = conn;
            comm.CommandText = strSql;

            conn.Open();
            SqlDataReader dr = comm.ExecuteReader();
            

            return dr;
        }

        public SqlDataReader FindOneEBook(int intEbook_id)
        {
            SqlConnection conn = new SqlConnection();
            SqlCommand comm = new SqlCommand();

            string strConn = GetConnected();
            string strSQL = "SELET * FROM Ebooks WHERE EBook_ID = @EBook_ID";

            conn.ConnectionString= strConn;
            comm.Connection = conn;
            comm.CommandText = strSQL;
            comm.Parameters.AddWithValue("@EBook_ID", intEbook_id);

            conn.Open();
            return comm.ExecuteReader();
        }
    }
}