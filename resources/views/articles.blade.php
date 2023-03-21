<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
</head>
<body>
<h1>Artikel</h1>
@if($articles)
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Preis</td>
            <td>Beschreibung</td>
            <td>Ersteller</td>
            <td>Datum der Erstellung</td>
            <td>Bild</td>
        </tr>
        @foreach($articles as $a)
            <tr>
                <td>{{$a->id}}</td>
                <td>{{$a->ab_name}}</td>
                <td>{{$a->ab_price}}</td>
                <td>{{$a->ab_description}}</td>
                <td>{{$a->ab_creator_id}}</td>
                <td>{{$a->ab_createdate}}</td>
                <td>
                    @if(file_exists('img/'.$a->id.'.png'))
                        <img src="{{'img/'.$a->id.'.png'}}">
                    @elseif(file_exists('img/'.$a->id.'.jpg'))
                        <img src="{{'img/'.$a->id.'.jpg'}}">
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
