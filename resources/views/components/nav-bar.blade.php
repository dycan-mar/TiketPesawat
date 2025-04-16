<!-- Navbar -->
<nav class="navbar navbar-expand navbar-light topbar static-top shadow" style="background: linear-gradient(45deg, #1e1075, #0a3090);">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav w-100 px-5 justify-content-evenly">
        <!-- Navbar Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-light @if ($title=='home')
                    active
                    @endif" href="{{ route('dashboard') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light @if ($title=='search')
                    active
                    @endif" href="{{ route('search') }}">Search</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light @if ($title=='tiket')
                    active
                    @endif" href="{{ route('tiket') }}">Tiket Saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light @if ($title=='booking')
                    active
                    @endif" href="{{  route('mybooking')}}">Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light @if ($title=='history')
                    active
                    @endif" href="{{ route('history') }}">History</a>
                </li>
            </ul>
        </div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-gray-600 small"></span>
                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" width="37" height="37">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Apakah yakin ingin logout?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin logout dari aplikasi absensi buatan kelompok 8?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>