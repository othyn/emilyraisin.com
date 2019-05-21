<div id="nav-bar">
    <a id="brand" href="{{ route('home') }}">Emily Raisin</a>

    @if (auth()->check())

        <form method="POST" action="/logout" class="d-inline-block float-right mt-1 mb-0">
            {{ csrf_field() }}
            <p class="mb-0">
                Logged in as: {{ auth()->user()->name }}
                @if (auth()->user()->is_admin) <span class="text-muted">(Admin)</span> @endif
                | <button type="submit" name="logout" class="btn btn-link p-0 d-inline-block">Logout</button>
            </p>
        </form>

    @endif
</div>
