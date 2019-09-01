<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100-d mt-125 mb-5 m-sm-0">

    @include ('layouts.header')

    <body class="h-100-d">

        @include ('layouts.nav')

        @if (View::hasSection('main-content'))

            <div id="app" class="container h-100-d">
                <div class="row h-100-d">
                    <div class="col-12 h-100-d d-flex flex-column justify-content-center text-center">

                        @yield ('main-content')

                    </div>
                </div>
            </div>

        @endif

        @include ('layouts.footer')

    </body>

</html>
