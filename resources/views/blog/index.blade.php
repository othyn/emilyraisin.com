@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            @if (isset($tag))
                <h1 class="type-me">{{ $tag->name }}</h1>
                <h5 class="text-muted">Filtered by tag.</h5>
            @else
                <h1 class="type-me">Emily's Blog</h1>
                <h5 class="text-muted">Making the words count.</h5>
            @endif
        </div>
    </div>

@endsection

@section ('main-content')

    @if (auth()->check() && auth()->user()->is_admin)

        <a class="d-block pb-4 mb-5 border-bottom" href="{{ route('posts.create') }}">+ Create post</a>

    @endif

    @if (count($posts))
        @foreach ($posts as $post)

            @include ('blog.post')

        @endforeach

        <nav class="blog-pagination text-center">
            <a class="d-inline-block mr-4" href="#">< Older</a>
            <a class="d-inline-block" href="#">Newer ></a>
        </nav>
    @else
        <div class="blog-post">
            <h2 class="blog-post-title">Writers block</h2>
            There doesn't appear to be anything here yet... please feel free to check back again later!
        </div>
    @endif

@endsection
