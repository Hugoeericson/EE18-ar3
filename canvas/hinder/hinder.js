const canvas = document.querySelector("canvas");

// slå på ritmotorn
var ctx = canvas.getContext('2d');

//ange mått på canvas
canvas.width = 800;
canvas.height = 600;


var bird = {
    x: 300,
    y: 400,
    bild: new Image()
}
bird.bild.src = "./bilder/angry-bird-icon.png";

// ett hinder
var hinder = {
    x: 800 * Math.random(),
    y: 600 * Math.random()
}

// animations loope
function loopen() {

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // rita ut figuren
    ctx.drawImage(bird.bild, bird.x, bird.y);

    // rita ut hinder
    ctx.fillRect(hinder.x, hinder.y, 100, 100);

    requestAnimationFrame(loopen)
}
loopen();

window.addEventListener("keydown", function (e) {

    // vad hämder mnär iv 
    switch (e.code) {
        case "Numpad8":
            if (bird.y > 0) {
                if (bird.y > hinder.y + 100) {
                    bird.y += 5;
                }
            } else {
                console.log("du krockar med taket");
            }
            break;
        case "Numpad2":
            if (bird.y < hinder.y - 64) {
                bird.y += 5;
            }
            break;
        case "Numpad4":
            if (bird.x > 0) {
                if (bird.x > hinder.x + 100) {
                    bird.x += 5;
                }
            }
            break;
        case "Numpad6":
            if (bird.x < 735) {
                if (bird.y + 64 < hinder.y && bird.y > hinder.y + 100) {
                    if (bird.x < hinder.x - 64) {
                        bird.x += 5;
                    }
                }
            }
            break;
    }
    console.log(bird.x, bird.y), hinder.x, hinder.y;
})