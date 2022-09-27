<!DOCTYPE html>
@props(['title'])

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document | {{ $title }}</title>
    {{-- imoport Tailwind --}}

    @vite('resources/css/app.css')
</head>
<body>
    @include("partials.navbar._navbar")
    {{ $slot }}
</body>
</html>