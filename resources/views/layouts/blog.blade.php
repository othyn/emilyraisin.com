<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    @include ('layouts.header')

    <body class="h-50">

        @include ('layouts.nav')

        @include ('components.messages.flash.success')

        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-column justify-content-center text-center">

                    @yield ('title-content')

                </div>
            </div>
        </div>

        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">

                    @yield ('main-content')

                </div>

                <aside class="col-md-4 blog-sidebar">

                    @include ('posts.sidebar')

                </aside>
            </div>
        </main>

        @include ('layouts.footer')

    </body>

</html>
