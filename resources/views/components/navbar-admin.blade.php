<nav class="navbar navbar-expand-lg fixed-top bg-body-tertiary" style="background-color: var(--color-3)">
    <div class="container-fluid">
        <a class="navbar-brand mx-3" href="#">
            <img src="{{ asset('img/Logo.png') }}" alt="" style="width: 9rem">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="{{ request()->is('admin/dashboard') ? 'nav-link fw-bold' : 'nav-link' }}"
                        aria-current="page" href="/admin/dashboard" style="color: black; font-size: 25px">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('admin-pesanan') ? 'nav-link fw-bold' : 'nav-link' }}"
                        aria-current="page" href="/admin-pesanan" style="color: black; font-size: 25px">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('admin-tambah') ? 'nav-link fw-bold' : 'nav-link' }}" aria-current="page"
                        href="/admin-tambah" style="color: black; font-size: 25px">Tambah Pesanan</a>
                </li>
            </ul>
            <div>
                <div class="fs-5">Hello, Username</div>
                <div class="d-flex justify-content-end">
                    <a href="/">
                        <button class="tombol-logout">Keluar</button>
                    </a>
                </div>
            </div>

        </div>
    </div>
</nav>
