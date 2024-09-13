using System.ComponentModel.DataAnnotations;
using Razor_Test.Models;

namespace Razor_Test.Models

{
    public class TroubleTicketModel
    {
        [Required]
        public int Ticket_ID { get; set; }

        [Required, StringLength(255)]
        public string Ticket_Title { get; set; }

        [Required]
        public string Ticket_Desc { get; set; }

        [Required]
        [StringOptionsValidate(Allowed = new String[] { "Monitor", "Computer", "Printer", "Software Install", "Software Upgrade", "Configuration", "Internet" }, ErrorMessage = "Sorry...Category is invalid. Categories: Monitor, Computer, Printer, Software Install, Software Upgrade, Configuration, Internet")]
        public string Category { get; set; }

        [Required, EmailAddress]
        public string Reporting_Email { get; set; }

        [Required]
        [Display(Name = "Original date of the problem.")]
        [DataType(DataType.DateTime), DisplayFormat(DataFormatString = "{0:MM/dd/yyyy hh:mm:ss tt", ApplyFormatInEditMode = true)]
        [MyDate(ErrorMessage = "Future date entry not allowed")]
        public DateTime Orig_Date { get; set; }

        [Required]
        [Display(Name = "Date of solutions/closure.")]
        [DataType(DataType.DateTime), DisplayFormat(DataFormatString = "{0:MM/dd/yyyy hh:mm:ss tt", ApplyFormatInEditMode = true)]
        [MyDate(ErrorMessage = "Future date entry not allowed")]
        public DateTime Close_Date { get; set; }


        public string Responder_Notes { get; set; }

        [EmailAddress]
        public string Responder_Email { get; set; }

        [Required]
        public bool Active { get; set; }

    }
}
