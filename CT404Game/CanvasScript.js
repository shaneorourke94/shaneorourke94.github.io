document.addEventListener('DOMContentLoaded', startGame, false);

function startGame(){

console.log("Started script");

// Initialise Player Canvas
var canvas = document.getElementById("playerCanvas"), ctx = canvas.getContext("2d");
canvas.width = 800, canvas.height = 500;

// Initialise Background Canvas and Variables
var backgroundCtx = document.getElementById("backgroundCanvas").getContext("2d");
var backgroundCanvas = document.createElement("canvas");
var backgroundScrollImg = new Image();
var backgroundImgWidth = 0;
var backgroundImgHeight = 0;
var backgroundCanvasWidth = 800;
var backgroundCanvasHeight = 500;
var backgroundScrollVal = 0;
var backgroundSpeed = 2;
backgroundScrollImg.src = "block_dodging_background.png";

// Array used to store the top block objects.
var topBlocks = [];
topBlocks.push(new topBlock(10, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(50, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(90, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(130, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(170, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(210, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(250, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(290, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(330, -3, 0, getRandomColor()));
topBlocks.push(new topBlock(370, -3, 0, getRandomColor()));

// Array used to store the bottom block objects.
var bottomBlocks = [];
bottomBlocks.push(new bottomBlock(370, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(330, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(290, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(250, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(210, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(170, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(130, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(90, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(50, -3, 0, getRandomColor()));
bottomBlocks.push(new bottomBlock(10, -3, 0, getRandomColor()));

// Needed in order to pause the game.
var frame;
var paused = false;

var score = 0;

var jumpSound = new Audio("jump.wav");
var pausePlaySound = new Audio("pause_play_sound.wav");

document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);

// Player can pause the game using the Enter key.
function pauseGame()
{
    if(paused) {
        frame = requestAnimationFrame(draw);
        paused = false;
        console.log("Restarted game.");
    }
    else {
        cancelAnimationFrame(frame);
        paused = true;
        console.log("Paused game.");
    }
}

// Create a new Player object.
var player = new Player();

// Player object constructor.
function Player() {
    this.xPos = canvas.width/2 - canvas.width/3;
    this.yPos = canvas.height/2;
    this.playerDX = 3;
    this.playerDY = 0;
    this.radius = 20;
    this.color = getRandomColor();
    this.spaceBarPressed = false;   
}

// Draws a player object.
function drawPlayer(plyr) {
    ctx.beginPath();
    ctx.arc(plyr.xPos, plyr.yPos, plyr.radius, 0, Math.PI*2);  
    ctx.stroke();  
    ctx.fillStyle = plyr.color;
    ctx.fill();
    ctx.closePath();
}

// Top Block object constructor.
function topBlock(height, dx, dy, color) {

    this.xPos = (canvas.width);
    this.yPos = 0;
    this.width = 60; // Width remains constant
    this.height = height;
    this.dx = dx;
    this.dy = dy;
    this.color = color;
    this.roundCheck = false;

}

// Bottom Block object constructor.
function bottomBlock(height, dx, dy, color) {

    this.xPos = (canvas.width);
    this.yPos = (canvas.height-height);
    this.width = 60; // Width remains constant
    this.height = height;
    this.dx = dx;
    this.dy = dy;
    this.color = color;
    this.roundCheck = false;

}

// Draws any block object.
function drawBlock(block) {

    backgroundCtx.beginPath();
    backgroundCtx.strokeRect(block.xPos, block.yPos, block.width, block.height);
    backgroundCtx.fillStyle = block.color;
    backgroundCtx.fillRect(block.xPos, block.yPos, block.width, block.height);
    backgroundCtx.closePath();

    block.xPos = block.xPos + block.dx;

}

// Detects whether the player collides with a top block or top or bottom of the canvas.
function collisionDetectionTop(block, plyr) {

    if ((plyr.xPos + player.radius > block.xPos) && ((plyr.yPos - player.radius) < block.yPos + block.height) 
            && (plyr.xPos < block.xPos + block.width)) {
        return true;    
    } else if(plyr.yPos + plyr.playerDY > (canvas.height - player.radius) || plyr.yPos + plyr.playerDY < player.radius){ // If collision with top or bottom.
        return true;
    } else {
        return false;
    }

}

// Detects whether the player collides with a bottom block or top or bottom of the canvas.
function collisionDetectionBottom(block, plyr) {

    if ((plyr.xPos + player.radius > block.xPos) && (plyr.yPos + player.radius > block.yPos) 
            && (plyr.xPos < block.xPos + block.width))
    {
        return true;    
    } else if(plyr.yPos + plyr.playerDY > (canvas.height - player.radius) || plyr.yPos + plyr.playerDY < player.radius){ // If collision with top or bottom.
        return true;
    } else {
        return false;
    }

}

// Checks if a block passes a certain point. 
function checkIfBlockBeaten(block) {
    
    if (block.roundCheck == false){
        if (player.xPos + 200 > block.xPos + block.width)
        {
            return true;    
        } else {
            return false;
        }
    } else {
        if (0 > block.xPos + block.width)
        {
                return true;    
        } else {
            return false;
        }
    }
}

// Returns a random integer between min and max.
function getRandomInt(min, max){
     var rand = Math.random() * (max - min) + min;
     var randomInt = Math.floor(rand);

     return randomInt;
}

// Returns a random color.
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
 
// Handler for spacebar and enter keys.
function keyDownHandler(e) {
    if(e.keyCode == 32) {
        player.spaceBarPressed = true;
        jumpSound.play();
    }

    if(e.keyCode == 13)
    {
        pauseGame();
        pausePlaySound.play();
    }
}

// Handler for spacebar key.
function keyUpHandler(e) {
    if(e.keyCode == 32) {
        player.spaceBarPressed = false;
    }
}

// Draws the edges of the canvas, the score and the instructions.
function drawText() {
    ctx.beginPath();
    ctx.strokeRect(1, 1, 100, 25);
    ctx.fillStyle = "white";
    ctx.fillRect(1, 1, 100, 25);
    ctx.closePath();
    ctx.font = "20px Calibri";
    ctx.fillStyle = "black";
    ctx.fillText("SCORE: " + score, 8, 20);
    ctx.fillText("Spacebar = Jump", 660, 20);
    ctx.fillText("Enter = Pause/Play", 645, 40);
}

// Initialises the image background.
function loadImageBackground(){
    backgroundImgWidth = backgroundScrollImg.width,
    backgroundImgHeight = backgroundScrollImg.height;
    backgroundCanvas.width = backgroundImgWidth;
    backgroundCanvas.height =  backgroundImgHeight;
    drawBackground();   
}

// Draws the moving canvas
function drawBackground(){
    backgroundCtx.clearRect(0,0,backgroundCanvasWidth,backgroundCanvasHeight);

    if(backgroundScrollVal >= backgroundCanvasWidth){
        backgroundScrollVal = 0;
    }

    backgroundScrollVal = backgroundScrollVal + backgroundSpeed;
    backgroundCtx.fillRect(-100, -100, 1000, 1000);

    // Background appears to move because of the scroll value constantly changing.

    // Draws the first background image moving right to left.
     backgroundCtx.drawImage(backgroundScrollImg,-backgroundScrollVal,0,backgroundImgWidth, backgroundImgHeight);
     // Draws the scond background image moving at the end of the first background image moving right to left.
     backgroundCtx.drawImage(backgroundScrollImg,backgroundCanvasWidth-backgroundScrollVal,0,backgroundImgWidth, backgroundImgHeight);
     backgroundCtx.strokeRect(0, 0, 800, 500);
     backgroundCtx.closePath();
    
}

// Returns an array of 5 random, unique integers.
function createUniqueInts(array){
    var arr = [];
    while(arr.length < 5){
      var randomnumber=getRandomInt(0, array.length);
      var found=false;
      for(var i=0;i<arr.length;i++){
        if(arr[i]==randomnumber){found=true;break}
      }
      if(!found)arr[arr.length]=randomnumber;
    }
    return arr;
}

var uniqueIntsArray = [];
uniqueIntsArray = createUniqueInts(bottomBlocks);

// Used to pick blocks from the top and bottom blocks array at random.
var randIntBlockA = uniqueIntsArray[0];
var randIntBlockB = uniqueIntsArray[1];
var randIntBlockC = uniqueIntsArray[2];
var randIntBlockD = uniqueIntsArray[3];
var randIntBlockE = uniqueIntsArray[4];

// Used to update the score when a block is passed.
var checkBlockA = false;
var checkBlockB = false;
var checkBlockC = false;
var checkBlockD = false;
var checkBlockE = false;


// Main drawing method.
function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    loadImageBackground();
    drawPlayer(player);
    
    // Draws a top block and bottom block.
    drawBlock(topBlocks[randIntBlockA]);
    drawBlock(bottomBlocks[randIntBlockA]);

    // Handles the top blocks collisions.
    if (collisionDetectionTop(topBlocks[randIntBlockA], player) || collisionDetectionTop(topBlocks[randIntBlockB], player) || 
        collisionDetectionTop(topBlocks[randIntBlockC], player) || collisionDetectionTop(topBlocks[randIntBlockD], player) ||
        collisionDetectionTop(topBlocks[randIntBlockE], player)) {
        alert("TOP BLOCK COLLISION - GAME OVER");
        document.location.reload();
    } 

    // Handles the bottom blocks collisions.
    if (collisionDetectionBottom(bottomBlocks[randIntBlockA], player) || collisionDetectionBottom(bottomBlocks[randIntBlockB], player) || 
        collisionDetectionBottom(bottomBlocks[randIntBlockC], player) || collisionDetectionBottom(bottomBlocks[randIntBlockD], player) ||
        collisionDetectionBottom(bottomBlocks[randIntBlockE], player)) {
        alert("BOTTOM BLOCK COLLISION - GAME OVER");
        document.location.reload();
    }  

    // Following code checks whether top and bottom blocks A, B, C, D, E have been beaten.
    if (checkIfBlockBeaten(bottomBlocks[randIntBlockA])) {
        drawBlock(topBlocks[randIntBlockB]);
        drawBlock(bottomBlocks[randIntBlockB]);
        
        if (checkBlockA == false){
            score++;
            checkBlockA = true;
        }
    }

    if (checkIfBlockBeaten(bottomBlocks[randIntBlockB])) {
        drawBlock(topBlocks[randIntBlockC]);
        drawBlock(bottomBlocks[randIntBlockC]);
        if (checkBlockB == false){
            score++;
            checkBlockB = true;
        }
    }

    if (checkIfBlockBeaten(bottomBlocks[randIntBlockC])) {
        drawBlock(topBlocks[randIntBlockD]);
        drawBlock(bottomBlocks[randIntBlockD]);
        if (checkBlockC == false){
            score++;
            checkBlockC = true;
        }
    }

    if (checkIfBlockBeaten(bottomBlocks[randIntBlockD])) {
        topBlocks[randIntBlockE].roundCheck = true;
        drawBlock(topBlocks[randIntBlockE]);
        bottomBlocks[randIntBlockE].roundCheck = true;
        drawBlock(bottomBlocks[randIntBlockE]);
        if (checkBlockD == false){
            score++;
            checkBlockD = true;
        }
    }

    if (checkIfBlockBeaten(bottomBlocks[randIntBlockE])) { // Way to reset the x positions back to the initial values.

        if (checkBlockE == false){
            score++;
            checkBlockE = true;
        }

        // Resets the xPositions of each block back to the edge of the canvas.
        bottomBlocks[randIntBlockA].xPos = canvas.width;
        bottomBlocks[randIntBlockB].xPos = canvas.width;
        bottomBlocks[randIntBlockC].xPos = canvas.width;
        bottomBlocks[randIntBlockD].xPos = canvas.width;
        bottomBlocks[randIntBlockE].xPos = canvas.width;

        // Used as an indicator to show a round of 5 blocks have been beaten.
        bottomBlocks[randIntBlockE].roundCheck = false;

        topBlocks[randIntBlockA].xPos = canvas.width;
        topBlocks[randIntBlockB].xPos = canvas.width;
        topBlocks[randIntBlockC].xPos = canvas.width;
        topBlocks[randIntBlockD].xPos = canvas.width;
        topBlocks[randIntBlockE].xPos = canvas.width;

        topBlocks[randIntBlockE].roundCheck = false;

        uniqueIntsArray = createUniqueInts(bottomBlocks);
        randIntBlockA = uniqueIntsArray[0];
        randIntBlockB = uniqueIntsArray[1];
        randIntBlockC = uniqueIntsArray[2];
        randIntBlockD = uniqueIntsArray[3];
        randIntBlockE = uniqueIntsArray[4];

        checkBlockA = false;
        checkBlockB = false;
        checkBlockC = false;
        checkBlockD = false;
        checkBlockE = false;

    }

    drawText();

    // Player falls until space bar is pressed.
    if (player.spaceBarPressed) {
        console.log("Space bar pressed");
        player.yPos = player.yPos + (player.playerDY - 12);
    }else {
        player.yPos = player.yPos + (player.playerDY + 2);
    }

    frame = requestAnimationFrame(draw); 

}

draw();

}   