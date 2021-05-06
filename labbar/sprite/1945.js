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
// var tank = new Image();
// tank.src = "./bilder/tank-sheet.png";

// var tank.rutor = [1, 2, 3, 4, 5, 6, 7, 8];
// var i = 0;

// var kör = false;
// var tankX = 100, tank.y = 100, rotation = 0;

// objekt tank
var tank = {
    bild: new Image(),
    rutor: [0,1, 2],
    i: 0,
    kör: false,
    y: 100,
    x: 100,
    rotation: 0
}
tank.bild.src = "./bilder/1945.png";

// för att rita ut tank figuren
function ritaTank() {
    // plocka ut rätt ruta
    var x = tank.i * 64 + 4;
    var y = 400;
    //spara koordinatsystem
    ctx.save();
    //flytta koordinatsystem
    ctx.translate(tank.x, tank.y);
    //Vrida koordinatsystem
    ctx.rotate(tank.rotation / 180 * Math.PI);
    ctx.drawImage(tank.bild, x, y, 64, 64, -32, -32, 64, 64);
    //återställ koordinatsystemet
    ctx.restore();

    // hoppa till nästa
    if (tank.kör) {
        tank.i += 5;
    }
    if (tank.i > tank.rutor.length - 1) {
        tank.i = 0;
    }
}



/*****************************************/
/*          Animationsloopen             */
/*****************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaTank();

    requestAnimationFrame(loopen);
}
loopen();

/*****************************************/
/*          Interaktivitet               */
/*****************************************/
window.addEventListener("keydown", function (e) {
    switch (e.code) {
        case "ArrowDown":
            tank.y += 3;
            tank.rotation = 180;
            break;
        case "ArrowUp":
            tank.y -= 3;
            tank.rotation = 0;
            break;
        case "ArrowLeft":
            tank.x -= 3;
            tank.rotation = 270;
            break;
        case "ArrowRight":
            tank.x += 3;
            tank.rotation = 90;
            break;
    }
    tank.kör = true;
})
window.addEventListener("keyup", function () {
    tank.kör = false;
})