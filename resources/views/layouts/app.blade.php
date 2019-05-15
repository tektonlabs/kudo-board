<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@4/public/assets/styles/choices.min.css">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="font-sans antialiased text-black leading-tight">
    <div id="min-h-screen app">
        <div class="h-24 flex items-center justify-center">
            <h1 class="text-5xl text-blue font-sans">Kudo Board.</h1>
        </div>
        @yield('body')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
