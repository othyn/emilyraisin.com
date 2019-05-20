@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">{{ $post->title }}</h1>
            <h5 class="text-muted">{{ $post->subtitle }}</h5>
        </div>
    </div>

@endsection

@section ('main-content')

    <div class="blog-post pb-5 mb-5">

        <div class="clearfix">
            <a class="d-inline-block mb-4" href="{{ route('posts') }}">< Back to list</a>
            <p class="d-inline-block float-right text-muted">
                {{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}
            </p>
        </div>

        {!! nl2br(e($post->body)) !!}

    </div>

@endsection
