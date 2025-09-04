<!-- Mobile Bottom Navigation -->
<nav class="mobile-bottom-nav d-md-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>{{ __('general.home') }}</span>
                </a>
            </div>
            <div class="col-4">
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <i class="fas fa-phone"></i>
                    <span>{{ __('general.contact') }}</span>
                </a>
            </div>
            <div class="col-4">
                <a href="#" class="nav-link" onclick="window.openMobileMenu && window.openMobileMenu()">
                    <i class="fas fa-bars"></i>
                    <span>{{ __('general.menu') }}</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Removed custom mobile menu modal to use the same top navbar mobile menu -->
