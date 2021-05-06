/*****************************************/
/*             Inställningar             */
/*****************************************/
// Hitta element på sidan
const canvas = document.querySelector("canvas");

// Ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// Starta canvar rit-api
var ctx = canvas.getContext("2d");

/*****************************************/
/*          Innan loopen startar             */
/*****************************************/
// Ladda in grafiken
var tank = new Image();
tank.src = "./bilder/tank-sprite.png";
var coin = new Image();
coin.src = "./bilder/coin.png";

var tankRutor = [0, 0, 0, 1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6];
var i = 0;
var coinRutor = [0, 0, 0, 1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6];
var r = 0;

// för att rita ut tank figuren
function ritaTank() {
    ctx.drawImage(tank, 32 * tankRutor[i], 0, 32, 32, 100, 100, 32, 32);

    // hoppa till nästa
    i++;
    if (i > tankRutor.length - 1) {
        i = 0;
    }
}
function ritaCoin() {
    ctx.drawImage(coin, 84 * coinRutor[i], 0, 84, 84, 100, 100, 84, 84);

    // hoppa till nästa
    i++;
    if (i > coinRutor.length - 1) {
        i = 0;
    }
}


/*****************************************/
/*          Animationsloopen             */
/*****************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaTank();
    ritaCoin();
    
    requestAnimationFrame(loopen);
}
loopen();