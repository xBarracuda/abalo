const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};


document.getElementById('submit-newsletter').onclick = function () {
    let email = document.getElementById('newsletter-email').value;

    if (!validateEmail(email))
    {
        if (document.getElementById('errMsg')) {
            return;
        }
        let errMsg = document.createElement('p');
        errMsg.innerHTML = "Bitte geben Sie eine gueltige E-Mail-Adresse ein!";
        errMsg.className = "my-2 text-sm text-red-500";
        errMsg.id = "errMsg";

        document.getElementById('newsletter').appendChild(errMsg);

        document.getElementById('newsletter-email').className = "rounded-lg w-3/4 border-2 border-rose-500";

        return;
    }
    document.getElementById('newsletter').submit();
}
