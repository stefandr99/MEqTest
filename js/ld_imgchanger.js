var time = 3000;
var path = "css/resource/images/"
var image = document.getElementById('imagething');
var currentPos = 0;
var images = ["ldimg1.jpg", "ldimg2.jpg"]

function changeImg() {
    if (++currentPos >= images.length)
        currentPos = 0;

    image.src = path + images[currentPos];
}

setInterval(changeImg, time);