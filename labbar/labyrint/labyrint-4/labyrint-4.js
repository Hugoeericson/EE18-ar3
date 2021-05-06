/*****************************************/
/*             Inställningar             */
/*****************************************/
// Hitta element på sidan
const canvas = document.querySelector("canvas");
const ePoints = document.querySelector("p");

// Ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// Starta canvas rit-api
var ctx = canvas.getContext("2d");

/*****************************************/
/*          Globala variabler            */
/*****************************************/
// Skapa labyrinten
var gubbe = {
    bild: new Image(),
    rutor: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15],
    i: 0,
    kör: false,
    x: 500,
    y: 500,
}
gubbe.bild.src = "./pokemon-red-sprite.png"

var karta = [
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
    1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
];
var lager2 = [
    1, 61, 113, 114, 1, 43, 1, 113, 114, 43, 0, 188, 97, 98, 97, 98, 27, 61, 97, 98,
    27, 97, 98, 1, 97, 98, 188, 53, 1, 51, 97, 98, 113, 114, 113, 114, 43, 0, 113, 114,
    43, 113, 114, 51, 113, 114, 0, 0, 27, 1, 113, 114, 97, 98, 117, 118, 119, 34, 97, 98,
    117, 118, 119, 19, 97, 98, 97, 98, 43, 0, 97, 98, 113, 114, 133, 134, 135, 34, 113, 114,
    133, 134, 135, 51, 113, 114, 113, 114, 0, 27, 113, 114, 1, 1, 149, 150, 151, 7, 8, 9,
    149, 150, 151, 27, 1, 54, 1, 1, 0, 43, 1, 1, 188, 1, 1, 1, 27, 23, 24, 25,
    1, 27, 1, 43, 188, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 1, 43, 39, 40, 41,
    1, 43, 1, 1, 1, 2, 117, 118, 67, 118, 67, 118, 118, 119, 2, 1, 188, 1, 50, 1,
    1, 1, 2, 27, 1, 2, 133, 134, 134, 134, 134, 134, 134, 69, 2, 1, 97, 98, 1, 1,
    7, 8, 9, 43, 27, 2, 133, 134, 52, 47, 48, 50, 134, 135, 2, 50, 113, 114, 1, 53,
    23, 24, 25, 1, 43, 2, 133, 11, 54, 63, 64, 2, 11, 135, 2, 1, 1, 27, 1, 1,
    39, 40, 41, 1, 1, 2, 133, 134, 83, 2, 2, 2, 134, 135, 2, 27, 1, 43, 1, 1,
    1, 1, 2, 1, 1, 2, 149, 181, 134, 106, 106, 134, 184, 151, 2, 43, 1, 1, 1, 1,
    51, 188, 1, 27, 1, 2, 2, 133, 11, 106, 106, 134, 135, 2, 2, 27, 1, 1, 1, 1,
    1, 55, 1, 43, 1, 1, 2, 133, 134, 106, 106, 11, 135, 2, 1, 43, 1, 1, 1, 1,
    1, 1, 1, 1, 54, 1, 2, 133, 134, 106, 106, 137, 69, 2, 1, 1, 1, 1, 54, 1,
    1, 51, 1, 27, 1, 1, 2, 133, 11, 106, 106, 137, 135, 2, 1, 1, 1, 97, 98, 1,
    1, 27, 54, 43, 1, 1, 2, 133, 134, 106, 106, 11, 69, 2, 1, 1, 27, 113, 114, 1,
    1, 43, 1, 1, 97, 98, 2, 133, 134, 106, 106, 137, 135, 2, 1, 1, 43, 1, 1, 1,
    1, 1, 1, 1, 113, 114, 2, 149, 150, 106, 106, 150, 151, 2, 1, 1, 1, 1, 188, 1
];

/*****************************************/
/*          Objekten som syns            */
/*****************************************/
// Spelaren
var kartbild = new Image();
kartbild.src = "./unnamed.png";

/*****************************************/
/*  Kod som körd innan loopen startar    */
/*****************************************/

/*****************************************/
/*          Animationsloopen             */
/*****************************************/
function loopen() {
    ctx.clearRect(0, 0, 800, 600);

    ritaLager();
    ritaLager2();
    ritaGubbe();

    requestAnimationFrame(loopen);
}
loopen();

/*****************************************/
/*              Funktioner               */
/*****************************************/
// Rita kartan
function ritaLager() {
    var index = 0;

    for (var rad = 0; rad < 20; rad++) {

        for (var kolumn = 0; kolumn < 20; kolumn++) {
            //console.log(rad, kolumn);

            var x = Math.floor(karta[index] % 16 - 1) * 32;
            var y = Math.floor(karta[index] / 16) * 32;

            //ctx.strokeRect(kolumn * 32, rad * 32, 32, 32);
            ctx.drawImage(kartbild, x, y, 32, 32, kolumn * 32, rad * 32, 32, 32);
            index++;
        }
    }
}
function ritaGubbe() {
    // plocka ut rätt ruta
    var x = Math.floor(gubbe.rutor[Math.floor(gubbe.i)] % 4) * 64;
    var y = Math.floor(gubbe.rutor[Math.floor(gubbe.i)] / 4) * 64;
    //spara koordinatsystem
    ctx.save();
    //flytta koordinatsystem
    ctx.translate(gubbe.x, gubbe.y);
    //Vrida koordinatsystem
    ctx.drawImage(gubbe.bild, x, y, 64, 64, -32, -32, 32, 32);
    //återställ koordinatsystemet
    ctx.restore();

    if (gubbe.kör) {
        gubbe.i += 0.1;
    }
    if (gubbe.i > gubbe.rutor.length - 1) {
        gubbe.i = 0;
    }
}

function ritaLager2() {
    var index = 0;

    for (var rad = 0; rad < 20; rad++) {

        for (var kolumn = 0; kolumn < 20; kolumn++) {
            //console.log(rad, kolumn);

            var x = Math.floor(lager2[index] % 16 - 1) * 32;
            var y = Math.floor(lager2[index] / 16) * 32;

            //ctx.strokeRect(kolumn * 32, rad * 32, 32, 32);
            ctx.drawImage(kartbild, x, y, 32, 32, kolumn * 32, rad * 32, 32, 32);
            index++;
        }
    }
}
window.addEventListener("keydown", function (e) {
    switch (e.code) {
        case "ArrowDown":
            gubbe.y += 3;
            gubbe.rutor = [0, 1, 2, 3];
            break;
        case "ArrowUp":
            gubbe.y -= 3;
            gubbe.rutor = [12, 13, 14, 15];

            break;
        case "ArrowLeft":
            gubbe.x -= 3;
            gubbe.rutor = [5, 6, 7, 8];

            break;
        case "ArrowRight":
            gubbe.x += 3;
            gubbe.rutor = [8, 9, 10, 11];

            break;
    }
    gubbe.kör = true;
})
window.addEventListener("keyup", function () {
    gubbe.kör = false;
})