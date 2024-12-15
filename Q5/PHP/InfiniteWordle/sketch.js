let cells;
let font;
let currentGuess = 0;
let winTally = 0;
let wrongLetters = [];
let gameLoop = true;

function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

const wordToGuess = words[getRandomNumber(0, words.length)];

let guess = "";

const alphabet = "abcdefghijklmnopqrstuvwxyz"

function preload() {
  font = loadFont("fgoth.otf");
}

function setup() {
  createCanvas(800, 1100);
  
  cells = [];
  
  let x = 120;
  let y = 200;
  let distance = 110;
  
  for(let i = 0; i < 6; i++) {
    wordGroup = [];
    x = 120;
    for(let j = 0; j < 5; j++) {
      wordGroup.push(new Cell(x,y));
      x += distance;
    }
    y += distance;
    cells.push(wordGroup)
  }
}

function keyPressed() {  
  if(keyCode === BACKSPACE) {
    if (guess.length > 0) {
      guess = guess.slice(0, -1);
    }
  } else if (keyCode === ENTER) {
    if (guess.length == 5) {
      let wordLetters = wordToGuess.split("");
      let alreadyColored = {};
      let notColored = {};
      let greenColored = {};
      winTally = 0
      
      for (let i = 0; i < 5; i++) {
        if (wordToGuess[i].toUpperCase() in notColored) {
          notColored[wordToGuess[i].toUpperCase()] += 1;
        } else {
          notColored[wordToGuess[i].toUpperCase()] = 1;
        }
        
        if (cells[currentGuess][i].text == wordToGuess[i].toUpperCase()) {
          cells[currentGuess][i].outlineColor = color(101, 176, 91);
          cells[currentGuess][i].fillColor = color(101, 176, 91);
          
          winTally += 1;
          if (cells[currentGuess][i].text.toUpperCase() in greenColored) {
            greenColored[cells[currentGuess][i].text] += 1;
          } else {
            greenColored[cells[currentGuess][i].text] = 1;
          }
        }
      }
      alreadyColored = greenColored;
      
      for (let i = 0; i < 5; i++) {
        if (cells[currentGuess][i].text != wordToGuess[i].toUpperCase() && wordToGuess.toUpperCase().includes(cells[currentGuess][i].text)) {
          if (!(cells[currentGuess][i].text in alreadyColored) || (alreadyColored[cells[currentGuess][i].text] < notColored[cells[currentGuess][i].text])) {
            cells[currentGuess][i].outlineColor = color(201, 174, 66);
            cells[currentGuess][i].fillColor = color(201, 174, 66);
            if (cells[currentGuess][i].text in alreadyColored) {
              alreadyColored[cells[currentGuess][i].text] += 1;
            } else {
              alreadyColored[cells[currentGuess][i].text] = 1;
            }
          } else {
            cells[currentGuess][i].outlineColor = color(90);
            cells[currentGuess][i].fillColor = color(90);
            if(!wrongLetters.includes(cells[currentGuess][i].text)) {
              wrongLetters.push(cells[currentGuess][i].text);
            }
          }      
        } else if (cells[currentGuess][i].text != wordToGuess[i].toUpperCase()) {
          cells[currentGuess][i].outlineColor = color(90);
          cells[currentGuess][i].fillColor = color(90);
          if(!wrongLetters.includes(cells[currentGuess][i].text)) {
            wrongLetters.push(cells[currentGuess][i].text);
          }
        }
      }
      currentGuess += 1;
      guess = "";
    }
  }
  else if(guess.length < 5) {
    if (alphabet.includes(key)) {
      guess += key;
    }
  }
  
  for (let i = 0; i < 5; i++) {
    try {
      cells[currentGuess][i].text = guess[i].toUpperCase();
      cells[currentGuess][i].outlineColor = color(140); 
    } 
    catch {
      if (currentGuess <= 5) {
        cells[currentGuess][i].text = "";
        cells[currentGuess][i].outlineColor = color(90); 
      }
    }
  }
}

function draw() {
  background(21);
  
  for (let i = 0; i < cells.length; i++) {
    if (i == currentGuess) {
      for (let j = 0; j < cells[i].length; j++) {
        if (wrongLetters.includes(cells[i][j].text)) {
          cells[i][j].textColor = color(110);
        } else {
          cells[i][j].textColor = color(255);
        }
      }
    }
  }
  
  cells.forEach((wordGroup) => {
    wordGroup.forEach((cell) => {
      cell.show();
      
    })
  });
  
  textFont(font);
  noStroke();
  fill(255);
  textSize(80);
  text(`Wordle`, 260,100)
  
  if (currentGuess > 5 && guess != wordToGuess) {
    textFont(font);
    noStroke();
    fill(255);
    textSize(60);
    text("You Lose!", 250,950)
    text(`The word was: ${wordToGuess.toUpperCase()}`, 90,1000)
    noLoop()
  } else {
    if (winTally == 5) {
      textFont(font);
      noStroke();
      fill(255);
      textSize(60);
      text("You Win!", 250,950)
      noLoop()
    }
  }
}