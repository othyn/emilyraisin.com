<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Emily Raisin</title>

        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" href="{{ url('/css/app.css') }}">

    </head>

    <body>

        @if (View::hasSection('main-content'))

            <section class="section">

                <div class="container">

                    @yield ('main-content')

                </div>

            </section>

        @endif

        <script src="{{ url('/js/manifest.js') }}"></script>
        <script src="{{ url('/js/vendor.js') }}"></script>
        <script src="{{ url('/js/app.js') }}"></script>

    </body>

</html>
