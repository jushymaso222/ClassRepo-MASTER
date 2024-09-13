using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

using System.Data;
using System.Data.SqlClient;
using Razor_Test.Models;
using Microsoft.Extensions.Configuration;

namespace Razor_Test.Models
{
    public class TroubleTicketDataAccessLayer
    {
        string connectionString;

        private readonly IConfiguration _configuration;

        public TroubleTicketDataAccessLayer(IConfiguration configuration)
        {
            _configuration = configuration;
            connectionString = _configuration.GetConnectionString("DefaultConnection");
        }

        public void Create(TroubleTicketModel ticket)
        {
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                string sql = "INSERT INTO TroubleTickets (Ticket_Title, Ticket_Desc, Category, Reporting_Email, Orig_Date) VALUES (@Ticket_Title, @Ticket_Desc, @Category, @Reporting_Email, @Orig_Date);";
                ticket.Feedback = "";

                try
                {
                    using (SqlCommand command = new SqlCommand(sql, connection))
                    {
                        command.CommandType = CommandType.Text;
                        command.Parameters.AddWithValue("@Ticket_Title", ticket.Ticket_Title);
                        command.Parameters.AddWithValue("@Ticket_Desc", ticket.Ticket_Desc);
                        command.Parameters.AddWithValue("@Category", ticket.Category);
                        command.Parameters.AddWithValue("@Reporting_Email", ticket.Reporting_Email);
                        command.Parameters.AddWithValue("@Orig_Date", DateTime.Now);

                        connection.Open();

                        ticket.Feedback = command.ExecuteNonQuery().ToString() + " Record Added";
                        connection.Close();
                    }
                }
                catch (Exception err)
                {
                    ticket.Feedback = "ERROR: " + err.Message;
                }
            }
        }

        public IEnumerable<TroubleTicketModel> GetActiveRecords()
        {
            List<TroubleTicketModel> lstTix = new List<TroubleTicketModel>();

            try
            {
                using (SqlConnection con = new SqlConnection(connectionString))
                {
                    string strSQL = "SELECT * FROM TroubleTickets ORDER BY Orig_Date;";
                    SqlCommand cmd = new SqlCommand(strSQL, con);
                    cmd.CommandType = CommandType.Text;

                    con.Open();
                    SqlDataReader rdr = cmd.ExecuteReader();
                    while (rdr.Read())
                    {
                        TroubleTicketModel ticket = new TroubleTicketModel();

                        ticket.Ticket_ID = Convert.ToInt32(rdr["Ticket_ID"]);
                        ticket.Ticket_Title = rdr["Ticket_ID"].ToString();
                        ticket.Category = rdr["Category"].ToString();
                        ticket.Reporting_Email = rdr["Reporting_Email"].ToString();
                        ticket.Orig_Date = DateTime.Parse(rdr["Orig_Date"].ToString());
                        ticket.Active = Boolean.Parse(rdr["Active"].ToString());
                        ticket.Responder_Email = rdr["Responder_Email"].ToString();
                        ticket.Responder_Notes = rdr["Responder_Notes"].ToString();

                        lstTix.Add(ticket);
                    }
                }
            }
            catch (Exception err)
            {

            }
            return lstTix;
        }
    }
}
