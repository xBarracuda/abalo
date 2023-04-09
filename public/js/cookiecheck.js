if (document.cookie.indexOf('abalo=') !== -1) {
    document.getElementById('cookie-consent').style.visibility = "hidden";
} else {
    document.getElementById('cookie-consent').style.visibility = "visible";
}

document.getElementById('decline').onclick = function () {
    document.getElementById('cookie-consent').style.visibility = "hidden";
}
document.getElementById('accept').onclick = function () {
    if (document.cookie.indexOf('abalo=') === -1) {
        document.cookie = "abalo=abalo_test_cookie";
        document.getElementById('cookie-consent').style.visibility = "hidden";
    }
}
