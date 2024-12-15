class Cell {
  
  constructor(xoffset, yoffset) {
    this.x = xoffset;
    this.y = yoffset;
    this.size = 100;
    this.fillColor = color(21);
    this.outlineColor = color(90);
    this.textColor = color(255);
    this.text = "";
  }
  
  show() {
    stroke(this.outlineColor);
    strokeWeight(2);
    fill(this.fillColor);
    textFont(font);
    square(this.x, this.y, this.size); 
    noStroke();
    fill(this.textColor);
    textSize(60);
    let newX;
    if (this.text == "I") {
      newX = this.x + 10;
    } else if (this.text == "W" || this.text == "M") {
      newX = this.x - 5;
    } else {
      newX = this.x;
    }
    text(this.text, newX+30, this.y+70);
  }
}