using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

using Razor_Test.Models;
using Microsoft.Extensions.Configuration;

namespace Razor_Test.Pages.Admin
{
    public class EditTicketModel : PageModel
    {
        private readonly IConfiguration _configuration;

        [BindProperty]
        public TroubleTicketModel tTicket { get; set; }

        public TroubleTicketDataAccessLayer factory;

        public EditTicketModel(IConfiguration configuration)
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
            else
            {
                tTicket = factory.GetOneRecord(id);
            }
            if (tTicket == null)
            {
                return NotFound();
            }
            else
            {
                return Page();
            }
        }

        public ActionResult OnPost()
        {
            if (!ModelState.IsValid)
            {
                return Page();
            }
            factory.UpdateTicket(tTicket);

            return RedirectToPage("/Admin/ControlPanel") ;
        }
    }
}
