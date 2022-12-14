<!DOCTYPE html>
@props(['title'])

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- cdn animation --}}
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Document | {{ $title }}</title>
    {{-- import Tailwind --}}

    @vite('resources/css/app.css')
</head>
<body>
    @include("partials.navbar._navbar")
    <h1 id="toto">helloooooooooo wwwworld dans le layout-main</h1>
    @include("partials._session")
    {{ $slot }}

    @vite('resources/js/app.js')
</body>
</html>