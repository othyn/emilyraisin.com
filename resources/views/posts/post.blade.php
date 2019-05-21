<div class="blog-post pb-5 mb-5 border-bottom">
    <h2 class="blog-post-title">
        <a href="{{ route('posts.show', [$post->id]) }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}</p>

    {{ $post->subtitle }}

    <div class="clearfix">
        <a class="d-inline-block mt-3" href="{{ route('posts.show', [$post->id]) }}">Continue reading ></a>

        @if (auth()->check() && auth()->user()->is_admin)

            <span class="float-right mt-3">
                <a class="btn btn-link d-inline-block p-0" href="{{ route('posts.edit', [$post->id]) }}">Edit</a>
                <span class="text-muted pl-2 pr-2">|</span>
                <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}" class="d-inline-block">
                    @csrf
                    @method ('DELETE')

                    <button type="submit" class="btn btn-link d-inline-block p-0">Delete</button>
                </form>
            </span>

        @endif
    </div>
</div>
