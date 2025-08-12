@extends('admin.layouts.app')

@section('title', 'Quản lý lịch thi')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-calendar-check me-2"></i>
            Quản lý lịch thi
        </h1>
        <p class="text-muted mb-0">Quản lý lịch thi các chứng chỉ tiếng Đức</p>
    </div>
    <div>
        <a href="{{ route('admin.exam-schedules.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>
            Thêm lịch thi mới
        </a>
    </div>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); color: white;">
                <div class="stats-number">{{ $examSchedules->count() }}</div>
                <div class="stats-label">
                    <i class="fas fa-calendar-check me-2"></i>
                    Tổng lịch thi
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); color: white;">
                <div class="stats-number">{{ $examSchedules->where('status', 'active')->count() }}</div>
                <div class="stats-label">
                    <i class="fas fa-play-circle me-2"></i>
                    Đang hoạt động
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); color: #212529;">
                <div class="stats-number">{{ $examSchedules->where('is_featured', true)->count() }}</div>
                <div class="stats-label">
                    <i class="fas fa-star me-2"></i>
                    Nổi bật
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white;">
                <div class="stats-number">{{ $examSchedules->where('status', 'completed')->count() }}</div>
                <div class="stats-label">
                    <i class="fas fa-check-circle me-2"></i>
                    Đã hoàn thành
                </div>
            </div>
        </div>
    </div>

    <!-- Exam Schedules Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>
                Danh sách lịch thi
            </h5>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sm" id="sortOrderBtn">
                    <i class="fas fa-sort me-1"></i>
                    Sắp xếp
                </button>
                <a href="{{ route('admin.exam-schedules.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>
                    Thêm mới
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            @if($examSchedules->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3">Loại thi</th>
                                <th class="py-3">Trình độ</th>
                                <th class="py-3">Kỳ thi</th>
                                <th class="py-3">Ngày thi</th>
                                <th class="py-3">Hạn đăng ký</th>
                                <th class="py-3">Lệ phí</th>
                                <th class="py-3">Trạng thái</th>
                                <th class="py-3">Nổi bật</th>
                                <th class="py-3">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="sortableTable">
                            @foreach($examSchedules as $examSchedule)
                                <tr data-id="{{ $examSchedule->id }}" class="sortable-row">
                                    <td class="py-3">
                                        <span class="badge bg-primary fs-6">{{ $examSchedule->exam_type }}</span>
                                    </td>
                                    <td class="py-3">
                                        @if($examSchedule->level)
                                            <span class="badge bg-secondary">{{ $examSchedule->level }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3">
                                        @if($examSchedule->exam_period)
                                            <span class="badge bg-info">{{ $examSchedule->exam_period }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td class="py-3">
                                        <strong>{{ $examSchedule->formatted_exam_date }}</strong><br>
                                        <small class="text-muted">
                                            {{ $examSchedule->day_of_week }}
                                            @if($examSchedule->exam_time && $examSchedule->exam_time != '')
                                                , {{ $examSchedule->time }}
                                            @endif
                                        </small>
                                    </td>
                                    <td class="py-3">
                                        @if($examSchedule->isRegistrationOpen())
                                            <span class="text-success">{{ $examSchedule->formatted_registration_deadline }}</span>
                                        @else
                                            <span class="text-danger">{{ $examSchedule->formatted_registration_deadline }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3">
                                        <strong>{{ $examSchedule->formatted_fee }}</strong>
                                    </td>
                                    <td class="py-3">
                                        @if($examSchedule->status === 'active')
                                            <span class="badge bg-success">Hoạt động</span>
                                        @elseif($examSchedule->status === 'inactive')
                                            <span class="badge bg-secondary">Không hoạt động</span>
                                        @else
                                            <span class="badge bg-info">Đã hoàn thành</span>
                                        @endif
                                    </td>
                                    <td class="py-3">
                                        <form action="{{ route('admin.exam-schedules.toggle-featured', $examSchedule) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm {{ $examSchedule->is_featured ? 'btn-warning' : 'btn-outline-warning' }}" 
                                                    title="{{ $examSchedule->is_featured ? 'Bỏ nổi bật' : 'Đánh dấu nổi bật' }}">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="py-3">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.exam-schedules.show', $examSchedule) }}" 
                                               class="btn btn-outline-primary" title="Xem chi tiết">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.exam-schedules.edit', $examSchedule) }}" 
                                               class="btn btn-outline-warning" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.exam-schedules.destroy', $examSchedule) }}" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Bạn có chắc muốn xóa lịch thi này?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Xóa">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Chưa có lịch thi nào</h5>
                    <p class="text-muted">Hãy tạo lịch thi đầu tiên để bắt đầu</p>
                    <a href="{{ route('admin.exam-schedules.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>
                        Thêm lịch thi mới
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
    .sortable-row {
        cursor: move;
    }
    .sortable-row:hover {
        background-color: rgba(0,0,0,0.05);
    }
    .sortable-row.sorting {
        opacity: 0.5;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sortableTable = document.getElementById('sortableTable');
    if (sortableTable) {
        new Sortable(sortableTable, {
            animation: 150,
            ghostClass: 'sorting',
            onEnd: function(evt) {
                const rows = Array.from(sortableTable.querySelectorAll('.sortable-row'));
                const sortOrder = rows.map((row, index) => ({
                    id: row.dataset.id,
                    sort_order: index + 1
                }));

                fetch('{{ route("admin.exam-schedules.update-sort-order") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ items: sortOrder })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hiển thị thông báo thành công
                        console.log('Cập nhật thứ tự thành công');
                    }
                })
                .catch(error => {
                    console.error('Lỗi khi cập nhật thứ tự:', error);
                });
            }
        });
    }
});
</script>
@endpush
