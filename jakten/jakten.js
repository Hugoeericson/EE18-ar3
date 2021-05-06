// element vi jobbar med
const canvas = document.querySelector('canvas');

// ställ in bredd och höjd
canvas.width = 800;
canvas.height = 600;

// slå på ritmotorn
var ctx = canvas.getContext('2d');

// ladda in bilderna
var background = new Image();
background.src = "./b"