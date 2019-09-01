<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100-d mt-125 mb-5 m-sm-0">

    @include ('layouts.header')

    <body class="h-50-d">

        @include ('layouts.nav')

        @include ('components.messages.flash.success')

        <div class="container h-100-d title-container mb-5 mb-sm-0">
            <div class="row h-100-d">
                <div class="col-12 h-100-d d-flex flex-column justify-content-center text-center">

                    @yield ('title-content')

                </div>
            </div>
        </div>

        <main id="app" role="main" class="container">
            <div class="row">
                @if ($sidebar)

                    <div class="col-md-8 blog-main">

                        @yield ('main-content')

                    </div>

                    <aside class="col-md-4 blog-sidebar">
                        {{-- <div class="sticky-top"> --}}

                            @include ('blog.sidebar')

                        {{-- </div> --}}
                    </aside>

                @else

                    <div class="col-md-12 blog-main">

                        @yield ('main-content')

                    </div>

                @endif
            </div>
        </main>

        @include ('layouts.footer')

    </body>

</html>
