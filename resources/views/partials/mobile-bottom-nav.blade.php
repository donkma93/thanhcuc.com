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
                <a href="#" class="nav-link" onclick="openSettings()">
                    <i class="fas fa-cog"></i>
                    <span>Cài đặt</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">
                    <i class="fas fa-cog me-2"></i>Cài đặt
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="list-group list-group-flush">
                    <a href="{{ route('contact') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-phone me-3 text-primary"></i>
                        <div>
                            <h6 class="mb-1">Liên hệ tư vấn</h6>
                            <small class="text-muted">Gọi điện hoặc chat với chúng tôi</small>
                        </div>
                    </a>
                    <a href="tel:0975.186.230" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-phone-alt me-3 text-success"></i>
                        <div>
                            <h6 class="mb-1">Gọi ngay</h6>
                            <small class="text-muted">0975.186.230</small>
                        </div>
                    </a>
                    <a href="https://zalo.me/0975186230" target="_blank" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fab fa-facebook-messenger me-3 text-primary"></i>
                        <div>
                            <h6 class="mb-1">Chat Zalo</h6>
                            <small class="text-muted">Nhắn tin tư vấn miễn phí</small>
                        </div>
                    </a>
                    <a href="{{ route('trial') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-graduation-cap me-3 text-warning"></i>
                        <div>
                            <h6 class="mb-1">Đăng ký học thử</h6>
                            <small class="text-muted">Trải nghiệm miễn phí</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openSettings() {
    const modal = new bootstrap.Modal(document.getElementById('settingsModal'));
    modal.show();
}
</script>
@endpush
