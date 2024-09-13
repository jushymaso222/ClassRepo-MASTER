using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;

using Razor_Test.Models;
using Microsoft.Extensions.Configuration;

namespace Razor_Test.Pages
{
    public class IndexModel : PageModel
    {
        private readonly ILogger<IndexModel> _logger;

        [BindProperty(SupportsGet = true)]
        public string FName { get; set; }

        private readonly IConfiguration _configuration;

        TroubleTicketDataAccessLayer factory;
        public List<TroubleTicketModel> tix { get; set; }

        public IndexModel(IConfiguration configuration)
        {
            _configuration = configuration;
            factory = new TroubleTicketDataAccessLayer(_configuration);
        }

        public void OnGet()
        {
            if (string.IsNullOrWhiteSpace(FName))
            {
                FName = "YOU!";
            }

            tix = factory.GetActiveRecords().ToList();
        }
    }
}
