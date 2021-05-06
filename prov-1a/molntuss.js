const canvas = document.querySelector('canvas');
const pilH = document.querySelector('#pilh');
const pilV = document.querySelector('#pilv');

canvas.width = 530;
canvas.height = 400;

var ctx = canvas.getContext('2d');

var sol = new Image();
sol.src = "./bilder/sun.png";
var summer = new Image();
summer.src = "./bilder/summer.png";


var solX = 200;
var solY = 200;


function loopen() {
    //suddar ut cnavas
    ctx.clearRect(0, 0, 800, 600);

    // rita gaffewg
    ctx.drawImage(sol, solX, solY, 50, 50);
    ctx.drawImage(summer, 0, 0);
    

    requestAnimationFrame(loopen);
}
loopen();
pilV.addEventListener("click", function(e) {
    solY -= 10;
})
pilH.addEventListener("click", function(e) {
    solY += 10;
})