<div class="blog-post pb-5 mb-5 border-bottom">
    <h2 class="blog-post-title">
        <a href="/blog/posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by {{ $post->user->name }}</p>

    {{ $post->subtitle }}

    <a class="d-block mt-3" href="/blog/posts/{{ $post->id }}">Continue reading ></a>
</div>
