// element vi jobbar med
const canvas = document.querySelector('canvas');
const ePoints = document.querySelector('p');

// ställ in bredd och höjd
canvas.width = 800;
canvas.height = 600;

// slå på ritmotorn
var ctx = canvas.getContext('2d');

// ladda in bilderna

var centaur = new Image();
centaur.src = "./bilder/Centaur-icon.png"
var orc = new Image();
orc.src = "./bilder/Orc-icon.png"
var wall = new Image();
wall.src = "./bilder/väggg.jpg"

// figureOutLineNumbers
var centaurX = 100, centaurY = 100;
var orcX = 700 * Math.random();
var orcY = 500 * Math.random();
var wallY = 200 * Math.random();
var wallX = 200 * Math.random();

var points = 0;



function loopen() {
    //suddar ut cnavas
    ctx.clearRect(0, 0, 800, 600);

    // rita gaffewg
    ctx.drawImage(centaur, centaurX, centaurY, 50, 50);
    ctx.drawImage(orc, orcX, orcY, 50, 50);
    ctx.drawImage(wall, wallX, wallY, 50, 50);
    

    var d = Math.sqrt((centaurY - orcY) **2 + (centaurX - orcX) **2);
    if (d < 50) {
        orcX = 700 * Math.random();
        orcY = 500 * Math.random();
        points++;
        console.log(points);
        ePoints.textContent = points;
    }
    

    requestAnimationFrame(loopen);
}
loopen();

// lyssan på tagenerna
window.addEventListener("keydown", function (e) {
    //console.log(e.keyCode);

    switch (e.keyCode) {
        case 83:
            if (centaurY < 550) {
                centaurY += 10;
                break;
            }
        case 65:
            if (centaurX > 0) {
                centaurX -= 10
                break;
            }
        case 68:
            if (centaurX < 750) {
                centaurX += 10;
                break; 0
            }
        case 87:
            if (centaurY > 0) {
                centaurY -= 10;
                break;
            }


    }
})

canvas.addEventListener("mousemove", function (e) {
    //console.log(e.offsetX, e.offsetY);
    orcX = e.offsetX;
    orcY = e.offsetY;
})