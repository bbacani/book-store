<nav class="navbar primary-color navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Fortify') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">{{ __('messages.books') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">{{ __('messages.about_us') }}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
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
                {{-- @if (Auth::user()->email_verified_at) --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('cart.cart') }}">{{ __('Cart') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonUser"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonUser">
                        <li class="nav-item">
                            <a class="dropdown-item"
                                href="{{ route('user.favourites', Auth::id()) }}">{{ __('Favourites') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item"
                                href="{{ route('user.profile', Auth::id()) }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- @endif --}}
                </div>
            @endguest
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButtonLocale"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('messages.language') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonLocale">
                    <li>
                        <form action="{{ route('changeLocale') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="en">
                            <button type="submit" class="dropdown-item">{{ __('messages.language_en') }}</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('changeLocale') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="es">
                            <button type="submit" class="dropdown-item">{{ __('messages.language_es') }}</button>
                        </form>
                    </li>
                    <li>
                        <form action="{{ route('changeLocale') }}" method="POST">
                            @csrf
                            <input type="hidden" name="locale" value="hr">
                            <button type="submit" class="dropdown-item">{{ __('messages.language_hr') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </ul>
    </div>
</nav>
