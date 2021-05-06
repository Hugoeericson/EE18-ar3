// Element vi använder
const canvas = document.querySelector("canvas");

// Ställ in storlek på canvas
canvas.width = 500;
canvas.height = 500;

// Slå på rit-api
var ctx = canvas.getContext("2d");

// Skapa kartan
var karta = [
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 1, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 1, 0, 0, 0, 0],
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
];
var karta2 = [
    [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
];

// Figur objektet


// Rita kartan
function ritaKartan() {
    // Loopa igenom raderna
    for (var j = 0; j < 11; j++) {
        
        // Loopa igenom kolumnerna
        for (var i = 0; i < 10; i++) {

            ctx.strokeRect(x, y, 50, 50);
    

            // Om "1" rita ut en kloss
            var x = i * 50;
            var y = j * 50;
            if (karta[j][i] == 1) {
                ctx.fillRect(x + 10, y + 10, 30, 30);
            }
        }
    }
}
// Rita kartan
function ritaKartan2() {
    // Loopa igenom raderna
    for (var h = 0; h < 13; h++) {
        
        // Loopa igenom kolumnerna
        for (var s = 0; s < 10; s++) {

            ctx.strokeRect(f, t, 50, 50);
    

            // Om "1" rita ut en kloss
            var f = s * 500;
            var t = h * 50;
            if (karta2[h][s] == 1) {
                ctx.fillRect(f + 10, t + 10, 30, 30);
            }
        }
    }
}

// Rita ut figuren
function ritaFigur() {
    ctx.save();
    ctx.translate(figur.x, figur.y);
    ctx.rotate(figur.rotation / 180 * Math.PI);
    ctx.drawImage(figur.bild, -25, -25, 50, 50);
    ctx.restore();
}

// Animationsloopen
function loopen() {
    // Sudda ut canvas
    ctx.clearRect(0, 0, 500, 500);

    // Rita kartan
    ritaKartan();
    //ritaKartan2();

    // Rita figuren

    requestAnimationFrame(loopen);
}

// Starta loopen
loopen()