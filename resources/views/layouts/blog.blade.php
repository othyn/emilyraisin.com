<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

    @include ('layouts.header')

    <body class="h-50">

        <a id="name-brand" href="/">Emily Raisin</a>

        <div class="container-fluid h-100">
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

                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                    </nav>

                </div>

                <aside class="col-md-4 blog-sidebar">

                    @include ('posts.sidebar')

                </aside>
            </div>
        </main>

        @include ('layouts.footer')

    </body>

</html>
