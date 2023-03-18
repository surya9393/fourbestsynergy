<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img src="{{ asset('storage/assets/Logo_FBS.png') }}" height="50" alt="MDB Logo" loading="lazy" />
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/presensi">Presensi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gaji">Gaji</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/">Dashboard</a>
                    </li>
                @endauth
            </ul>
        </div>

        @auth
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Presensi Kehadiran</a></li>
                        <li><a class="dropdown-item" href="#">Informasi Gaji</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="dropdown">
                    <a class="btn btn-primary" href="/login" role="button" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        Masuk
                    </a>
                </div>
            </div>
        @endauth

        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
