<nav class="navbar navbar-expand-lg navbar-dark bg-danger bg-gradient">
    <div class="container-md">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kendali') ? 'active' : '' }}" aria-current="page" href="/kendali">Kendali</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('riwayat') ? 'active' : '' }}" aria-current="page" href="/riwayat">Riwayat</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" id="userDropdown" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="text-gray">User</span>
                    <img class="img-profile rounded-circle" src="{{ asset('img/714.jpg') }}" alt="user profile" style="height: 2em;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="/login">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
