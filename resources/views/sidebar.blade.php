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
</ul>
