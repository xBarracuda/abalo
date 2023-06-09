@extends('layouts.app')

@section('title','Verkaufen - Abalo')
@section('head')

@endsection

@section('header')
    @parent
@endsection

@section('main')
    <script>
        let container = document.createElement('div');
        container.className = "w-3/4 h-full max-xl:w-full max-xl:text-sm mx-auto p-5 bg-gray-300 rounded-lg";
        document.getElementById('main').appendChild(container);

        let header = document.createElement('h2');
        header.innerHTML = "Anzeigendetails";
        header.className = "font-bold text-xl";
        container.appendChild(header);

        let gridContainer = document.createElement('form');
        gridContainer.className = "grid grid-cols-3 my-5 grid-cols-[15%,60%,25%]  gap-y-16 break-words";
        gridContainer.method = "post";
        gridContainer.action = "/articles";
        gridContainer.id = "newarticle";
        gridContainer.enctype = "multipart/form-data";
        container.appendChild(gridContainer);

        let csrf = document.createElement('input');
        csrf.type = "hidden";
        csrf.name = "_token";
        csrf.value = "{{csrf_token()}}";
        gridContainer.appendChild(csrf);

        let title = document.createElement('label');
        title.htmlFor = "name"
        title.innerHTML = "Titel*";
        title.className = "my-auto"
        gridContainer.appendChild(title);

        let titleInput = document.createElement('input');
        titleInput.type = "text";
        titleInput.name = "name";
        titleInput.id = "name";
        titleInput.className = "rounded-lg w-full max-lg:placeholder:opacity-0"
        titleInput.placeholder = "Name des Artikels"
        gridContainer.appendChild(titleInput);

        let titleError = document.createElement('div');
        titleError.display = "none";
        titleError.className = "text-xs italic my-auto ml-5";
        gridContainer.appendChild(titleError);

        let category = document.createElement('label');
        category.htmlFor = "category";
        category.innerHTML = "Kategorie*";
        category.className = "my-auto";
        gridContainer.appendChild(category);

        let categoryInput = document.createElement('select');
        categoryInput.className = "indent-2 font-bold w-1/2 py-2"
        categoryInput.name = "category";
        categoryInput.id = "category";
        gridContainer.appendChild(categoryInput);

        let categories = [
                @foreach($category as $c)
                    @if($c->ab_parent == null)
                        @continue
                    @endif
                    ["{!! $c->ab_name !!}", " {{$c->id}}"],
                @endforeach
        ];

        for (let element of categories) {
            var option = document.createElement('option');
            option.innerHTML = element[0];
            option.value = element[1];
            categoryInput.appendChild(option);
        }


        let placeholder4 = document.createElement('div');
        gridContainer.appendChild(placeholder4);

        let price = document.createElement('label');
        price.innerHTML = "Preis*";
        price.htmlFor = "price";
        price.className = "my-auto";
        gridContainer.appendChild(price);

        let priceFlex = document.createElement('div');
        priceFlex.className = "flex";
        gridContainer.appendChild(priceFlex);

        let priceInput = document.createElement('input');
        priceInput.type = "number";
        priceInput.name = "price";
        priceInput.id = "price";
        priceInput.placeholder = "EUR";
        priceInput.className = "rounded-lg w-1/4 max-lg:placeholder:opacity-0"
        priceFlex.appendChild(priceInput);

        let priceInfo = document.createElement('div');
        priceInfo.innerHTML = ",00€";
        priceInfo.className = "my-auto mx-2"
        priceFlex.appendChild(priceInfo);

        let priceStat = document.createElement('select');
        priceStat.className = "w-full rounded-lg indent-4";
        priceStat.disabled = true;
        priceFlex.appendChild(priceStat);
        let priceOption1 = document.createElement('option');
        priceOption1.innerHTML = "Festpreis";
        priceStat.appendChild(priceOption1);
        let priceOption2 = document.createElement('option');
        priceOption2.innerHTML = "Verhandelbar";
        priceStat.appendChild(priceOption2);

        let priceError = document.createElement('div');
        priceError.display = "none";
        priceError.className = "text-xs italic my-auto ml-5";
        gridContainer.appendChild(priceError);

        let description = document.createElement('label');
        description.innerHTML = "Beschreibung*";
        description.htmlFor = "description";
        description.className = "";
        gridContainer.appendChild(description);

        let descriptionInput = document.createElement('textarea');
        descriptionInput.id = "description";
        descriptionInput.name = "description";
        descriptionInput.className = "rounded-lg h-40"
        gridContainer.appendChild(descriptionInput);

        let descriptionInfo = document.createElement('div');
        descriptionInfo.innerHTML = "Bitte nutzen Sie hier max. 1000 Zeichen"
        descriptionInfo.className = "text-xs italic my-auto ml-5";
        gridContainer.appendChild(descriptionInfo);

        let image = document.createElement('label');
        image.htmlFor = "img";
        image.innerHTML = "Bild (empfohlen)";
        image.className = "my-auto";
        gridContainer.appendChild(image);

        let imageInput = document.createElement('input');
        imageInput.type = "file";
        imageInput.id = "img";
        imageInput.name = "img";
        imageInput.className = "my-auto";
        imageInput.accept = "image/png, image/jpg";
        gridContainer.appendChild(imageInput);

        let imageInfo = document.createElement('div');
        imageInfo.innerHTML = "Bitte laden Sie nur .png oder .jpg Bilder hoch mit einer max. Größe von 12MB"
        imageInfo.className = "text-xs italic my-auto ml-5";
        gridContainer.appendChild(imageInfo);

        let placeholder2 = document.createElement('div');
        gridContainer.appendChild(placeholder2);

        let submit = document.createElement('button');
        submit.type = "button";
        submit.className = "rounded-lg bg-green-400/90 border border-black hover:opacity-50 py-2"
        submit.innerHTML = "Speichern";
        gridContainer.appendChild(submit);

        let placeholder3 = document.createElement('div');
        gridContainer.appendChild(placeholder3);

        submit.addEventListener('click', function () {
            const titleValue = titleInput.value;
            let submit = true;
            let pattern = /(?:[!-\/:-@\[-`\{-~\xA1-\xA9\xAB\xAC\xAE-\xB1\xB4\xB6-\xB8\xBB\xBF\xD7\xF7\u02C2-\u02C5\u02D2-\u02DF\u02E5-\u02EB\u02ED\u02EF-\u02FF\u0375\u037E\u0384\u0385\u0387\u03F6\u0482\u055A-\u055F\u0589\u058A\u058D-\u058F\u05BE\u05C0\u05C3\u05C6\u05F3\u05F4\u0606-\u060F\u061B\u061E\u061F\u066A-\u066D\u06D4\u06DE\u06E9\u06FD\u06FE\u0700-\u070D\u07F6-\u07F9\u07FE\u07FF\u0830-\u083E\u085E\u0964\u0965\u0970\u09F2\u09F3\u09FA\u09FB\u09FD\u0A76\u0AF0\u0AF1\u0B70\u0BF3-\u0BFA\u0C7F\u0C84\u0D4F\u0D79\u0DF4\u0E3F\u0E4F\u0E5A\u0E5B\u0F01-\u0F17\u0F1A-\u0F1F\u0F34\u0F36\u0F38\u0F3A-\u0F3D\u0F85\u0FBE-\u0FC5\u0FC7-\u0FCC\u0FCE-\u0FDA\u104A-\u104F\u109E\u109F\u10FB\u1360-\u1368\u1390-\u1399\u1400\u166D\u166E\u169B\u169C\u16EB-\u16ED\u1735\u1736\u17D4-\u17D6\u17D8-\u17DB\u1800-\u180A\u1940\u1944\u1945\u19DE-\u19FF\u1A1E\u1A1F\u1AA0-\u1AA6\u1AA8-\u1AAD\u1B5A-\u1B6A\u1B74-\u1B7C\u1BFC-\u1BFF\u1C3B-\u1C3F\u1C7E\u1C7F\u1CC0-\u1CC7\u1CD3\u1FBD\u1FBF-\u1FC1\u1FCD-\u1FCF\u1FDD-\u1FDF\u1FED-\u1FEF\u1FFD\u1FFE\u2010-\u2027\u2030-\u205E\u207A-\u207E\u208A-\u208E\u20A0-\u20BF\u2100\u2101\u2103-\u2106\u2108\u2109\u2114\u2116-\u2118\u211E-\u2123\u2125\u2127\u2129\u212E\u213A\u213B\u2140-\u2144\u214A-\u214D\u214F\u218A\u218B\u2190-\u2426\u2440-\u244A\u249C-\u24E9\u2500-\u2775\u2794-\u2B73\u2B76-\u2B95\u2B98-\u2BC8\u2BCA-\u2BFE\u2CE5-\u2CEA\u2CF9-\u2CFC\u2CFE\u2CFF\u2D70\u2E00-\u2E2E\u2E30-\u2E4E\u2E80-\u2E99\u2E9B-\u2EF3\u2F00-\u2FD5\u2FF0-\u2FFB\u3001-\u3004\u3008-\u3020\u3030\u3036\u3037\u303D-\u303F\u309B\u309C\u30A0\u30FB\u3190\u3191\u3196-\u319F\u31C0-\u31E3\u3200-\u321E\u322A-\u3247\u3250\u3260-\u327F\u328A-\u32B0\u32C0-\u32FE\u3300-\u33FF\u4DC0-\u4DFF\uA490-\uA4C6\uA4FE\uA4FF\uA60D-\uA60F\uA673\uA67E\uA6F2-\uA6F7\uA700-\uA716\uA720\uA721\uA789\uA78A\uA828-\uA82B\uA836-\uA839\uA874-\uA877\uA8CE\uA8CF\uA8F8-\uA8FA\uA8FC\uA92E\uA92F\uA95F\uA9C1-\uA9CD\uA9DE\uA9DF\uAA5C-\uAA5F\uAA77-\uAA79\uAADE\uAADF\uAAF0\uAAF1\uAB5B\uABEB\uFB29\uFBB2-\uFBC1\uFD3E\uFD3F\uFDFC\uFDFD\uFE10-\uFE19\uFE30-\uFE52\uFE54-\uFE66\uFE68-\uFE6B\uFF01-\uFF0F\uFF1A-\uFF20\uFF3B-\uFF40\uFF5B-\uFF65\uFFE0-\uFFE6\uFFE8-\uFFEE\uFFFC\uFFFD]|\uD800[\uDD00-\uDD02\uDD37-\uDD3F\uDD79-\uDD89\uDD8C-\uDD8E\uDD90-\uDD9B\uDDA0\uDDD0-\uDDFC\uDF9F\uDFD0]|\uD801\uDD6F|\uD802[\uDC57\uDC77\uDC78\uDD1F\uDD3F\uDE50-\uDE58\uDE7F\uDEC8\uDEF0-\uDEF6\uDF39-\uDF3F\uDF99-\uDF9C]|\uD803[\uDF55-\uDF59]|\uD804[\uDC47-\uDC4D\uDCBB\uDCBC\uDCBE-\uDCC1\uDD40-\uDD43\uDD74\uDD75\uDDC5-\uDDC8\uDDCD\uDDDB\uDDDD-\uDDDF\uDE38-\uDE3D\uDEA9]|\uD805[\uDC4B-\uDC4F\uDC5B\uDC5D\uDCC6\uDDC1-\uDDD7\uDE41-\uDE43\uDE60-\uDE6C\uDF3C-\uDF3F]|\uD806[\uDC3B\uDE3F-\uDE46\uDE9A-\uDE9C\uDE9E-\uDEA2]|\uD807[\uDC41-\uDC45\uDC70\uDC71\uDEF7\uDEF8]|\uD809[\uDC70-\uDC74]|\uD81A[\uDE6E\uDE6F\uDEF5\uDF37-\uDF3F\uDF44\uDF45]|\uD81B[\uDE97-\uDE9A]|\uD82F[\uDC9C\uDC9F]|\uD834[\uDC00-\uDCF5\uDD00-\uDD26\uDD29-\uDD64\uDD6A-\uDD6C\uDD83\uDD84\uDD8C-\uDDA9\uDDAE-\uDDE8\uDE00-\uDE41\uDE45\uDF00-\uDF56]|\uD835[\uDEC1\uDEDB\uDEFB\uDF15\uDF35\uDF4F\uDF6F\uDF89\uDFA9\uDFC3]|\uD836[\uDC00-\uDDFF\uDE37-\uDE3A\uDE6D-\uDE74\uDE76-\uDE83\uDE85-\uDE8B]|\uD83A[\uDD5E\uDD5F]|\uD83B[\uDCAC\uDCB0\uDEF0\uDEF1]|\uD83C[\uDC00-\uDC2B\uDC30-\uDC93\uDCA0-\uDCAE\uDCB1-\uDCBF\uDCC1-\uDCCF\uDCD1-\uDCF5\uDD10-\uDD6B\uDD70-\uDDAC\uDDE6-\uDE02\uDE10-\uDE3B\uDE40-\uDE48\uDE50\uDE51\uDE60-\uDE65\uDF00-\uDFFF]|\uD83D[\uDC00-\uDED4\uDEE0-\uDEEC\uDEF0-\uDEF9\uDF00-\uDF73\uDF80-\uDFD8]|\uD83E[\uDC00-\uDC0B\uDC10-\uDC47\uDC50-\uDC59\uDC60-\uDC87\uDC90-\uDCAD\uDD00-\uDD0B\uDD10-\uDD3E\uDD40-\uDD70\uDD73-\uDD76\uDD7A\uDD7C-\uDDA2\uDDB0-\uDDB9\uDDC0-\uDDC2\uDDD0-\uDDFF\uDE60-\uDE6D])/;
            if (pattern.test(titleValue)) {
                titleError.innerHTML = "Bitte nutze keine Sonderzeichen.";
                titleError.display = "initial";
                titleError.style.color = "red";
                titleInput.style.borderColor = "red";
                submit = false;
            }
            if (!titleValue) {
                titleError.innerHTML = "Bitte gib einen Titel ein.";
                titleError.display = "initial";
                titleError.style.color = "red";
                titleInput.style.borderColor = "red";
                submit = false;
            }
            if (titleValue.length > 60) {
                titleError.innerHTML = "Bitte max. 60 Zeichen nutzen.";
                titleError.display = "initial";
                titleError.style.color = "red";
                titleInput.style.borderColor = "red";
                submit = false;
            }

            const priceValue = priceInput.value;
            if (isNaN(parseInt(priceValue)) || pattern.test(priceValue)) {
                priceError.innerHTML = "Bitte nutze keine Sonderzeichen.";
                priceError.display = "initial";
                priceError.style.color = "red";
                priceInput.style.borderColor = "red";
                submit = false;
            } else if (!priceValue) {
                priceError.innerHTML = "Bitte gib einen Preis ein.";
                priceError.display = "initial";
                priceError.style.color = "red";
                priceInput.style.borderColor = "red";
                submit = false;
            } else if (priceValue <= 0) {
                priceError.innerHTML = "Bitte gib einen Preis ein, der größer als 0 ist.";
                priceError.display = "initial";
                priceError.style.color = "red";
                priceInput.style.borderColor = "red";
                submit = false;
            }

            const descriptionValue = descriptionInput.value;
            if (descriptionValue.length > 1000) {
                submit = false;
            }
            if (!descriptionValue) {
                descriptionInput.style.borderColor = "red";
                submit = false;
            }

            if (submit) {
                document.getElementById('newarticle').submit();
            }


        });

    </script>

@endsection

@section('footer')
    @parent
@endsection
