@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">Emily's Blog</h1>
            <h5 class="text-muted">Making the words count.</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    @foreach ($posts as $post)

        @include ('posts.post')

    @endforeach

    <nav class="blog-pagination text-center">
        <a class="d-inline-block mr-4" href="#">< Older</a>
        <a class="d-inline-block" href="#">Newer ></a>
    </nav>

@endsection
