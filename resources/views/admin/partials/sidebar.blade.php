<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link mt-3 {{ (Request::routeIs('dashboard') ? 'active' : '') }}" href="{{ route('dashboard') }}">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                <!-- Sidenav Accordion (Applications)-->
                <a class="nav-link collapsed {{ (Request::routeIs('menu.index','category.index') ? 'active' : '') }}" href="{{ route('menu.index') }}" data-bs-toggle="collapse" data-bs-target="#collapseApps" aria-expanded="true" aria-controls="collapseApps">
                    <div class="nav-link-icon"><i data-feather="coffee"></i></div>
                    Menu
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ (Request::routeIs('menu.index','category.index') ? 'show' : '') }}" id="collapseApps" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavAppsMenu">
                        <!-- Nested Sidenav Accordion (Apps -> Knowledge Base)-->
                        <a class="nav-link {{ (Request::routeIs('category.index') ? 'active' : '') }}" href="{{ route('category.index') }}">
                            Kategori Menu
                        </a>
                        <a class="nav-link {{ (Request::routeIs('menu.index') ? 'active' : '') }}" href="{{ route('menu.index') }}">
                            Daftar Menu
                        </a>
                    </nav>
                </div>
                <a class="nav-link {{ (Request::routeIs('transaction.index') ? 'active' : '') }}" href="{{ route('transaction.index') }}">
                    <div class="nav-link-icon"><i data-feather="dollar-sign"></i></div>
                    Transaksi
                </a>
                <a class="nav-link {{ (Request::routeIs('history.index', 'history.show') ? 'active' : '') }}" href="{{ route('history.index') }}">
                    <div class="nav-link-icon"><i data-feather="book"></i></div>
                    Laporan Penjualan
                </a>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-title">{{ Auth::user()->nama }}</div>
                <div class="sidenav-footer-subtitle"><b>Shift:</b> {{ Auth::user()->shift }}</div>
            </div>
        </div>
    </nav>
</div>
