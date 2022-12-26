<ul class="menu">
    <li class="sidebar-title">Menu</li>

    <li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a href="{{ url('dashboard') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('users*') ? 'active' : '' }}">
        <a href="{{ url('users') }}" class="sidebar-link">
            <i class="bi bi-person-fill"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('daftar-pegawai*') ? 'active' : '' }}">
        <a href="{{ url('daftar-pegawai') }}" class="sidebar-link">
            <i class="bi bi-person-fill"></i>
            <span>Daftar Pegawai</span>
        </a>
    </li>

    <li class="sidebar-item {{ request()->is('data-barang*') ? 'active' : '' }}">
        <a href="{{ url('data-barang') }}" class="sidebar-link">
            <i class="bi bi-person-fill"></i>
            <span>Data Barang</span>
        </a>
    </li>
</ul>
