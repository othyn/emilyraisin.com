<div class="p-4 mb-3 bg-light rounded">
    <h4 class="font-italic">About</h4>
    <p class="mb-0">I’m creative, but I also understand briefs and deadlines. If that sounds like the type of person you would like to work with, contact me.</p>
</div>

<div class="p-4">
    <h4 class="font-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        <li>
            <a href="{{ route('posts.index') }}">
                All posts ({{ $archives->sum('published') }})
            </a>
        </li>

        @foreach ($archives as $archive)
            <li>
                <a href="{{ route('posts.index') }}?year={{ $archive->year }}&month={{ $archive->month }}">
                    {{ $archive->year }}, {{ $archive->month }} ({{ $archive->published }})
                </a>
            </li>
        @endforeach
    </ol>
</div>

<div class="p-4">
    <h4 class="font-italic">Tags</h4>
    <ol class="list-unstyled mb-0">
        <li>
            <a href="{{ route('posts.index') }}">
                All posts ({{ $archives->sum('published') }})
            </a>
        </li>

        @foreach ($tags as $tag)
            <li>
                <a href="{{ route('tags.filter', ['id' => $tag->name]) }}">
                    {{ $tag->name }} ({{ $tag->posts->count() }})
                </a>
            </li>
        @endforeach
    </ol>
</div>

<div class="p-4">
    <h4 class="font-italic">Elsewhere</h4>
    <ol class="list-unstyled">
        <li>
            <a href="https://www.linkedin.com/in/emily-raisin-84681714b">LinkedIn</a>
        </li>

        @component('swal.contact')
            @slot('anchor')
                Email me
            @endslot
        @endcomponent
    </ol>
</div>
