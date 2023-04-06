for(let i = 0; i < document.getElementsByClassName('addButtons').length; i++)
{
    let buttons = document.getElementsByClassName('addButtons');
    buttons[i].addEventListener('click',function () {
        let arr = buttons[i].value.split('/??/');
        if (document.getElementById(arr[0]).style.opacity === "0.4")
        {
            buttons[i].disabled = true;
            return;
        }
       document.getElementById(arr[0]).style.opacity = "0.4";
       buttons[i].disabled = true;

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

        let remove = document.createElement('button');
        remove.innerHTML = "<i class=\"fa-solid fa-xmark\"></i>";
        remove.value = arr[0]; // ID vom Artikel
        remove.className = "removeButtons py-2 px-5";
        remove.addEventListener('click', function () {
            document.getElementById(arr[0]).style.opacity = "1";
            buttons[i].disabled = false;
            remove.parentElement.remove();
            if (document.getElementById('cart-table').childElementCount === 1) {
                document.getElementById('cart-info').style.display = "initial";
                document.getElementById('cart-cond').value = "empty";
                document.getElementById('cart-table').style.display = "none";
            }
        });
        row.appendChild(remove);

        document.getElementById('cart-table').appendChild(row);
    });
}


