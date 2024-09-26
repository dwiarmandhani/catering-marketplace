<!-- resources/views/layouts/sb-admin-sidebar.blade.php -->
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Menu</span>
        </h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.search') }}">
                    Daftar Menu
                </a>
            </li>

            <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.orders.index') }}">
                        My Orders
                    </a>
            </li>

            @if(auth()->user()->roles()->where('name', 'admin')->exists())

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        Manage Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        Manage Roles
                    </a>
                </li>
            @endif

            @if(auth()->user()->roles()->where('name', 'merchant')->exists())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('merchant.orders.index') }}">
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('merchant.profile.index') }}">
                        My Company Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('merchant.menu.index') }}">
                        Manage Menu
                    </a>
                </li>

            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="nav-link">
                    @csrf
                    <button type="submit" class="btn btn-link text-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
