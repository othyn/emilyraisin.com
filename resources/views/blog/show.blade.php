@extends ('layouts.blog')

@section ('title-content')

    <div class="row">
        <div class="col-12">
            <h1 class="type-me">{{ $post->title }}</h1>
            <h5 class="text-muted">{{ $post->subtitle }}</h5>

            @if (count($post->tags))
                @foreach ($post->tags as $tag)
                    <a class="pr-3" href="{{ route('tags.filter', [$tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
            @endif
        </div>
    </div>

@endsection

@section ('main-content')

    <div class="blog-post pb-5 mb-5">

        <div class="clearfix">
            <a class="d-inline-block mb-4" href="{{ route('posts.index') }}">< Back to list</a>

            <div class="float-right">
                @if (auth()->check() && auth()->user()->is_admin)

                    <a class="btn btn-link d-inline-block p-0" href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
                    <span class="text-muted pl-2 pr-2">|</span>
                    <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}" class="d-inline-block">
                        @csrf
                        @method ('DELETE')

                        <button type="submit" class="btn btn-link d-inline-block p-0" >Delete</button>
                    </form>
                    <span class="text-muted pl-2 pr-2">|</span>
                @endif

                <p class="d-inline-block text-muted mb-0">
                    {{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}
                </p>
            </div>
        </div>

        {!! $post->body !!}

    </div>

@endsection
