<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #728FCE;">
    <!-- Divider -->
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Tables -->
    <x-navLink href="/admin" :active="request()->is('admin')" icon="fas fa-fw fa-home">
        Dashboard
    </x-navLink>

    <hr class="sidebar-divider my-0">
    <x-nav-link href="{{ route('penerbangan.index') }}" :active="request()->is('admin/penerbangan*') || request()->is('edit-penerbangan*')" icon="fas fa-fw fa-address-card">
        Data Penerbangan
    </x-nav-link>
    <x-nav-link href="{{ route('tiket.index') }}" :active="request()->is('admin/tiket*')" icon="fas fa-fw fa-address-card">
        Data Tiket
    </x-nav-link>
    <x-nav-link href="{{ route('booking.index') }}" :active="request()->is('admin/booking*')" icon="fas fa-fw fa-address-card">
        Data Booking
    </x-nav-link>
    <x-nav-link href="{{ route('historyTransaksi') }}" :active="request()->is('admin/history*')" icon="fas fa-fw fa-address-card">
        History
    </x-nav-link>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>