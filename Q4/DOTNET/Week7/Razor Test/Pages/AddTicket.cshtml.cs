using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Linq;
using System.Collections.Generic;
using System;
using System.Threading.Tasks;
using Razor_Test.Models;

namespace Razor_Test.Pages
{
    public class AddTicketModel : PageModel
    {
        [BindProperty]
        public TroubleTicketModel tTicket { get; set; }

        public void OnGet()
        {
        }

        public IActionResult OnPost()
        {
            IActionResult temp;

            if (ModelState.IsValid == false)
            {
                temp = Page();
            } else
            {   
                temp = Page();
            }

            return temp;
        }
    }
}
