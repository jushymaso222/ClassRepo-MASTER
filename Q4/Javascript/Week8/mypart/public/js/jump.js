//canvas and context
var c = document.querySelector(`#jump`);
var ctx = c.getContext(`2d`);
var states = [];
var o = [];

var timer, currentState;
var scoreBoard;
var player;
var ground;
var plat;

init();

//Main Game Loop
function main()
{
    //erases the canvas
    ctx.clearRect(0,0,c.width,c.height);
    states[currentState]();
}

function init()
{   
    player = new Box().setProps({x: c.width/2, w:64 , h:64,  force:1, fill:`#ffff00`});
    ground = new Box().setProps({fill:`#00ff00`, h:64, w:c.width, y:c.height });
    plat = [
        new Box().setProps({fill:`#883333`, h:64, w:200, y:-c.height/2, vy:5 }),
        new Box().setProps({fill:`#883333`, h:64, w:200, y:-c.height, vy:5}),
    ]

    //pad 1 and 2
    o[0] = player
    o[1] = ground
    o[2] = plat[0]
    o[3] = plat[1]
    scoreBoard = document.querySelectorAll(`#score div p`);
    currentState = `game`;
    //timer to make the game run at 60fps
    clearTimeout(timer);
    timer = setInterval(main, 1000/60);
}

states[`death`] = function()
{
    score(player.score)
    sendHs()
    init()

}
states[`pause`] = function(){
    o.forEach(function (i){
        i.draw()
    })
    if(keys[`Escape`])
    {
        currentState =`game`
    }
   
}
states[`game`] = function()
{

    if(keys[`ArrowLeft`])
    {
        player.vx += -1
    }
    if(keys[`ArrowRight`])
    {
        player.vx += 1
    }

    //friction
    player.vx *= .87
    //gravity
    player.vy += 1;
    player.move();

    if(player.y > c.height +player.h)
    {
        currentState = `death`
    }
    plat.forEach((i)=>{
        i.move()
        if(i.y > c.height + i.h)
        {
            i.y = -i.h
            i.x = rand(0, c.width)
        }
        while(i.collidePoint(player.bottom()) && player.vy > 1)
        {
            console.log(0)
            player.y--;
            player.vy = -30;
            ground.x = 10000;
            player.score += 2;
            console.log(player.score)
        }
    })

    while(ground.collidePoint(player.bottom()))
    {
        console.log(0)
        player.y--;
        player.vy = -30;
    }
    while(player.x < 0 + player.w/2)
    {
        player.x++;
        player.vx = 30;
    }
   while(player.x > c.width - player.w/2)
    {
        player.x--;
        player.vx = -25;
    }
    
    //draw the objects (Uses the array forEach function where i is the object stored in the o Array)
    o.forEach(function (i){
        i.draw()
    })
    score()
}

async function sendHs() {

    await fetch("http://localhost:80/hs", {
 
         // Adding method type
         method: "POST",
         
         // Adding body or contents to send
         body: JSON.stringify({
            score: player.score
        }),
         
         // Adding headers to the request
         headers: {
             "Content-type": "application/json; charset=UTF-8"
         }
     })
 }


async function storeHS(score) {
    let promise = await fetch(`http://localhost:80/hs/${score}`)
    let data = await promise.json(data)
}

function score(endScore = 0) {
    let scoresDiv = document.getElementById(`score`)
    let scoreDiv = scoresDiv.children[0]
    let highscoreDiv = scoresDiv.children[1]
    let score = scoreDiv.children[0]
    let highscore = highscoreDiv.children[0]

    curHighscore = highscore.innerHTML.substring(11)
    score.innerHTML = `score: ${player.score}`
    if (endScore > 0 && endScore > curHighscore) {
        highscore.innerHTML = `highscore: ${endScore}`
    }
}

function rand(low, high)
{
    return Math.random() * (high - low) + low;
}




