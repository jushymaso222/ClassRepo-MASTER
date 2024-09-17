using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

using Microsoft.AspNetCore.Session;
using Microsoft.AspNetCore.Http;

using Razor_Test.Models;
using Microsoft.Extensions.Configuration;

namespace Razor_Test.Pages.Admin
{
    public class ControlPanelModel : PageModel
    {
        private readonly IConfiguration _configuration;
        TroubleTicketDataAccessLayer factory;
        public List<TroubleTicketModel> tix { get; set; }

        public ControlPanelModel(IConfiguration configuration)
        {
            _configuration = configuration;
            factory = new TroubleTicketDataAccessLayer(_configuration);
        }
        public IActionResult OnGet()
        {
            IActionResult temp;

            if (HttpContext.Session.GetString("TicketAdmin_Email") is null)
            {
                temp = RedirectToPage("/Admin/Index");
            }
            else
            {
                tix = factory.GetActiveRecords().ToList();
                temp = Page();
            }

            return temp;
        }
    }
}
