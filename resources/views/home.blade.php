@extends('layouts.app')

@section('title','Willkommen bei Abalo')
@section('head')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('header')
    @parent
@endsection

@section('main')
    <!-- Slideshow container -->
    <div class="slideshow-container w-full mt-5">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="absolute max-xl:hidden top-1/4 ml-6 font-bold text-3xl">
                Top-Technik-Deals <br>
                mit bis -40%!*
                <div class="font-normal text-xl mt-2">
                    Spare bei Refurb und <br>
                    ausgewählter Neuware.
                </div>
                <div class="mt-5">
                    <button class="border-black border p-2">Zur Aktion <i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="font-normal text-lg mt-3">
                    *ggü. UVP bzw Rabatt-Abzug im Warenkorb
                </div>
            </div>
            <img src="https://i.ebayimg.com/images/g/oqEAAOSwwmBkEfoL/s-l1600.webp" class="w-full h-full">

        </div>

        <div class="mySlides fade">
            <div class="absolute max-xl:hidden top-1/4 ml-6 font-bold text-white text-3xl">
                Neu: Ab sofort verkaufst <br>
                du kostenlos!
                <div class="font-normal text-xl mt-2">
                    Platz schaffen lohnt <br>
                    sich jetzt noch mehr.
                </div>
                <div class="mt-5">
                    <button class="border-white border p-2">Kostenlos verkaufen <i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="font-normal text-lg mt-3">
                    Für private Verkäufe
                </div>
            </div>
            <img src="https://i.ebayimg.com/images/g/mvIAAOSwwnlj~IMw/s-l1600.webp" class="w-full h-full">

        </div>


        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>

    <div class="h-80 max-sm:h-96 my-5 flex bg-gray-300/50">
        <div class="mx-auto mt-10 text-center">
            <i class="fa-solid fa-envelope scale-150"></i>
            <div class="font-bold text-2xl mt-3">
                Newsletter abonnieren!
                <div class="font-normal text-lg">
                    Wir bringen Sonderangebote, Rabattaktionen und aktuelle Trends zu dir nach Hause!
                    <div class="mt-5">
                        <form method="post" action="/subscribe">
                            @csrf
                            <input type="email" name="email" maxlength="60" placeholder="E-Mail Adresse"  class="rounded-lg w-3/4"><br>
                            <input type="submit" value="Kostenlos abonnieren" required class="mt-5 border border-black w-1/2 p-2 rounded-lg cursor-pointer bg-white hover:bg-gray-400 hover:transition-all">
                        </form>
                        @if($successMsg)
                            <div class="text-green-500 mt-2">
                                {{$successMsg}}
                            </div>
                        @elseif($errMsg)
                            <div class="text-red-500 mt-2">
                                {{$errMsg}}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
