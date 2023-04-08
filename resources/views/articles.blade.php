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
                    <div class="card m-10 w-48" id="{{$a->id}}">
                        <img
                            src="@if(file_exists('img/'.$a->id.'.png')) {{asset('img/'.$a->id.'.png')}} @elseif(file_exists(('img/'.$a->id.'.jpg'))) {{asset('img/'.$a->id.'.jpg')}} @endif"
                            class="" alt="Avatar">
                        <div class="container">
                            <h4><b>{{$a->ab_name}}</b></h4>
                            <p>{{number_format($a->ab_price,2)}}€</p>
                            <p class="py-5 h-40">{{$a->ab_description}}</p>
                        </div>
                        <p class="bg-gray-600/50">
                            <button class="addButtons"
                                    value="{{$a->id}}/??/{{$a->ab_name}}/??/{{$a->ab_price}}/??/{{$a->ab_description}}">
                                Zum Warenkorb hinzufügen
                            </button>
                        </p>
                    </div>
                @endforeach
            </div>
        @elseif($articles && count($articles) == 0)
            <div class="h-80 flex">
                <h1 class="my-auto mx-auto font-bold text-3xl">Es tut uns leid, Ihre Anfrage hat keinen Treffer ergeben
                    :(</h1>
            </div>
        @elseif($allArticles)
            <div class="flex justify-evenly flex-wrap">
                @foreach($allArticles as $a)
                    <div class="card m-10 w-48" id="{{$a->id}}">
                        <img
                            src="@if(file_exists('img/'.$a->id.'.png')) {{asset('img/'.$a->id.'.png')}} @elseif(file_exists(('img/'.$a->id.'.jpg'))) {{asset('img/'.$a->id.'.jpg')}} @endif"
                            class="" alt="Avatar">
                        <div class="container">
                            <h4><b>{{$a->ab_name}}</b></h4>
                            <p>{{number_format($a->ab_price,2)}}€</p>
                            <p class="py-5 h-40">{{$a->ab_description}}</p>
                        </div>
                        <p class="bg-gray-600/50">
                            <button class="addButtons"
                                    value="{{$a->id}}/??/{{$a->ab_name}}/??/{{$a->ab_price}}/??/{{$a->ab_description}}">
                                Zum Warenkorb hinzufügen
                            </button>
                        </p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection

@section('footer')
    @parent
@endsection

