<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Emily Raisin</title>

        <meta name="description" content="Freelance copywriter. I’m creative, but I also understand briefs and deadlines. If that sounds like the type of person you would like to work with, contact me.">

        <link rel="shortcut icon" href="/favicon.png">
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">

    </head>

    <body class="h-100">

        <a id="name" href="/">Emily Raisin</a>

        @if (View::hasSection('main-content'))

            @yield ('main-content')

        @endif

        <script src="{{ url('/js/manifest.js') }}"></script>
        <script src="{{ url('/js/vendor.js') }}"></script>
        <script src="{{ url('/js/app.js') }}"></script>

    </body>

</html>
