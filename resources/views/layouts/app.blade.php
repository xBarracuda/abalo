<!DOCTYPE html>
<html lang="de">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css"/>
    <link rel="icon" href="{{asset('img/abalo-logos.png')}}">
    @yield('head')
    @vite('resources/css/app.css')
</head>
<body class="font-mono" onload="init()">
@section('header')
    <header id="header">
        <script>
            let OuterContainer = document.createElement('div');
            OuterContainer.className = "w-full mb-5 h-34 bg-gray-300/50 grid grid-cols-2 grid-cols-[20%,80%]";
            document.getElementById('header').appendChild(OuterContainer);

            let imageContainer = document.createElement('div');
            let logo = document.createElement('a');
            logo.href = "/";
            let logoImg = document.createElement('img');
            logoImg.src = "{{asset('img/abalo-logos.png')}}";
            logoImg.className = "mx-auto";
            logoImg.width = 80;
            logo.appendChild(logoImg);
            imageContainer.appendChild(logo);
            OuterContainer.appendChild(imageContainer);

            let navContainer = document.createElement('div');
            navContainer.className = "mr-16 max-xl:hidden";
            navContainer.id = "navigationItems";
            OuterContainer.appendChild(navContainer);

            let navInnerContainer = document.createElement('div');
            navInnerContainer.className = "flex justify-evenly align-items-center";
            navContainer.appendChild(navInnerContainer);

            let navItemContainer0 = document.createElement('div');
            navItemContainer0.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer0);

            let navItem0 = document.createElement('a');
            navItem0.href = "/";
            navItem0.className = "hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'home') underline decoration-1 font-bold @endif hover:font-bold";
            navItem0.innerText = "Home";
            navItemContainer0.appendChild(navItem0);

            let navItemContainer1 = document.createElement('div');
            navItemContainer1.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer1);

            let navItem1 = document.createElement('a');
            navItem1.href = "/category";
            navItem1.className = "hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'category') underline decoration-1 font-bold @endif hover:font-bold";
            navItem1.innerText = "Kategorien";
            navItemContainer1.appendChild(navItem1);

            let navItemContainer2 = document.createElement('div');
            navItemContainer2.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer2);

            let navItem2 = document.createElement('a');
            navItem2.href = "/articles";
            navItem2.className = "hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'articles') underline decoration-1 font-bold @endif hover:font-bold";
            navItem2.innerText = "Artikel";
            navItemContainer2.appendChild(navItem2);

            let navItemContainer3 = document.createElement('div');
            navItemContainer3.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer3);

            let navItem3 = document.createElement('a');
            navItem3.href = "/newarticle";
            navItem3.className = "hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'sell') underline decoration-1 font-bold @endif hover:font-bold";
            navItem3.innerText = "Verkaufen";
            navItemContainer3.appendChild(navItem3);

            let navItemContainer4 = document.createElement('div');
            navItemContainer4.className = "mt-8 relative";
            navItemContainer4.id = "about";
            navInnerContainer.appendChild(navItemContainer4);

            let navItem4 = document.createElement('a');
            navItem4.href = "/about";
            navItem4.className = "hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'about') underline decoration-1 font-bold @endif hover:font-bold";
            navItem4.innerText = "Unternehmen";
            navItemContainer4.appendChild(navItem4);
            let aboutBar = document.createElement('div');
            aboutBar.id = "aboutBar";
            aboutBar.className = "w-full bg-gray-300/50 absolute";
            navItemContainer4.appendChild(aboutBar);
            let aboutList = document.createElement('ul');
            aboutList.className = "list-disc";
            aboutBar.appendChild(aboutList);
            let aboutHref0 = document.createElement('a');
            aboutHref0.href = "/about#philosophy";
            aboutHref0.className = "hover:underline";
            aboutList.appendChild(aboutHref0);
            let aboutHref1 = document.createElement('a');
            aboutHref1.href = "/about#career";
            aboutHref1.className = "hover:underline";
            aboutList.appendChild(aboutHref1);
            let aboutItem0 = document.createElement('li');
            aboutItem0.innerText = "Philosophie";
            aboutHref0.appendChild(aboutItem0);
            let aboutItem1 = document.createElement('li');
            aboutItem1.innerText = "Karriere";
            aboutHref1.appendChild(aboutItem1);

            let navItemContainer5 = document.createElement('div');
            navItemContainer5.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer5);

            let navItem5 = document.createElement('a');
            navItem5.href = "/contact";
            navItem5.className = "hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'contact') underline decoration-1 font-bold @endif hover:font-bold";
            navItem5.innerText = "Kontakt";
            navItemContainer5.appendChild(navItem5);

            let navItemContainer6 = document.createElement('div');
            navItemContainer6.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer6);

            let navItem6 = document.createElement('button');
            navItem6.onclick = function () {
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
            navItemContainer6.appendChild(navItem6);
            let searchIcon = document.createElement('i');
            searchIcon.className = "fa-solid fa-magnifying-glass";
            navItem6.appendChild(searchIcon);


            let navItemContainer7 = document.createElement('div');
            navItemContainer7.className = "mt-8";
            navInnerContainer.appendChild(navItemContainer7);

            let navItem7 = document.createElement('button');
            navItem7.id = "cart-icon";
            navItemContainer7.appendChild(navItem7);
            let cartIcon = document.createElement('i');
            cartIcon.className = "fa-solid fa-cart-shopping";
            navItem7.appendChild(cartIcon);
            let counter = document.createElement('span');
            counter.id = "cart-counter";
            counter.className = "border border-black rounded-full mx-1 p-0.5";
            counter.innerText = "0";
            navItem7.appendChild(counter);

            let navItemContainer8 = document.createElement('div');
            navItemContainer8.className = "mt-8";
            navItemContainer8.innerHTML = '@if(!session()->has('abalo_user')) <a href="/login" class="hover:underline hover:font-bold"><i class="fa-solid fa-user"></i></a> @else <a href="/profile"  class="font-bold hover:underline hover:font-bold">Willkommen {{session()->get('abalo_user')}}</a> @endif';
            navInnerContainer.appendChild(navItemContainer8);

            let navItemContainer9 = document.createElement('div');
            navItemContainer9.className = "mt-8";
            navItemContainer9.innerHTML = '@if(session()->has('abalo_user')) <div> <a href="/logout" class="hover:underline hover:font-bold">Ausloggen</a> </div> @endif';
            navInnerContainer.appendChild(navItemContainer9);

            let searchbarContainer = document.createElement('div');
            searchbarContainer.className = "absolute w-1/2 left-1/2 my-6 max-xl:hidden grid grid-cols-2";
            searchbarContainer.id = "searchbar";
            OuterContainer.appendChild(searchbarContainer);

            let searchForm = document.createElement('form');
            searchForm.method = "get";
            searchForm.action = "/articles";
            let searchInput = document.createElement('input');
            searchInput.type = "text";
            searchInput.name = "search";
            searchInput.className = "rounded-xl w-full";
            searchInput.placeholder = "Ihr Suchbegriff";
            searchInput.autocomplete = "off";
            searchForm.appendChild(searchInput);
            searchbarContainer.appendChild(searchForm);

            let closeSearch = document.createElement('div');
            closeSearch.className = "m-auto";
            closeSearch.innerHTML = '<button id="searchbarClose" onclick="searchbar()"></button>';
            searchbarContainer.appendChild(closeSearch);

            let navbar0 = document.createElement('div');
            navbar0.className = "mr-16 xl:hidden flex";
            navbar0.innerHTML = '<button id="nav" class="ml-auto" onclick="navbar()"><i class="fa-solid fa-bars scale-125"></i></button>';
            OuterContainer.appendChild(navbar0);

        </script>

    </header>
    <div id="navbar" class="w-full bg-gray-400 transition-all xl:hidden">
        <div id="navitems"
             class="h-full text-gray-800 text-center grid grid-cols-1 grid-rows-7 gap-2 place-items-center">
            <div>
                <a href="/" class="hover:underline hover:font-bold">Home</a>
            </div>
            <div>
                <a href="/category" class="hover:underline hover:font-bold">Kategorien</a>
            </div>
            <div>
                <button id="cart-mobile" class="hover:underline hover:font-bold">Warenkorb</button>
            </div>
            <div>
                <a href="/newarticle" class="hover:underline hover:font-bold">Verkaufen</a>
            </div>
            <div>
                <a href="/about" class="hover:underline hover:font-bold">Unternehmen</a>
            </div>
            <div>
                <a href="/contact" class="hover:underline hover:font-bold">Kontakt</a>
            </div>
            <div>
                @if(session()->has('abalo_user'))
                    <a href="/logout" class="hover:underline hover:font-bold">Ausloggen</a>
                @else
                    <a href="/login" class="hover:underline hover:font-bold">Einloggen</a>
                @endif
            </div>


        </div>
    </div>
@show
@section('cart')
    <div class="w-1/3 max-lg:w-full bg-gray-300 right-0 absolute h-max z-10 text-center rounded-lg p-2" id="cart">
        <div class="text-2xl m-auto font-bold relative">Warenkorb <span class="right-0 text-sm absolute font-normal"><button
                    id="cart-close"><i class="fa-solid fa-xmark scale-150"></i></button></span></div>
        <div id="cart-info">
            <input type="hidden" value="empty" id="cart-cond">
            Ihr Warenkorb ist zurzeit leer.
            <p>Sie können sich <a class="underline" href="/articles">hier</a> Artikel ansehen, die Ihnen gefallen
                könnten!</p>
        </div>
        <table id="cart-table">
            <tr class="">
                <td class="p-5 font-bold max-lg:p-2">Artikelname</td>
                <td class="p-5 font-bold max-lg:p-2">Preis</td>
                <td class="p-5 font-bold max-lg:p-2">Artikel entfernen?</td>
                <td hidden>ID</td>
            </tr>
        </table>
    </div>
@show
<main id="main">
    @yield('main')
</main>

@section('footer')
    <footer>
        <div
            class="mt-5 bg-neutral-800 h-80 text-white flex flex-1 flex-shrink-1 justify-evenly flex-wrap max-lg:hidden">
            <div class="mt-20">
                <h4 class="text-neutral-400">Kontaktiere uns!</h4><br>
                <div>Tel.: 12345 7891012</div>
                <br>
                <h4>Support Öffnungszeiten</h4>
                <div>Mo - Fr: 10-15 Uhr</div>
            </div>
            <div class="mt-20">
                <h4 class="text-neutral-400">Kundenservice</h4><br>
                <div>Versand</div>
                <div>Widerruf</div>
                <div>Kontakt</div>
                <div>FAQ</div>
            </div>
            <div class="mt-20">
                <h4 class="text-neutral-400">Abalo</h4><br>
                <div>Mission</div>
                <div>Geschichte</div>
                <div>Jobs</div>
                <div>Kooperationen</div>
            </div>
            <div class="mt-20">
                <h4 class="text-neutral-400">Rechtliches</h4><br>
                <div>Impressum</div>
                <div>AGB</div>
                <div>Datenschutz</div>
            </div>
            <div class="mt-20">
                <h4 class="text-neutral-400">Abalo International</h4><br>
                <ul class="list-disc">
                    <li>Deutschland</li>
                    <li>Europa</li>
                </ul>
            </div>
        </div>
        <div class="lg:hidden mt-5 bg-neutral-800 h-224 text-white"><br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Kontaktiere uns!</h4><br>
                <div>Tel.: 12345 7891012</div>
                <br>
                <h4>Support Öffnungszeiten</h4>
                <div>Mo - Fr: 10-15 Uhr</div>
            </div>
            <br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Kundenservice</h4><br>
                <div>Versand</div>
                <div>Widerruf</div>
                <div>Kontakt</div>
                <div>FAQ</div>
            </div>
            <br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Abalo</h4><br>
                <div>Mission</div>
                <div>Geschichte</div>
                <div>Jobs</div>
                <div>Kooperationen</div>
            </div>
            <br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Rechtliches</h4><br>
                <div>Impressum</div>
                <div>AGB</div>
                <div>Datenschutz</div>
            </div>
            <br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Abalo International</h4><br>
                <ul class="list-disc">
                    <li>Deutschland</li>
                    <li>Europa</li>
                </ul>
            </div>
        </div>
        <hr>
        <div
            class="bg-neutral-800 h-60 text-neutral-400 flex flex-1 flex-shrink-1 justify-evenly flex-wrap max-lg:hidden">
            <div class="mt-20">
                <div>Versand</div>
                <div class="mt-5">
                    <img src="{{asset('img/2000px-DHL_Logo.png')}}">
                </div>
            </div>
            <div class="mt-20">
                <div>Zahlung</div>
                <img src="{{asset('img/1280px-PayPal_logo.png')}}" class="inline mt-5  scale-100">
                <img src="{{asset('img/Vorkasse.png')}}" class="inline mt-5 ml-3 scale-75">
                <img src="{{asset('img/Visa_2014_logo_detail.png')}}" class="inline mt-5 ml-3 scale-100">
                <img src="{{asset('img/mc_hrz_thmb_282_2x.png')}}" class="inline mt-5 ml-3 scale-100">
            </div>
            <div class="mt-20">
                <div>Social Media</div>
                <img src="{{asset('img/f_logo_RGB-Hex-Blue_512.png')}}" class="inline mt-5 ml-3">
                <img src="{{asset('img/2000px-Instagram_logo_2016.png')}}" class="inline mt-5 ml-3">
                <img src="{{asset('img/image_preview.png')}}" class="inline mt-5 ml-3">
                <img src="{{asset('img/tiktok-app-icon-8.png')}}" class="inline mt-5 ml-3">
            </div>
        </div>
        <div class="bg-neutral-800 h-96 text-neutral-400 lg:hidden">
            <div class="ml-8"><br>
                <div>Versand</div>
                <div class="mt-5">
                    <img src="{{asset('img/2000px-DHL_Logo.png')}}">
                </div>
            </div>
            <div class="mt-20 ml-8">
                <div>Zahlung</div>
                <img src="{{asset('img/1280px-PayPal_logo.png')}}" class="inline mt-5  scale-100">
                <img src="{{asset('img/Vorkasse.png')}}" class="inline mt-5 ml-3 scale-75">
                <img src="{{asset('img/Visa_2014_logo_detail.png')}}" class="inline mt-5 ml-3 scale-100">
                <img src="{{asset('img/mc_hrz_thmb_282_2x.png')}}" class="inline mt-5 ml-3 scale-100">
            </div>
            <div class="mt-20 ml-8">
                <div>Social Media</div>
                <img src="{{asset('img/f_logo_RGB-Hex-Blue_512.png')}}" class="inline mt-5 ml-3">
                <img src="{{asset('img/2000px-Instagram_logo_2016.png')}}" class="inline mt-5 ml-3">
                <img src="{{asset('img/image_preview.png')}}" class="inline mt-5 ml-3">
                <img src="{{asset('img/tiktok-app-icon-8.png')}}" class="inline mt-5 ml-3">
            </div>
        </div>

        <div class="bg-neutral-800 h-16 text-neutral-400 text-center text-sm max-lg:hidden">
            <p class="">Alle Preise inkl. der gesetzl. MwSt. und zzgl. <span
                    class="text-neutral-200">Versandkosten</span></p>
        </div>
        <div class="bg-neutral-800 h-32 text-neutral-400 text-center text-sm lg:hidden pt-20">
            <p class="">Alle Preise inkl. der gesetzl. MwSt. und zzgl. <span
                    class="text-neutral-200">Versandkosten</span></p>
        </div>
    </footer>
@show

@section('cookie-consent')
    <div id="cookie-consent"
         class="fixed text-white w-full h-1/6 bg-black bottom-0 text-center text-sm max-xl:h-1/3 max-sm:h-1/2 opacity-90 z-50">
        <p class="my-2">Gemäß der Datenschutz-Grundverordnung (DSGVO) sind wir verpflichtet, Sie darüber zu informieren,
            dass diese Website Cookies verwendet.
            Wir möchten Ihnen die Möglichkeit geben, selbst zu entscheiden, ob Sie der Verwendung von Cookies zustimmen
            oder nicht. Wenn Sie auf "Akzeptieren" klicken, erklären Sie sich damit einverstanden, dass Cookies gemäß
            unserer Datenschutzerklärung auf Ihrem Gerät gespeichert werden. Wenn Sie auf "Ablehnen" klicken, werden
            keine Cookies gespeichert, außer technisch notwendige Cookies, die für den Betrieb der Website erforderlich
            sind.</p>
        <div class="my-2">
            <button id="accept" class="border border-white p-1 hover:bg-white/50 rounded-md">Akzeptieren</button>
            <button id="decline" class="border border-white p-1 hover:bg-white/50 rounded-md">Ablehnen</button>
        </div>
    </div>
@show

<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/cookiecheck.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/articles.js')}}"></script>
<script src="{{asset('js/newsletter.js')}}"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://kit.fontawesome.com/1f2fd08344.js" crossorigin="anonymous"></script>

</body>
