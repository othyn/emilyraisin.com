<div id="nav-bar">
    <a id="brand" href="{{ route('home') }}">Emily Raisin, <small>Copywriter.</small></a>

    @if (auth()->check())

    @endif

    <p class="d-inline-block float-right mt-1 mb-0">
        @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>

                @if (Route::has('register'))
                    | <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
        @else
            <form method="POST" action="{{ route('logout') }}" class="d-inline-block float-right mt-1 mb-0">
                {{ csrf_field() }}

                <p class="mb-0">
                    {{ auth()->user()->name }}
                    @if (auth()->user()->is_admin) | <span class="text-success">Admin</span> @endif
                    | <button type="submit" name="logout" class="btn btn-link btn-link-muted p-0 d-inline-block">Logout</button>
                </p>
            </form>
        @endguest
    </p>

</div>
