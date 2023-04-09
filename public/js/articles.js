for (let i = 0; i < document.getElementsByClassName('addButtons').length; i++) {
    let buttons = document.getElementsByClassName('addButtons');
    let opacity = "0.4";

    buttons[i].addEventListener('click', function () {

        let arr = buttons[i].value.split('/??/');

        const ID = arr[0], ab_name = arr[1], ab_price = arr[2], ab_description = arr[3];

        const table = document.getElementById('cart-table');
        for (let j = 1; j < table.childElementCount; j++) {
            if (table.children[j].children[2].innerHTML === ID) {
                buttons[i].disabled = true;
                return;
            }
        }

        document.getElementById(ID).style.opacity = opacity;
        document.getElementById('add_button_' + ID).disabled = true;

        document.getElementById('info_button_' + ID).style.opacity = opacity;
        document.getElementById('info_button_' + ID).disabled = true;


        document.getElementById('cart-counter').innerHTML = (parseInt(document.getElementById('cart-counter').innerHTML) + 1).toString();

        if (document.getElementById('cart-cond').value === "empty") {
            document.getElementById('cart-info').style.display = "none";
            document.getElementById('cart-cond').value = "items";
            document.getElementById('cart-table').style.display = "initial";
        }


        let row = document.createElement('tr');

        let articleName = document.createElement('td');
        articleName.className = "px-5 py-2 font-bold";
        articleName.innerHTML = ab_name;
        row.appendChild(articleName);

        let articlePrice = document.createElement('td');
        articlePrice.className = "px-5 py-2";
        articlePrice.innerHTML = ab_price + "€";
        row.appendChild(articlePrice);

        let id = document.createElement('td');
        id.innerHTML = ID;
        id.hidden = true;

        let removeButton = document.createElement('td');
        let remove = document.createElement('button');
        remove.innerHTML = "<i class=\"fa-solid fa-xmark\"></i>";
        remove.className = "removeButtons py-2 px-5";

        remove.addEventListener('click', function () {
            document.getElementById(ID).style.opacity = "1";

            document.getElementById('info_button_' + ID).style.opacity = "1";
            document.getElementById('info_button_' + ID).disabled = false;
            document.getElementById('add_button_' + ID).disabled = false;

            document.getElementById('cart-counter').innerHTML = (parseInt(document.getElementById('cart-counter').innerHTML) - 1).toString();

            remove.parentElement.parentElement.remove();
            if (document.getElementById('cart-table').childElementCount === 1) {
                document.getElementById('cart-info').style.display = "initial";
                document.getElementById('cart-cond').value = "empty";
                document.getElementById('cart-table').style.display = "none";
                document.getElementById('sum').remove();
            }
            setSum();
        });

        removeButton.appendChild(remove);
        row.appendChild(id);
        row.appendChild(removeButton);

        if (!document.getElementById('sum')) {
            let sum = document.createElement('p');
            sum.innerHTML = "Gesamtpreis: ";
            sum.className = "font-bold text-2xl m-3";
            sum.id = "sum";
            document.getElementById('cart').appendChild(sum);
        }
        document.getElementById('cart-table').appendChild(row);

        setSum();
    });
}

function setSum() {
    let sum = 0;
    for (let i = 1; i < document.getElementById('cart-table').childElementCount; i++) {
        sum += parseInt(document.getElementById('cart-table').children[i].children[1].innerHTML.replace('€', ''));
    }
    document.getElementById('sum').innerHTML = "Gesamtpreis: " + sum.toFixed(2) + "€";
}

for (let i = 0; i < document.getElementsByClassName('info_buttons').length; i++) {
    document.getElementsByClassName('info_buttons')[i].addEventListener('click', function () {
        let arr = document.getElementsByClassName('info_buttons')[i].value.split('/??/');
        const ID = arr[0], ab_name = arr[1], ab_price = arr[2], ab_description = arr[3];

        document.getElementById('info_' + ID).style.display = "initial";

        document.getElementById('info_close_' + ID).addEventListener('click', function () {
            document.getElementById('info_' + ID).style.display = "none";
        });
    });

}




