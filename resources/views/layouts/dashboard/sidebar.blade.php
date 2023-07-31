<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ isset($activeMenu) && $activeMenu == 'dashboard' ? 'active' : '' }}" href="{{ url('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($activeMenu) && $activeMenu == 'order' ? 'active' : '' }}" href="{{ url('orders') }}">
                    <span data-feather="shopping-cart"></span>
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($activeMenu) && $activeMenu == 'product' ? 'active' : '' }}" href="{{ url('products') }}">
                    <span data-feather="package"></span>
                    Products
                </a>
            </li>
        </ul>

    </div>
</nav>