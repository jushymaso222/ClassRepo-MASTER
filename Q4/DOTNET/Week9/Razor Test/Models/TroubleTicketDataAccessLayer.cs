using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

using System.Data;
using System.Data.SqlClient;
using Razor_Test.Models;
using Microsoft.Extensions.Configuration;
using System.Linq.Expressions;
using Microsoft.AspNetCore.Authentication;
using System.Runtime.ExceptionServices;

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
                        ticket.Ticket_Title = rdr["Ticket_Title"].ToString();
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

        public TroubleTicketModel GetOneRecord(int? id)
        {
            TroubleTicketModel ticket = new TroubleTicketModel();
            try
            {
                using (SqlConnection con = new SqlConnection(connectionString))
                {
                    string strSQL = "SELECT * FROM TroubleTickets WHERE Ticket_ID = @Ticket_ID;";
                    SqlCommand com = new SqlCommand(strSQL, con);
                    com.CommandType = CommandType.Text;

                    com.Parameters.AddWithValue("@Ticket_ID", id);

                    con.Open();
                    SqlDataReader rdr = com.ExecuteReader();

                    while (rdr.Read())
                    {
                        ticket.Ticket_ID = Convert.ToInt32(rdr["Ticket_ID"]);
                        ticket.Ticket_Title = rdr["Ticket_Title"].ToString();
                        ticket.Category = rdr["Category"].ToString();
                        ticket.Ticket_Desc = rdr["Ticket_Desc"].ToString();
                        ticket.Reporting_Email = rdr["Reporting_Email"].ToString();
                        DateTime tempDate;
                        if (rdr["Orig_Date"] != null && DateTime.TryParse(rdr["Orig_Date"].ToString(), out tempDate))
                        {
                            ticket.Orig_Date = tempDate;
                        }
                        ticket.Orig_Date = DateTime.Parse(rdr["Orig_Date"].ToString());
                        ticket.Active = Boolean.Parse(rdr["Active"].ToString());
                        ticket.Responder_Email = rdr["Responder_Email"].ToString();
                        ticket.Responder_Notes = rdr["Responder_Notes"].ToString();
                        if (rdr["Close_Date"] != null && DateTime.TryParse(rdr["Close_Date"].ToString(), out tempDate))
                        {
                            ticket.Close_Date = tempDate;
                        }
                    }

                    con.Close();
                }
            }
            catch (Exception err)
            {
                ticket.Feedback = "ERROR: " + err.Message;
            }
            return ticket;
        }

        public void UpdateTicket(TroubleTicketModel tTicket)
        {
            try
            {
                using (SqlConnection con = new SqlConnection(connectionString))
                {
                    SqlCommand cmd = new SqlCommand();
                    string strSQL;
                    if (tTicket.Active == false)
                    {
                        strSQL = "UPDATE TroubleTickets SET Responder_Email = @Responder_Email, Responder_Notes = @Responder_Notes, Close_Date = @Close_Date, Active = @Active WHERE Ticket_ID = @Ticket_ID";
                    }
                    else
                    {
                        strSQL = "UPDATE TroubleTickets SET Responder_Email = @Responder_Email, Responder_Notes = @Responder_Notes, Active = @Active WHERE Ticket_ID = @Ticket_ID";
                    }

                    cmd.CommandText = strSQL;
                    cmd.Connection = con;
                    cmd.CommandType = CommandType.Text;

                    cmd.Parameters.AddWithValue("@Responder_Email", tTicket.Responder_Email);
                    cmd.Parameters.AddWithValue("@Responder_Notes", tTicket.Responder_Notes);
                    if (tTicket.Active == false)
                    {
                        cmd.Parameters.AddWithValue("@Close_Date", DateTime.Now);
                    }
                    cmd.Parameters.AddWithValue("@Active", tTicket.Active);
                    cmd.Parameters.AddWithValue("@Ticket_ID", tTicket.Ticket_ID);

                    con.Open();
                    cmd.ExecuteNonQuery();
                    con.Close();
                }
            }
            catch (Exception err)
            {
                tTicket.Feedback = "ERROR:  " + err.Message;
            }
        }

        public TroubleTicketModel DeleteTicket(int? id)
        {
            TroubleTicketModel ticket = new TroubleTicketModel();
            try
            {
                using (SqlConnection con = new SqlConnection(connectionString))
                {
                    string strSQL = "DELETE FROM TroubleTickets WHERE Ticket_ID = @Ticket_ID;";
                    SqlCommand cmd = new SqlCommand(strSQL, con);
                    cmd.CommandText = strSQL;

                    cmd.Parameters.AddWithValue("@Ticket_ID", id);

                    con.Open();
                    cmd.ExecuteNonQuery();
                    con.Close();
                }
            }
            catch (Exception err)
            {
                ticket.Feedback = "ERROR: " + err.Message;
            }
            return ticket;
        }
    }
}
