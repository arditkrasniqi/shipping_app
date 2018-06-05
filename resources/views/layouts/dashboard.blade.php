@include('inc.header')
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">GI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @if(Auth::user()->role->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('new-user')}}">New User</a>
                </li>
            @endif
            @if(Auth::user()->role->role === 'packager')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('new-package')}}">New Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('packages')}}">Packages</a>
                </li>
            @endif
            @if(Auth::user()->role->role === 'user')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('track-package')}}">Track Package</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid">
    @yield('content')
</div>
@include('inc.footer')