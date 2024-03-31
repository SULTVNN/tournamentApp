<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('logo.png') }}" alt="" width="150px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-5 mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('index') }}">AboutUs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tournament') }}">tournament</a>
            </li>
            @auth
                @if (Auth::user()->privileges == "admin")
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin') }}">admin</a>
                </li>
                @endif
            @endauth
        </ul>
        @auth
            <!-- User is authenticated -->
            {{-- <p>{{ Auth::user()->username }}</p> --}}
            <ul class="navbar-nav  mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" >
                        {{ Auth::user()->username}}
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/team"><span class="material-symbols-outlined">
                            groups
                            </span>team</a>
                        <a class="dropdown-item" href="#"><span class="material-symbols-outlined">
                            person
                            </span>profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/logout"><span class="material-symbols-outlined">
                            logout
                            </span>logout</a>
                    </div>
                </li>
            </ul>
        @else
            <!-- User is not authenticated -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="my-2 my-sm-0 tt nav-link" href="{{ route('create') }}" type="submit">SignUp</a>
                </li>
                <li class="nav-item">
                    <a class="my-2 my-sm-0 tt nav-link" href="{{ route('login') }}" type="submit">Login</a>
                </li>
            </ul>
        @endauth

    </div>
</nav>
@yield('navbar')
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
