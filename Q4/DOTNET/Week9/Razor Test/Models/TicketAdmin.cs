using System.ComponentModel.DataAnnotations;
using Razor_Test.Models;

using System.Data;
using System.Data.SqlClient;

using Microsoft.Extensions.Configuration;

using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Session;

namespace Razor_Test.Models
{
    public class TicketAdmin
    {
        [Required]
        public int TicketAdmin_ID { get; set; }

        [EmailAddress]
        [Display(Name = "Username")]
        public string TicketAdmin_Email { get; set; }

        [Required, StringLength(20)]
        [DataType(DataType.Password)]
        [Display(Name = "Password")]
        public string TicketAdmin_PW { get; set; }

        public string? Feedback { get; set; }

    }
}
