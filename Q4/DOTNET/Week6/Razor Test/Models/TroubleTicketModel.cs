namespace Razor_Test.Models
{
    public class TroubleTicketModel
    {
        public int Ticket_ID { get; set; }
        public string Ticket_Title { get; set; }
        public string Ticket_Desc { get; set; }
        public string Category { get; set; }
        public string Reporting_Email { get; set; }
        public DateTime Orig_Date { get; set; }
        public DateTime Close_Date { get; set; }
        public string Responder_Notes { get; set; }
        public string Responder_Email { get; set; }
        public bool Active { get; set; }

    }
}
