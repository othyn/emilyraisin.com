<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    @include ('layouts.header')

    <body class="h-100">

        @include ('layouts.nav')

        @if (View::hasSection('main-content'))

            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100 d-flex flex-column justify-content-center text-center">

                        @yield ('main-content')

                    </div>
                </div>
            </div>

        @endif

        @include ('layouts.footer')

    </body>

</html>
