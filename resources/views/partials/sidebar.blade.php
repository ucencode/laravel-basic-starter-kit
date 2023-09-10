<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-tachometer fa-fw"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Modules</div>
                <a class="nav-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa fa-users fa-fw"></i></div>
                    Users
                </a>
            </div>
        </div>
    </nav>
</div>
