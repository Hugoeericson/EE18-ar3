// Element vi använder
const canvas = document.querySelector("canvas");

// Ställ in storlek på canvas
canvas.width = 800;
canvas.height = 600;

// Slå på rit-api
var ctx = canvas.getContext("2d");

var karta = [
    [0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], // rad 0
    [1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1], // rad 1
    [1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1], // rad 2
    [1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1], // rad 3
    [1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1], // ...
    [1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1],
    [1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1],
    [1, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
];

// Objekten
//spelaren
var spelare = {
    rad: 0,
    kolumn: 0,
    rotation: 0,
    bild: new Image()
}
spelare.bild.src = "./bilder/nyckelpiga.png";

// mynt
var mynt = {
    rad: 5,
    kolumn: 5,
    bild: new Image()
}
mynt.bild.src = "./bilder/coin.png";
var monster = {
    rad: 10,
    kolumn: 12,
    rotation: 0,
    poäng: 0,
    bild: new Image()
}
monster.bild.src = "./bilder/monster.png";

// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna
    for (var rad = 0; rad < 12; rad++) {

        // Loopa igenom kolumnerna
        for (var kolumn = 0; kolumn < 16; kolumn++) {

            // Om "1" rita ut en kloss (vägg)
            if (karta[rad][kolumn] == 1) {
                ctx.fillRect(kolumn * 50, rad * 50, 50, 50);
            }
        }
    }
}

// Rita ut figuren
function ritaSpelare() {
    ctx.save();
    ctx.translate(spelare.kolumn * 50 + 25, spelare.rad * 50 + 25);
    ctx.rotate(spelare.rotation / 180 * Math.PI);
    ctx.drawImage(spelare.bild, -25, -25, 50, 50);
    ctx.restore();
}
function ritaMynt() {
    ctx.drawImage(mynt.bild, mynt.kolumn * 50, mynt.rad * 50, 50, 50);
}
// Rita ut monstret
function ritaMonster() {
    ctx.save();
    ctx.translate(monster.kolumn * 50 + 25, monster.rad * 50 + 25);
    ctx.rotate(monster.rotation / 180 * Math.PI);
    ctx.drawImage(monster.bild, -25, -25, 50, 50);
    ctx.restore();
}

// Animationsloopen
function loopen() {
    // Sudda ut canvas
    ctx.clearRect(0, 0, 800, 600);

    // Rita figuren
    ritaSpelare();
    ritaKartan();
    ritaMynt();
    ritaMonster();

    requestAnimationFrame(loopen);
}

// Starta loopen
loopen()

// Lyssna på piltangenter
window.addEventListener("keypress", function (e) {
    switch (e.code) {
        case "Numpad2": // Pil nedåt
            figur.y += 50;
            figur.rotation = 180;
            break;
        case "Numpad8": // Pil uppåt
            figur.y -= 50;
            figur.rotation = 0;
            break;
        case "Numpad4": // Pil vänster
            figur.x -= 50;
            figur.rotation = 270;
            break;
        case "Numpad6": // Pil höger
            figur.x += 50;
            figur.rotation = 90;
            break;

        default:
            break;
    }
    console.log("Kolumn: " + (figur.x - 25) / 50 + ", rad: " + (figur.y - 25) / 50);
})