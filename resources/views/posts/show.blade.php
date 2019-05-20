@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">{{ $post->title }}</h1>
            <h5 class="text-muted">{{ $post->created_at->toFormattedDateString() }} by <a href="/about">Emily</a></h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <div class="blog-post pb-5 mb-5">

        <a class="d-block mb-4" href="/blog">< Back to list</a>

        {!! nl2br(e($post->body)) !!}

    </div>

@endsection
