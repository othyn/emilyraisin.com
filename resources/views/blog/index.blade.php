@extends ('layouts.blog', ['sidebar' => true])

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

        <div class="d-block border-bottom pb-4 mb-5">
            <a class="btn btn-link" href="{{ route('posts.create') }}">+ Create post</a>
            <a class="btn btn-link pull-right" href="{{ route('files.index') }}">[=] Manage files</a>
        </div>

    @endif

    @if (count($posts))
        @foreach ($posts as $post)

            @include ('blog.post')

        @endforeach

        {{ $posts->appends(Request::except('page'))->links() }}

    @else
        <div class="blog-post">
            <h2 class="blog-post-title">Writers block</h2>
            There doesn't appear to be anything here yet... please feel free to check back again later!
        </div>
    @endif

@endsection
