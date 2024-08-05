/*--------
    Make the Options Button 
    . on click
    . show or hide the `.sides` div
---------*/

let optBtn = document.querySelector("#options > h2");
optBtn.addEventListener(`click`, toggleOptions);

function toggleOptions(e) {
    let sides = document.querySelector(".sides");

    console.log(sides);
    sides.classList.toggle("hidden");
}

/*---------
    Program the two fill inputs to do the following:
    . Display the correct colors on the inputs and outputs and paddles    
    . using an `input` event
        . Change the player's fill property to the value of the input
        . Change the pad's fill property  to the player's fill property
        . Show the fill's hex code in the output div 

-----------*/

let fills = document.querySelectorAll(".fill");
let strokes = document.querySelectorAll(".stroke");
let Us = document.querySelectorAll(".u");
let Ds = document.querySelectorAll(".d");
let Ss = document.querySelectorAll(".s");

for (i=0; i < Us.length; i++) {
    Us[i].addEventListener(`keydown`, (e) => {
        e.target.nextSibling.innerHTML = e.key;
        e.target.value = e.key;
        e.target.blur();
    })
    Us[i].addEventListener(`focus`, (e) => {
        currentState = "pause";
    })
}

for (i=0; i < Ds.length; i++) {
    Ds[i].addEventListener(`keydown`, (e) => {
        e.target.nextSibling.innerHTML = e.key;
        e.target.value = e.key;
        e.target.blur();
    })
    Ds[i].addEventListener(`focus`, (e) => {
        currentState = "pause";
    })
}

for (i=0; i < Ss.length; i++) {
    Ss[i].addEventListener(`keydown`, (e) => {
        e.target.nextSibling.innerHTML = e.key;
        e.target.value = e.key;
        e.target.blur();
    })
    Ss[i].addEventListener(`focus`, (e) => {
        currentState = "pause";
    })
    
}


function updateProperties() {
    console.log("update");
    for (i=0; i < fills.length; i++) {
        player[i].pad.fill = fills[i].value;
        fills[i].nextSibling.innerHTML = fills[i].value;
        player[i].pad.stroke = strokes[i].value;
        strokes[i].nextSibling.innerHTML = strokes[i].value; 

        player[i].keys.u = Us[i].value;
        player[i].keys.d = Ds[i].value;
        player[i].keys.s = Ss[i].value;
    }
}


/*---------
    Program the six key inputs to do the following:
    . Display the correct key names for each player   
    . using a `keydown` event
        .Display the correct key name in the input
        .Change the player's key to the value of the input
        .Show the player's key in the output div 
-----------*/




