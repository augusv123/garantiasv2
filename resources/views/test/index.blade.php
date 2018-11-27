<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $article->title }}</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/general.css') }}">
    </head>
    <body>
VISTA DE ARTICULO

<h1>{{ $article->title }}</h1>
<br>
{{ $article->content }}
<br>
{{ $article->user->name }} | {{ $article->category->name }} | 

@foreach($article->tags as $tag)
{{ $tag->name }}
@endforeach

    </body>
</html>