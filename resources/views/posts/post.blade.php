<div class="blog-post pb-5 mb-5 border-bottom">
    <h2 class="blog-post-title">
        <a href="/blog/posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="/about">Emily</a></p>

    {{ $post->subtitle }}
</div>
