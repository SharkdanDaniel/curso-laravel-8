<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet" />

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <div class="h-100 container">
        <x-alert></x-alert>
        {{ $slot }}
    </div>
</body>

</html>
