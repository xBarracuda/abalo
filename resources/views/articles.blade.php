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
                    <div class="card m-10 w-48 bg-gray-400/30" id="{{$a->id}}">
                        <img
                            src="@if(file_exists('img/'.$a->id.'.png')) {{asset('img/'.$a->id.'.png')}} @elseif(file_exists(('img/'.$a->id.'.jpg'))) {{asset('img/'.$a->id.'.jpg')}} @else {{asset('img/0.png')}} @endif"
                            class="" alt="Avatar">
                        <div class="container">
                            <h4><b>{{$a->ab_name}}</b></h4>
                            <p class="underline ">{{number_format($a->ab_price,2)}}€</p>
                            <p class="py-5 h-40 text-sm">{{$a->ab_description}}</p>
                        </div>
                        <button class="addButtons"
                                value="{{$a->id}}/??/{{$a->ab_name}}/??/{{$a->ab_price}}/??/{{$a->ab_description}}">
                            <div
                                class=" rounded-lg bg-green-400/90 grid grid-cols-2 grid-cols-[20%,80%] divide-x divide-black gap-2">
                                <div class="self-center border border-black rounded-full p-1"><i
                                        class="fa-solid fa-cart-plus"></i>
                                </div>
                                <div>
                                    Zum Warenkorb hinzufügen
                                </div>

                            </div>
                        </button>
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

