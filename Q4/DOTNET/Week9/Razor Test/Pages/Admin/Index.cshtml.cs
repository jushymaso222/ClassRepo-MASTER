using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

using Razor_Test.Models;
using Microsoft.Extensions.Configuration;
using Microsoft.AspNetCore.Session;
using Microsoft.AspNetCore.Http;

namespace Razor_Test.Pages.Admin
{
    public class IndexModel : PageModel
    {
        [BindProperty]
        public TicketAdmin tAdmin { get; set; }
        private readonly IConfiguration _configuration;

        public IndexModel(IConfiguration configuration)
        {
            _configuration = configuration;
        }

        public void OnGet()
        {
            HttpContext.Session.SetInt32("test", 5);
        }

        public IActionResult OnPost()
        {
            IActionResult temp;
            List<TicketAdmin> lstTicketAdmin = new List<TicketAdmin>();

            if (ModelState.IsValid == false)
            {
                temp = Page();
            }
            else
            {
                if (tAdmin != null)
                {
                    TicketAdminDataAccessLayer factory = new TicketAdminDataAccessLayer(_configuration);
                    lstTicketAdmin = factory.GetAdminLogin(tAdmin).ToList();

                    if (lstTicketAdmin.Count > 0)
                    {
                        HttpContext.Session.SetInt32("TicketAdmin_ID", lstTicketAdmin[0].TicketAdmin_ID);
						HttpContext.Session.SetString("TicketAdmin_Email", lstTicketAdmin[0].TicketAdmin_Email);
                        temp = Redirect("/Admin/ControlPanel");
					}
                    else
                    {
                        tAdmin.Feedback = "Login Failed.";
                        temp = Page();
                    }
                }
                else
                {
                    temp = Page();
                }
            }
            return temp;
        }
    }
}
