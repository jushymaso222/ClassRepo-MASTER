using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

using Microsoft.AspNetCore.Session;
using Microsoft.AspNetCore.Http;

namespace Razor_Test.Pages.Admin
{
    public class ControlPanelModel : PageModel
    {
        public IActionResult OnGet()
        {
            IActionResult temp;

            if (HttpContext.Session.GetString("TicketAdmin_Email") is null)
            {
                temp = RedirectToPage("/Admin/Index");
            }
            else
            {
                temp = Page();
            }

            return temp;
        }
    }
}
