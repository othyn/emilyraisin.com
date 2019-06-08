<div class="p-4 mb-3 bg-light rounded">
    <h4 class="font-italic">About</h4>
    <p class="mb-0">Maintaining the word count, while making the words count. I’m creative, but I also understand briefs and deadlines. If that sounds like the type of person you would like to work with, contact me.</p>
</div>

<div class="p-4">
    <h4 class="font-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        <li class="mb-1">
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
    <h4 class="font-italic">
        Tags
    </h4>
    <ol class="list-unstyled mb-0">
        <li class="mb-1">
            <a href="{{ route('posts.index') }}">
                All posts ({{ $archives->sum('published') }})
            </a>
        </li>

        @foreach ($tags as $tag)
            <li>
                @if (auth()->check() && auth()->user()->is_admin)
                    <a class="btn btn-link text-left d-inline-block p-0" href="{{ route('tags.edit', [$tag->name]) }}">Edit</a>
                    <span class="text-muted pl-1 pr-1">|</span>
                    <form method="POST" action="{{ route('tags.destroy', [$tag->name]) }}" class="d-inline-block">
                        @csrf
                        @method ('DELETE')
                        <button type="submit" class="btn btn-link d-inline-block p-0">Delete</button>
                    </form>
                    -
                @endif

                <a href="{{ route('tags.filter', ['id' => $tag->name]) }}">
                    {{ $tag->name }} ({{ $tag->posts->count() }})
                </a>
            </li>
        @endforeach

        @if (auth()->check() && auth()->user()->is_admin)
            <li>
                <a class="btn btn-link text-left p-0 pt-1" href="{{ route('tags.create') }}">+ Create tag</a>
            </li>
        @endif
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
