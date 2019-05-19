@extends ('layouts.master')

@section ('main-content')

    <div class="row">
        <div class="col-12 mb-4">
            <img src="/img/me.jpeg" class="img-thumbnail rounded-circle img-fluid mx-auto d-block img-ruled" alt="Me!">
        </div>

        <div class="col-12 mb-4">
            <h1 id="type-tagline"></h1>
        </div>

{{--         <div class="col-12">
            <div class="row">
                <div class="col-3 col-sm-2 offset-sm-2">
                    <a href="/about">About</a>
                </div>

                <div class="col-3 col-sm-2">
                    <a href="/blog">Blog</a>
                </div>

                <div class="col-3 col-sm-2">
                    <a href="/portfolio">Portfolio</a>
                </div>

                <div class="col-3 col-sm-2">
                    @component('swal.contact')
                        @slot('anchor')
                            Say Hello!
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div> --}}

        <div class="col-12">
            <div class="row">
                <div class="col-4 col-sm-2 offset-sm-3">
                    <a href="/about">About</a>
                </div>

                <div class="col-4 col-sm-2">
                    <a href="/portfolio">Portfolio</a>
                </div>

                <div class="col-4 col-sm-2">
                    @component('swal.contact')
                        @slot('anchor')
                            Say Hello!
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

@endsection
