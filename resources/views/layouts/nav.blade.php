<nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="{{ route('home') }}">
        Emily Raisin, <small>Copywriter.</small>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#er-nav" aria-controls="er-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="er-nav">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                        {{ auth()->user()->name }}
                        (<span class="text-success">{{ auth()->user()->role }}</span>)
                    </a>
                </li>

                <form method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0">
                    {{ csrf_field() }}
                    <li class="nav-item">
                        <button type="submit" name="logout" class="nav-link">Logout</button>
                    </li>
                </form>
            @endguest
        </ul>
    </div>
</nav>
