using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

using Razor_Test.Models;
using Microsoft.Extensions.Configuration;

namespace Razor_Test.Pages.Admin
{
    public class DeleteTicketModel : PageModel
    {
        TroubleTicketDataAccessLayer factory;
        public TroubleTicketModel tTicket { get; set; }
        private readonly IConfiguration _configuration;

        public DeleteTicketModel(IConfiguration configuration)
        {
            _configuration = configuration;
            factory = new TroubleTicketDataAccessLayer(_configuration);
        }

        public ActionResult OnGet(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }
            tTicket = factory.GetOneRecord(id);
            if (tTicket == null)
            {
                return NotFound();
            }
            return Page();
        }

        public ActionResult OnPost(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            factory.DeleteTicket(id);
            return RedirectToPage("/Admin/ControlPanel");
        }
    }
}
