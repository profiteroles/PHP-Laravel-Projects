<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>What To DO!</title>
</head>
<body class="w-full h-screen "
      style="background-image: url('https://www.transparenttextures.com/patterns/brick-wall.png');">
{{--NavBar--}}
<x-navbar name="{{$name}}"/>
{{$slot}}
</body>
</html>

