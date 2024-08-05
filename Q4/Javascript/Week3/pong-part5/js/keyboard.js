//array of keys
var keys = [];
let lastKey;

//keydown code
document.addEventListener(`keydown`, (e)=>{
    keys[e.key]=true;
    lastKey = e.key;
    console.log(e.key)
})


//keyup code
document.addEventListener(`keyup`, (e)=>{
    keys[e.key]=false;
})
