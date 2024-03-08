<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <a class="navbar-brand" href="{{route("index")}}"><img src="{{asset("logo.png")}}" alt="" width="150px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-5 mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route("index")}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("index")}}">AboutUs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("tournament")}}">tournament</a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> --}}
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="my-2 my-sm-0 tt nav-link" href="{{route("create")}}" type="submit">SignUp</a>
            </li>
            <li class="nav-item">
                <a class="my-2 my-sm-0 tt nav-link" href="{{route("login")}}" type="submit">Login</a>
            </li>
        </ul>
    </div>
</nav>
@yield('navbar')
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
