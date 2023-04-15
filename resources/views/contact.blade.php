@extends('layouts.app')

@section('title','Kontaktanfrage - Abalo')
@section('head')

@endsection

@section('header')
    @parent
@endsection

@section('main')
    <div class="flex my-10 px-4">
        <div class="mx-auto text-lg">
            <h2 class="text-4xl font-bold">Kontaktformular</h2>
            <p class="my-4 font-bold">Fragen, Anregungen oder Kritik? Nur zu, schreiben Sie uns!</p>
            <p>Mail: example@abalo.com</p>
            <p>Telefon: 12345 7891012 (Montag bis Freitag von 10 - 15 Uhr)</p>
            <div class="my-4">
                <ul>
                    <li>Abalo Shop GmbH</li>
                    <li>Beispielstraße 5</li>
                    <li>12345 Aachen</li>
                </ul>
            </div>
            <div class="my-6">
                <form method="post" action="/checkContactData">
                    @csrf
                    <input type="text" class="font-bold w-3/4 my-2" maxlength="60" name="name" placeholder="Ihr Name*"
                           required><br>
                    <input type="email" class="font-bold w-3/4 my-2" maxlength="60" name="email"
                           placeholder="Ihre E-Mail-Adresse*" required>
                    <textarea class="w-full h-40 my-2 font-bold" maxlength="1000" name="text"></textarea>
                    <input type="checkbox" name="checkbox" class="rounded-sm my-2" id="checkbox" required> <label
                        for="checkbox"><span
                            class="text-sm">Ich akzeptiere die Datenschutzbedingungen*</span></label><br>
                    <input type="submit" value="Senden" class="my-2 border border-blue-900 p-2 cursor-pointer">
                </form>
                @if($errMsgContact)
                    <div class="text-red-500 my-4">
                        {{$errMsgContact}}
                    </div>
                @elseif($successMsgContact)
                    <div class="text-green-500 my-4">
                        {{$successMsgContact}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
