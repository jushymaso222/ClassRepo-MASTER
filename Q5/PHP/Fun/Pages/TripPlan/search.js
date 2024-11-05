var searchButton = document.getElementById("search-button");
var content = document.getElementById(`form-search`);

searchButton.addEventListener(`click`, function(e) {
  window.location = `../Search/search.php?search=${content.value}`;
})

content.addEventListener('keydown', (event) => {
  if (event.key === 'Enter') {
    window.location = `../Search/search.php?search=${content.value}`;
  }
});