<nav class="navbar navbar-expand-md navbar-dark bg-danger bg-gradient">
    <div class="container-md">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kendali') ? 'active' : '' }}" aria-current="page"
                        href="/kendali">Kendali</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('riwayat') ? 'active' : '' }}" aria-current="page"
                        href="/riwayat">Riwayat</a>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <button type="button" id="userDropdown" class="w-100 btn border-0 btn-hover" data-bs-toggle="dropdown"
                data-bs-display="static" aria-expanded="false">
                    <span class="text-bright">{{ Auth::user()->username }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('img/714.jpg') }}" alt="user profile" style="height: 2em;">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item btn btn-light">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
