for(let i = 0; i < document.getElementsByClassName('addButtons').length; i++)
{
    let buttons = document.getElementsByClassName('addButtons');
    let addedToCart = false;
    buttons[i].addEventListener('click',function () {

        let arr = buttons[i].value.split('/??/');
        if (addedToCart)
        {
            buttons[i].disabled = true;
            return;
        }
       document.getElementById(arr[0]).style.opacity = "0.4";
       buttons[i].disabled = true;
       addedToCart = true;
       document.getElementById('cart-counter').innerHTML = (parseInt(document.getElementById('cart-counter').innerHTML) + 1).toString();

       if (document.getElementById('cart-cond').value === "empty")
       {
           document.getElementById('cart-info').style.display = "none";
           document.getElementById('cart-cond').value = "items";
           document.getElementById('cart-table').style.display = "initial";
       }


       let row = document.createElement('tr');

       let articleName = document.createElement('td');
        articleName.className = "px-5 py-2 font-bold";
        articleName.innerHTML = arr[1];
        row.appendChild(articleName);

        let articlePrice = document.createElement('td');
        articlePrice.className = "px-5 py-2";
        articlePrice.innerHTML = arr[2] + "€";
        row.appendChild(articlePrice);

        let removeButton = document.createElement('td');
        let remove = document.createElement('button');
        remove.innerHTML = "<i class=\"fa-solid fa-xmark\"></i>";
        remove.value = arr[0]; // ID vom Artikel
        remove.className = "removeButtons py-2 px-5";
        remove.addEventListener('click', function () {
            document.getElementById(arr[0]).style.opacity = "1";
            buttons[i].disabled = false;
            addedToCart = false;
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
        row.appendChild(removeButton);

        if (!document.getElementById('sum'))
        {
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
    for (let i = 1; i < document.getElementById('cart-table').childElementCount; i++)
    {
        sum += parseInt(document.getElementById('cart-table').children[i].children[1].innerHTML.replace('€',''));
    }
    document.getElementById('sum').innerHTML = "Gesamtpreis: " +  sum.toFixed(2) + "€";
}


