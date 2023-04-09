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

function searchbar() {
    if (document.getElementById('navigationItems').hidden === true) {
        document.getElementById('navigationItems').hidden = false;
        document.getElementById('searchbar').style.visibility = "hidden";
        document.getElementById('searchbarClose').innerHTML = "";
        return;
    }

    document.getElementById('searchbarClose').innerHTML = "<i class=\"fa-solid fa-xmark scale-150\"></i>";
    document.getElementById('navigationItems').hidden = true;
    document.getElementById('searchbar').style.visibility = "visible";
}

document.getElementById('cart-icon').onclick = function () {
    if (document.getElementById('cart').style.visibility === "visible") {
        document.getElementById('cart').style.visibility = "hidden";

        return;
    }
    document.getElementById('cart').style.visibility = "visible";

}

document.getElementById('cart-close').onclick = function () {
    if (document.getElementById('cart').style.visibility === "visible") {
        document.getElementById('cart').style.visibility = "hidden";

        return;
    }
    document.getElementById('cart').style.visibility = "visible";
}

document.getElementById('cart-mobile').onclick = function () {
    document.getElementById('cart').style.visibility = "visible";
    document.getElementById('nav').innerHTML = "<i class=\"fa-solid fa-bars scale-125\"></i>";
    document.getElementById('navbar').style.height = "0";
    document.getElementById('navitems').style.visibility = "hidden";
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
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}
