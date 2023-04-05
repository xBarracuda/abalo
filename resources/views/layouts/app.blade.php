<!DOCTYPE html>
<html lang="de">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1f2fd08344.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/app.css">
    @yield('head')
    @vite('resources/css/app.css')
</head>
<body class="font-mono" onload="init()">
@section('header')
    <header>
        <div class="w-full h-34 bg-gray-300/50 grid grid-cols-2 grid-cols-[20%,80%]">
            <div>
                <a href="/"><img src="{{asset('img/abalo-logos.png')}}" width="80" class=" mx-auto"></a>
            </div>
            <div class="mr-16 max-xl:hidden" id="navigationItems">
                <div class="flex justify-evenly align-items-center">
                    <div class="mt-8">
                        <a href="/" class="hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'home') underline decoration-1 font-bold @endif hover:font-bold">Home</a>
                    </div>
                    <div class="mt-8">
                        <a href="/category" class="hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'category') underline decoration-1 font-bold @endif hover:font-bold">Kategorien</a>
                    </div>
                    <div class="mt-8">
                        <a href="/articles" class="hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'articles') underline decoration-1 font-bold @endif hover:font-bold">Artikel</a>
                    </div>
                    <div class="mt-8">
                        <a href="/sell" class="hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'sell') underline decoration-1 font-bold @endif hover:font-bold">Verkaufen</a>
                    </div>
                    <div class="mt-8 relative" id="about">
                        <a href="/about"  class="hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'about') underline decoration-1 font-bold @endif hover:font-bold">Unternehmen</a>
                        <div id="aboutBar" class="w-full bg-gray-300/50 absolute">
                            <ul class="list-disc">
                                <a href="/about#philosophy" class="hover:underline"><li>Philosophie</li></a>
                                <a href="/about#career" class="hover:underline"><li>Karriere</li></a>
                            </ul>

                        </div>
                    </div>
                    <div class="mt-8">
                        <a href="/contact" class="hover:underline @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'contact') underline decoration-1 font-bold @endif hover:font-bold">Kontakt</a>
                    </div>
                    <div class="mt-8">
                        <button onclick="searchbar()"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="mt-8">
                        <a href="/" class="hover:underline hover:font-bold"><i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    <div class="mt-8">
                        @if(!session()->has('abalo_user'))
                            <a href="/login" class="hover:underline hover:font-bold"><i class="fa-solid fa-user"></i></a>
                        @else
                            <a href="/profile" class="font-bold hover:underline hover:font-bold">Willkommen {{session()->get('abalo_user')}}</a>
                        @endif
                    </div>
                    @if(session()->has('abalo_user'))
                        <div class="mt-8">
                            <a href="/logout" class="hover:underline hover:font-bold">Ausloggen</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="absolute w-1/2 left-1/2 my-6 max-xl:hidden grid grid-cols-2" id="searchbar">
                <form method="get" action="/articles">
                    <input type="text" name="search" class="rounded-xl w-full" placeholder="Ihr Suchbegriff" autocomplete="off">
                </form>
                <div class="m-auto" >
                    <button id="searchbarClose" onclick="searchbar()"></button>
                </div>
            </div>
            <div class="mr-16 xl:hidden flex">
                <button id="nav" class="ml-auto" onclick="navbar()"><i class="fa-solid fa-bars scale-125"></i></button>
            </div>

        </div>
    </header>
    <div id="navbar" class="w-full bg-gray-400 transition-all xl:hidden">
        <div id="navitems" class="h-full text-gray-800 text-center grid grid-cols-1 grid-rows-7 gap-2 place-items-center">
            <div>
                <a href="/" class="hover:underline hover:font-bold">Home</a>
            </div>
            <div>
                <a href="/category" class="hover:underline hover:font-bold">Kategorien</a>
            </div>
            <div>
                <a href="/articles" class="hover:underline hover:font-bold">Artikel</a>
            </div>
            <div>
                <a href="/sell" class="hover:underline hover:font-bold">Verkaufen</a>
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
<main>
    @yield('main')
</main>

@section('footer')
    <footer>
        <div class="mt-5 bg-neutral-800 h-80 text-white flex flex-1 flex-shrink-1 justify-evenly flex-wrap max-lg:hidden">
            <div class="mt-20">
                <h4 class="text-neutral-400">Kontaktiere uns!</h4><br>
                <div>Tel.: 12345 7891012</div><br>
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
                <div>Tel.: 12345 7891012</div><br>
                <h4>Support Öffnungszeiten</h4>
                <div>Mo - Fr: 10-15 Uhr</div>
            </div><br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Kundenservice</h4><br>
                <div>Versand</div>
                <div>Widerruf</div>
                <div>Kontakt</div>
                <div>FAQ</div>
            </div><br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Abalo</h4><br>
                <div>Mission</div>
                <div>Geschichte</div>
                <div>Jobs</div>
                <div>Kooperationen</div>
            </div><br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Rechtliches</h4><br>
                <div>Impressum</div>
                <div>AGB</div>
                <div>Datenschutz</div>
            </div><br>
            <div class="ml-8">
                <h4 class="text-neutral-400">Abalo International</h4><br>
                <ul class="list-disc">
                    <li>Deutschland</li>
                    <li>Europa</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="bg-neutral-800 h-60 text-neutral-400 flex flex-1 flex-shrink-1 justify-evenly flex-wrap max-lg:hidden">
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
            <p class="">Alle Preise inkl. der gesetzl. MwSt. und zzgl. <span class="text-neutral-200">Versandkosten</span></p>
        </div>
        <div class="bg-neutral-800 h-32 text-neutral-400 text-center text-sm lg:hidden pt-20">
            <p class="">Alle Preise inkl. der gesetzl. MwSt. und zzgl. <span class="text-neutral-200">Versandkosten</span></p>
        </div>
    </footer>
@show

@section('cookie-consent')
    <div id="cookie-consent" class="fixed w-full h-1/6 bg-gray-400 bottom-0 text-center text-sm max-xl:h-1/3 max-sm:h-1/2">
        <p class="my-2">Gemäß der Datenschutz-Grundverordnung (DSGVO) sind wir verpflichtet, Sie darüber zu informieren, dass diese Website Cookies verwendet.
            Wir möchten Ihnen die Möglichkeit geben, selbst zu entscheiden, ob Sie der Verwendung von Cookies zustimmen oder nicht. Wenn Sie auf "Akzeptieren" klicken, erklären Sie sich damit einverstanden, dass Cookies gemäß unserer Datenschutzerklärung auf Ihrem Gerät gespeichert werden. Wenn Sie auf "Ablehnen" klicken, werden keine Cookies gespeichert, außer technisch notwendige Cookies, die für den Betrieb der Website erforderlich sind.</p>
        <div class="my-2">
            <button id="accept" class="border border-black p-1">Akzeptieren</button>
            <button id="decline" class="border border-black p-1">Ablehnen</button>
        </div>
    </div>
@show

<script src="{{asset('js/navbar.js')}}"></script>
<script src="{{asset('js/cookiecheck.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
