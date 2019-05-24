<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    @include ('layouts.header')
    {{-- @yield('title') --}}

    <body class="h-100">

        @include ('layouts.nav')

        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-column justify-content-center text-center">

                    <div class="row">
                        <div class="col-12">
                            <h1 class="type-me">@yield('code')</h1>
                            <h5 class="text-muted">@yield('message')</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include ('layouts.footer')

    </body>

</html>
