using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Linq;
using System.Collections.Generic;
using System;
using System.Threading.Tasks;
using Razor_Test.Models;
using Microsoft.Extensions.Configuration;

namespace Razor_Test.Pages
{
    public class AddTicketModel : PageModel
    {
        [BindProperty]
        public TroubleTicketModel tTicket { get; set; }

        private readonly IConfiguration _configuration;

        public AddTicketModel(IConfiguration configuration)
        {
            _configuration = configuration;
        }

        public void OnGet()
        {
        }

        public IActionResult OnPost()
        {
            IActionResult temp;

            if (ModelState.IsValid == false)
            {
                foreach (var state in ModelState)
                {
                    var key = state.Key;
                    var value = state.Value;
                    if (value.Errors.Any())
                    {
                        // Log or handle the errors
                        Console.WriteLine($"{key}: {string.Join(", ", value.Errors.Select(e => e.ErrorMessage))}");
                    }
                }
                temp = Page();
            } else
            {
                if (tTicket is null == false)
                {
                    TroubleTicketDataAccessLayer factory = new TroubleTicketDataAccessLayer(_configuration);
                    factory.Create(tTicket);
                }
                temp = Page();
            }

            return temp;
        }
    }
}
