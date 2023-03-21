function navbar() {
    if (document.getElementById('nav').innerHTML === "<i class=\"fa-solid fa-xmark scale-150\"></i>") {
        document.getElementById('nav').innerHTML = "<i class=\"fa-solid fa-bars scale-125\"></i>";
        document.getElementById('navbar').style.height = "0";
        document.getElementById('navitems').style.visibility = "hidden";
        return;
    }
    document.getElementById('navbar').style.height = "15rem";
    document.getElementById('navbar').style.visibility = "visible";
    document.getElementById('nav').innerHTML = "<i class=\"fa-solid fa-xmark scale-150\"></i>";
    document.getElementById('navitems').style.visibility = "visible";
}
function init() {
    document.getElementById('navbar').style.height = "0";
    document.getElementById('navitems').style.visibility = "hidden";
    currentSlide(1);
}

let slideIndex = 1;
showSlides(slideIndex);


// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}
