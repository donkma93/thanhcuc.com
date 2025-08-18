@extends('layouts.app')

@section('title', 'Lịch Khai Giảng - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')

<!-- Page Header -->
<section class="py-5 bg-primary text-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto text-center">
				<h1 class="display-4 fw-bold mb-3">LỊCH KHAI GIẢNG</h1>
				<p class="lead">Lịch khai giảng các khóa học tiếng Đức tại Trung Tâm Thanh Cúc</p>
			</div>
		</div>
	</div>
</section>


<!-- Schedule Table Section -->
<section id="schedule-table" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">
                <i class="fas fa-table me-2"></i>LỊCH KHAI GIẢNG CHI TIẾT
            </h2>
            <p class="lead text-muted">
                Thông tin đầy đủ về các khóa học tiếng Đức tại Trung Tâm Thanh Cúc
            </p>
            

        </div>

        <!-- Filters -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-primary small mb-1">
                            <i class="fas fa-search me-1"></i>Tìm kiếm
                        </label>
                        <input type="text" class="form-control" id="searchInput" placeholder="Tên khóa học...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-primary small mb-1">
                            <i class="fas fa-layer-group me-1"></i>Trình độ
                        </label>
                        <select class="form-select" id="levelFilter">
                            <option value="">Tất cả trình độ</option>
                            <option value="a1-a2">Cơ bản (A1-A2)</option>
                            <option value="b1-b2">Trung cấp (B1-B2)</option>
                            <option value="c1-c2">Nâng cao (C1-C2)</option>
                            <option value="business">Thương mại</option>
                            <option value="exam">Luyện thi</option>
                            <option value="online">Online</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-primary small mb-1">
                            <i class="fas fa-clock me-1"></i>Thời gian
                        </label>
                        <select class="form-select" id="timeFilter">
                            <option value="">Tất cả thời gian</option>
                            <option value="morning">Buổi sáng (6:00-12:00)</option>
                            <option value="afternoon">Buổi chiều (12:00-18:00)</option>
                            <option value="evening">Buổi tối (18:00-22:00)</option>
                            <option value="weekend">Cuối tuần</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold text-primary small mb-1">
                            <i class="fas fa-sort me-1"></i>Sắp xếp
                        </label>
                        <select class="form-select" id="sortFilter">
                            <option value="start_date">Ngày khai giảng</option>
                            <option value="level">Trình độ</option>
                            <option value="price">Học phí</option>
                            <option value="duration">Thời lượng</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-calendar-check me-2"></i>Danh Sách Khóa Học
                        </h5>
                    </div>
                    <div class="col-auto">
                        <span class="badge bg-light text-primary fs-6">
                            {{ $schedules->count() }} khóa học
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="scheduleTable">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-book me-2"></i>Khóa Học
                                </th>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-calendar me-2"></i>Khai Giảng
                                </th>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-clock me-2"></i>Lịch Học
                                </th>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-users me-2"></i>Sĩ Số
                                </th>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-dollar-sign me-2"></i>Học Phí
                                </th>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-info-circle me-2"></i>Trạng Thái
                                </th>
                                <th class="border-0 px-4 py-3">
                                    <i class="fas fa-cogs me-2"></i>Thao Tác
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($schedules as $schedule)
                            <tr class="schedule-row" 
                                data-level="{{ $schedule->level }}" 
                                data-time="{{ $schedule->start_time >= '18:00' ? 'evening' : ($schedule->start_time >= '12:00' ? 'afternoon' : 'morning') }}" 
                                data-price="{{ $schedule->price }}"
                                data-title="{{ strtolower($schedule->title) }}">
                                
                                <!-- Course Info -->
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="course-icon me-3">
                                            @php
                                                $icon = match($schedule->level) {
                                                    'a1-a2' => 'fas fa-book text-primary',
                                                    'b1-b2' => 'fas fa-book-open text-success', 
                                                    'c1-c2' => 'fas fa-graduation-cap text-warning',
                                                    'business' => 'fas fa-briefcase text-info',
                                                    'exam' => 'fas fa-certificate text-secondary',
                                                    'online' => 'fas fa-laptop text-dark',
                                                    default => 'fas fa-book text-primary'
                                                };
                                            @endphp
                                            <i class="{{ $icon }} fs-4"></i>
                                        </div>
                                        <div class="course-details">
                                            <h6 class="fw-bold mb-1 text-primary">{{ $schedule->title }}</h6>
                                            <div class="d-flex flex-wrap gap-1 mb-1">
                                                <span class="badge bg-{{ $schedule->level === 'a1-a2' ? 'primary' : ($schedule->level === 'b1-b2' ? 'success' : ($schedule->level === 'c1-c2' ? 'warning' : ($schedule->level === 'business' ? 'info' : ($schedule->level === 'exam' ? 'secondary' : 'dark')))) }} text-white small">
                                                    {{ $schedule->level_name }}
                                                </span>
                                                @if($schedule->is_featured)
                                                    <span class="badge bg-warning text-dark small">
                                                        <i class="fas fa-star me-1"></i>Nổi bật
                                                    </span>
                                                @endif
                                                @if($schedule->is_popular)
                                                    <span class="badge bg-info text-white small">
                                                        <i class="fas fa-fire me-1"></i>Phổ biến
                                                    </span>
                                                @endif
                                            </div>
                                            @if($schedule->description)
                                                <small class="text-muted">{{ Str::limit($schedule->description, 60) }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Start Date -->
                                <td class="px-4 py-3">
                                    <div class="text-center">
                                        <div class="fw-bold text-primary">{{ $schedule->start_date->format('d/m/Y') }}</div>
                                        <small class="text-muted">{{ $schedule->start_date->diffForHumans() }}</small>
                                        @if($schedule->end_date)
                                            <br><small class="text-muted">Kết thúc: {{ $schedule->end_date->format('d/m/Y') }}</small>
                                        @endif
                                    </div>
                                </td>

                                <!-- Schedule -->
                                <td class="px-4 py-3">
                                    <div class="text-center">
                                        <div class="fw-bold">{{ $schedule->start_time }}-{{ $schedule->end_time }}</div>
                                        <small class="text-muted">{{ Str::limit($schedule->formatted_schedule_days, 20) }}</small>
                                        <br><small class="text-muted">{{ $schedule->duration_months }} tháng</small>
                                    </div>
                                </td>

                                <!-- Students -->
                                <td class="px-4 py-3">
                                    <div class="text-center">
                                        <div class="fw-bold">{{ $schedule->current_students }}/{{ $schedule->max_students }}</div>
                                        <div class="progress mt-1" style="height: 6px;">
                                            <div class="progress-bar {{ $schedule->available_spots <= 2 ? 'bg-danger' : ($schedule->available_spots <= 5 ? 'bg-warning' : 'bg-success') }}" 
                                                 style="width: {{ ($schedule->current_students / $schedule->max_students) * 100 }}%"></div>
                                        </div>
                                        <small class="text-muted">
                                            @if($schedule->available_spots <= 2)
                                                <span class="text-danger">Sắp hết chỗ</span>
                                            @elseif($schedule->available_spots <= 5)
                                                <span class="text-warning">Còn ít chỗ</span>
                                            @else
                                                <span class="text-success">Còn chỗ</span>
                                            @endif
                                        </small>
                                    </div>
                                </td>

                                <!-- Price -->
                                <td class="px-4 py-3">
                                    <div class="text-center">
                                        @if($schedule->discount_percentage > 0)
                                            <div class="text-decoration-line-through text-muted small">
                                                {{ number_format($schedule->original_price) }} VNĐ
                                            </div>
                                        @endif
                                        <div class="fw-bold text-success fs-6">
                                            {{ number_format($schedule->price) }} VNĐ
                                        </div>
                                        @if($schedule->discount_percentage > 0)
                                            <span class="badge bg-danger text-white small">
                                                -{{ $schedule->discount_percentage }}%
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Status -->
                                <td class="px-4 py-3">
                                    <div class="text-center">
                                        @php
                                            $statusClass = match($schedule->status) {
                                                'published' => 'bg-success',
                                                'draft' => 'bg-secondary',
                                                'full' => 'bg-warning',
                                                'cancelled' => 'bg-danger',
                                                'completed' => 'bg-info',
                                                default => 'bg-secondary'
                                            };
                                            
                                            $statusText = match($schedule->status) {
                                                'published' => 'Đang tuyển sinh',
                                                'draft' => 'Bản nháp',
                                                'full' => 'Đã đầy',
                                                'cancelled' => 'Đã hủy',
                                                'completed' => 'Đã hoàn thành',
                                                default => 'Không xác định'
                                            };
                                        @endphp
                                        <span class="badge {{ $statusClass }} text-white">
                                            {{ $statusText }}
                                        </span>
                                        @if($schedule->registration_deadline)
                                            <br><small class="text-muted">
                                                Hạn đăng ký: {{ $schedule->registration_deadline->format('d/m/Y') }}
                                            </small>
                                        @endif
                                    </div>
                                </td>

                                <!-- Actions -->
                                <td class="px-4 py-3">
                                    <div class="d-flex flex-column gap-2">
                                        <button class="btn btn-sm btn-outline-primary" 
                                                onclick="showCourseDetails({{ $schedule->id }})"
                                                title="Xem chi tiết">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @if($schedule->status === 'published' && $schedule->available_spots > 0)
                                            <a href="{{ route('contact') }}?course={{ $schedule->id }}" 
                                               class="btn btn-sm btn-success"
                                               title="Đăng ký ngay">
                                                <i class="fas fa-user-plus"></i>
                                            </a>
                                        @endif
                                        <a href="tel:0975186230" 
                                           class="btn btn-sm btn-outline-info"
                                           title="Tư vấn">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="fas fa-inbox fa-3x mb-3"></i>
                                        <h5>Chưa có khóa học nào</h5>
                                        <p>Vui lòng quay lại sau hoặc liên hệ với chúng tôi để được tư vấn</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Course Details Modal -->
        <div class="modal fade" id="courseDetailsModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">
                            <i class="fas fa-info-circle me-2"></i>Chi Tiết Khóa Học
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="courseDetailsContent">
                        <!-- Content will be loaded here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <a href="{{ route('contact') }}" class="btn btn-primary">
                            <i class="fas fa-calendar-plus me-2"></i>Đăng Ký Ngay
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h3 class="fw-bold mb-3">BẠN CÓ CÂU HỎI VỀ KHÓA HỌC?</h3>
        <p class="lead mb-4">Hãy liên hệ với chúng tôi để được tư vấn miễn phí và chọn khóa học phù hợp nhất</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('contact') }}" class="btn btn-warning btn-lg px-4 py-3">
                <i class="fas fa-envelope me-2"></i>Liên Hệ Tư Vấn
            </a>
            <a href="tel:{{ str_replace('.', '', $contactPhone) }}" class="btn btn-light btn-lg px-4 py-3">
                <i class="fas fa-phone me-2"></i>Gọi Ngay: {{ $contactPhone }}
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Search and Filter Functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const levelFilter = document.getElementById('levelFilter');
    const timeFilter = document.getElementById('timeFilter');
    const sortFilter = document.getElementById('sortFilter');
    const scheduleTable = document.getElementById('scheduleTable');
    const rows = scheduleTable.querySelectorAll('.schedule-row');

    function filterRows() {
        const searchTerm = searchInput.value.toLowerCase();
        const levelValue = levelFilter.value;
        const timeValue = timeFilter.value;

        rows.forEach(row => {
            const title = row.dataset.title;
            const level = row.dataset.level;
            const time = row.dataset.time;

            const matchesSearch = !searchTerm || title.includes(searchTerm);
            const matchesLevel = !levelValue || level === levelValue;
            const matchesTime = !timeValue || time === timeValue;

            if (matchesSearch && matchesLevel && matchesTime) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });

        updateRowCount();
    }

    function updateRowCount() {
        const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
        const countBadge = document.querySelector('.badge.bg-light.text-primary');
        if (countBadge) {
            countBadge.textContent = `${visibleRows.length} khóa học`;
        }
    }

    function sortRows() {
        const sortBy = sortFilter.value;
        const tbody = scheduleTable.querySelector('tbody');
        const rowsArray = Array.from(rows);

        rowsArray.sort((a, b) => {
            let aValue, bValue;

            switch (sortBy) {
                case 'start_date':
                    aValue = new Date(a.querySelector('td:nth-child(2) .fw-bold').textContent.split('/').reverse().join('-'));
                    bValue = new Date(b.querySelector('td:nth-child(2) .fw-bold').textContent.split('/').reverse().join('-'));
                    return aValue - bValue;
                case 'level':
                    aValue = a.dataset.level;
                    bValue = b.dataset.level;
                    return aValue.localeCompare(bValue);
                case 'price':
                    aValue = parseInt(a.dataset.price);
                    bValue = parseInt(b.dataset.price);
                    return aValue - bValue;
                case 'duration':
                    aValue = parseInt(a.querySelector('td:nth-child(3) small:last-child').textContent);
                    bValue = parseInt(b.querySelector('td:nth-child(3) small:last-child').textContent);
                    return aValue - bValue;
                default:
                    return 0;
            }
        });

        rowsArray.forEach(row => tbody.appendChild(row));
    }

    // Event listeners
    searchInput.addEventListener('input', filterRows);
    levelFilter.addEventListener('change', filterRows);
    timeFilter.addEventListener('change', filterRows);
    sortFilter.addEventListener('change', sortRows);

    // Initialize
    updateRowCount();
});

// Course Details Modal
function showCourseDetails(courseId) {
    // This would typically make an AJAX call to get course details
    // For now, we'll show a simple message
    const modal = new bootstrap.Modal(document.getElementById('courseDetailsModal'));
    const content = document.getElementById('courseDetailsContent');
    
    content.innerHTML = `
        <div class="text-center py-4">
            <i class="fas fa-spinner fa-spin fa-2x text-primary mb-3"></i>
            <p>Đang tải thông tin khóa học...</p>
        </div>
    `;
    
    modal.show();
    
    // Simulate loading course details
    setTimeout(() => {
        content.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary">Thông tin khóa học</h6>
                    <p>Chi tiết khóa học sẽ được hiển thị ở đây...</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold text-primary">Thông tin giảng viên</h6>
                    <p>Thông tin về giảng viên sẽ được hiển thị ở đây...</p>
                </div>
            </div>
        `;
    }, 1000);
}
</script>
@endpush

@push('styles')
<style>
/* Hero Section */
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.hero-bg-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.3;
}

/* Stats */
.stat-item {
    padding: 1rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

/* Table Styles */
.table {
    margin-bottom: 0;
}

.table th {
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #dee2e6;
}

.table td {
    vertical-align: middle;
    border-bottom: 1px solid #f8f9fa;
}

.schedule-row:hover {
    background-color: #f8f9fa;
    transform: translateY(-1px);
    transition: all 0.2s ease;
}

/* Course Icon */
.course-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 123, 255, 0.1);
    border-radius: 10px;
}

/* Progress Bar */
.progress {
    border-radius: 10px;
    background-color: #e9ecef;
}

.progress-bar {
    border-radius: 10px;
}

/* Badges */
.badge {
    font-size: 0.75rem;
    padding: 0.5em 0.75em;
}

/* Buttons */
.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

/* Modal */
.modal-header {
    border-bottom: none;
}

.modal-footer {
    border-top: none;
}

/* Responsive */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .course-details h6 {
        font-size: 0.875rem;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
}

/* Animation */
.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

.animate-delay-1 {
    animation-delay: 0.2s;
}

.animate-delay-2 {
    animation-delay: 0.4s;
}

.animate-delay-3 {
    animation-delay: 0.6s;
}

.animate-delay-4 {
    animation-delay: 0.8s;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Hover Effects */
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

/* Custom Scrollbar */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}
</style>
@endpush