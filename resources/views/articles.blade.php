@extends('layouts.app')

@section('title','Artikel - Abalo')
@section('head')
    <link rel="stylesheet" href="{{asset('css/articles.css')}}">
@endsection

@section('header')
    @parent
@endsection

@section('main')
    <div class="text-center my-5">
        @if($articles && count($articles) != 0)
            <div class="flex justify-evenly flex-wrap">
                @foreach($articles as $a)
                    <div class="card m-10 w-48 bg-gray-400/30 p-5 abalo_article" id="{{$a->id}}">
                        <img
                            src="@if(file_exists('img/'.$a->id.'.png')) {{asset('img/'.$a->id.'.png')}} @elseif(file_exists(('img/'.$a->id.'.jpg'))) {{asset('img/'.$a->id.'.jpg')}} @else {{asset('img/0.png')}} @endif"
                            class="" alt="{{$a->ab_name}}">
                        <div class="container">
                            <h4 class="h-10"><b>{{$a->ab_name}}</b></h4>
                            <p class="underline h-10">{{number_format($a->ab_price,2)}}€</p>
                            <button class="info_buttons text-xs underline mb-4"
                                    value="{{$a->id}}/??/{{$a->ab_name}}/??/{{$a->ab_price}}/??/{{$a->ab_description}}">
                                Mehr Informationen
                            </button>

                        </div>
                        <button class="addButtons" id="add_button_{{$a->id}}"
                                value="{{$a->id}}/??/{{$a->ab_name}}/??/{{$a->ab_price}}/??/{{$a->ab_description}}">
                            <div
                                class=" rounded-lg bg-green-400/90 p-1 grid grid-cols-2 grid-cols-[20%,80%] divide-x divide-black gap-2">
                                <div class="self-center border border-black rounded-full p-1"><i
                                        class="fa-solid fa-cart-plus"></i>
                                </div>
                                <div class="text-sm">
                                    Zum Warenkorb hinzufügen
                                </div>
                            </div>
                        </button>
                    </div>
                    <div id="info_{{$a->id}}"
                         class="abalo_info info p-4 text-center rounded-xl w-1/3 h-3/4 bg-gray-200 fixed z-20">
                        <div class="absolute right-0 mr-4">
                            <button id="info_close_{{$a->id}}">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 gap-2 grid-rows-4 break-words grid-rows-[30%,15%,40%,5%] h-full">
                            <div class="place-self-center">
                                <div class="">
                                    <img
                                        src="@if(file_exists('img/'.$a->id.'.png')) {{asset('img/'.$a->id.'.png')}} @elseif(file_exists(('img/'.$a->id.'.jpg'))) {{asset('img/'.$a->id.'.jpg')}} @else {{asset('img/0.png')}} @endif"
                                        class="" alt="{{$a->ab_name}}">
                                </div>
                            </div>
                            <div class="font-bold text-xl">
                                {{$a->ab_name}}
                                <div>
                                    {{number_format($a->ab_price,2)}}€
                                </div>
                            </div>
                            <div>
                                {{$a->ab_description}}
                            </div>
                            <div>
                                <button class="addButtons" id="info_button_{{$a->id}}"
                                        value="{{$a->id}}/??/{{$a->ab_name}}/??/{{$a->ab_price}}/??/{{$a->ab_description}}">
                                    <div
                                        class=" rounded-lg bg-green-400/90 p-1 grid grid-cols-2 grid-cols-[20%,80%] divide-x divide-black gap-2">
                                        <div class="self-center border border-black rounded-full p-1"><i
                                                class="fa-solid fa-cart-plus"></i>
                                        </div>
                                        <div class="text-sm">
                                            Zum Warenkorb hinzufügen
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>


                    </div>

                @endforeach
            </div>
        @elseif($articles && count($articles) == 0)
            <div class="h-80 flex">
                <h1 class="my-auto mx-auto font-bold text-3xl">Es tut uns leid, Ihre Anfrage hat keinen Treffer ergeben
                    :(</h1>
            </div>
        @endif

    </div>
@endsection

@section('footer')
    @parent
@endsection

