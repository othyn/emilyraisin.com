@extends ('layouts.master')

@section ('main-content')

<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-12 h-100 d-flex flex-column justify-content-center text-center">
            <div class="row">
                <div class="col-12 mb-4">
                    <img src="/img/me.jpeg" class="img-thumbnail rounded-circle img-fluid mx-auto d-block img-ruled" alt="Me!">
                </div>
                <div class="col-12 mb-4">
                    <h1 id="type-tagline"></h1>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-4 col-sm-2 offset-sm-3">
                            <a href="/about">About</a>
                        </div>
                        <div class="col-4 col-sm-2">
                            <a href="/portfolio">Portfolio</a>
                        </div>
                        <div class="col-4 col-sm-2">
                            <a href="#">Say Hello!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
