let clBtn = document.getElementById("corner")
let popup = document.getElementById("popup")

clBtn.addEventListener(`click`, (e) => {
    popup.classList.add("hidden");
});

let openPopup = document.getElementById("openPopup")

openPopup.addEventListener(`click`, (e) => {
    popup.classList.remove("hidden");
});