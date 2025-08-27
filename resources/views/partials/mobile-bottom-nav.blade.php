<!-- Mobile Bottom Navigation -->
<nav class="mobile-bottom-nav d-md-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Trang chủ</span>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <i class="fas fa-phone"></i>
                    <span>Liên hệ</span>
                </a>
            </div>
            <div class="col-4">
                <a href="#" class="nav-link" onclick="window.openMobileMenu && window.openMobileMenu()">
                    <i class="fas fa-bars"></i>
                    <span>Menu</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Removed custom mobile menu modal to use the same top navbar mobile menu -->
