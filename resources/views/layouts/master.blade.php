<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Emily Raisin</title>

        <meta name="description" content="Freelance copywriter. I’m creative, but I also understand briefs and deadlines. If that sounds like the type of person you would like to work with, contact me.">

        <link rel="shortcut icon" href="/favicon.png">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    </head>

    <body class="h-100">

        <a id="name-brand" href="/">Emily Raisin</a>

        @if (View::hasSection('main-content'))

            @yield ('main-content')

        @endif

        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
        <script src="{{ mix('/js/app.js') }}"></script>

        <script>
            var recaptchaCallback = function() {

                $('.g-recaptcha').html('');

                $('.g-recaptcha').each(function (i, captcha) {
                    grecaptcha.render(captcha, {
                        'sitekey': '6Le115MUAAAAAFQ8FSjIeG4WgO_Thp-UmGA_Pp9q'
                    });
                });
            };
        </script>

        {!! NoCaptcha::renderJs('en', true, 'recaptchaCallback') !!}

    </body>

</html>
