

@extends('layouts.app')

@section('title','Artikel')

@section('header')
    @parent
@endsection

@section('main')
<div class="text-center my-5">
    @if($articles && count($articles) != 0)
        <table>
            <tr class="border border-slate-400 font-bold">
                <td class="border border-slate-400">ID</td>
                <td class="border border-slate-400">Name</td>
                <td class="border border-slate-400">Preis</td>
                <td class="border border-slate-400">Beschreibung</td>
                <td class="border border-slate-400">Ersteller</td>
                <td class="border border-slate-400">Datum der Erstellung</td>
                <td class="border border-slate-400">Bild</td>
            </tr>
            @foreach($articles as $a)
                <tr class="border border-slate-400">
                    <td class="border border-slate-400">{{$a->id}}</td>
                    <td class="border border-slate-400">{{$a->ab_name}}</td>
                    <td class="border border-slate-400">{{$a->ab_price}}</td>
                    <td class="border border-slate-400">{{$a->ab_description}}</td>
                    <td class="border border-slate-400">{{$a->ab_creator_id}}</td>
                    <td class="border border-slate-400">{{$a->ab_createdate}}</td>
                    <td class="border border-slate-400">
                        @if(file_exists('img/'.$a->id.'.png'))
                            <img src="{{'img/'.$a->id.'.png'}}" width="10" alt="{{$a->name}}">
                        @elseif(file_exists('img/'.$a->id.'.jpg'))
                            <img src="{{'img/'.$a->id.'.jpg'}}" width="100" alt="{{$a->name}}">
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif($articles && count($articles) == 0)
        <div class="h-80 flex">
            <h1 class="my-auto mx-auto font-bold text-3xl">Es tut uns leid, Ihre Anfrage hat keinen Treffer ergeben :(</h1>
        </div>
    @elseif($allArticles)
        <table>
            <tr class="border border-slate-400 font-bold">
                <td class="border border-slate-400">ID</td>
                <td class="border border-slate-400">Name</td>
                <td class="border border-slate-400">Preis</td>
                <td class="border border-slate-400">Beschreibung</td>
                <td class="border border-slate-400">Ersteller</td>
                <td class="border border-slate-400">Datum der Erstellung</td>
                <td class="border border-slate-400">Bild</td>
            </tr>
            @foreach($allArticles as $a)
                <tr class="border border-slate-400">
                    <td class="border border-slate-400">{{$a->id}}</td>
                    <td class="border border-slate-400">{{$a->ab_name}}</td>
                    <td class="border border-slate-400">{{$a->ab_price}}</td>
                    <td class="border border-slate-400">{{$a->ab_description}}</td>
                    <td class="border border-slate-400">{{$a->ab_creator_id}}</td>
                    <td class="border border-slate-400">{{$a->ab_createdate}}</td>
                    <td class="border border-slate-400">
                        @if(file_exists('img/'.$a->id.'.png'))
                            <img src="{{'img/'.$a->id.'.png'}}" width="10" alt="{{$a->name}}">
                        @elseif(file_exists('img/'.$a->id.'.jpg'))
                            <img src="{{'img/'.$a->id.'.jpg'}}" width="100" alt="{{$a->name}}">
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    @endif

</div>
@endsection

@section('footer')
    @parent
@endsection

