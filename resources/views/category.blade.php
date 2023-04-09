@extends('layouts.app')

@section('title','Kategorien - Abalo')
@section('head')
    <link rel="stylesheet" href="css/category.css">
@endsection

@section('header')
    @parent
@endsection

@section('main')
    <div class="flex justify-evenly flex-wrap">
        @foreach($categories as $category)
            <a href="/articles/{{$category->id}}">
                <div class="card m-10 w-48">
                    <img src="{{asset('img/c_'.$category->id.'.jpg')}}" class="" alt="Avatar">
                    <div class="container">
                        <h4><b>{{$category->ab_name}}</b></h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@section('footer')
    @parent
@endsection
