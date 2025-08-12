@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-tachometer-alt me-2"></i>
            Dashboard
        </h1>
        <p class="text-muted mb-0">Tổng quan hệ thống quản trị</p>
    </div>
    <div>
        <span class="badge bg-success">
            <i class="fas fa-circle me-1"></i>
            Online
        </span>
    </div>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card">
                <div class="stats-number">{{ $stats['total_contacts'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-envelope me-1"></i>
                    Tổng liên hệ
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #3EB850 0%, #2ea043 100%); color: white;">
                <div class="stats-number">{{ $stats['new_contacts'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-bell me-1"></i>
                    Liên hệ mới
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #F57F25 0%, #e56b1a 100%); color: white;">
                <div class="stats-number">{{ $stats['contacted'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-phone me-1"></i>
                    Đã liên hệ
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #CADD2D 0%, #b5c428 100%); color: #015862;">
                <div class="stats-number">{{ $stats['completed'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-check-circle me-1"></i>
                    Hoàn thành
                </div>
            </div>
        </div>
    </div>

    <!-- Exam Schedule Stats -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%); color: white;">
                <div class="stats-number">{{ $stats['total_exam_schedules'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-calendar-check me-2"></i>
                    Tổng lịch thi
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); color: white;">
                <div class="stats-number">{{ $stats['active_exam_schedules'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-play-circle me-2"></i>
                    Lịch thi hoạt động
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%); color: #212529;">
                <div class="stats-number">{{ $stats['featured_exam_schedules'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-star me-2"></i>
                    Lịch thi nổi bật
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%); color: white;">
                <div class="stats-number">{{ $stats['total_admins'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-users-cog me-2"></i>
                    Quản trị viên
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white;">
                <div class="stats-number">{{ $stats['total_exam_registrations'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-user-plus me-2"></i>
                    Tổng đăng ký lịch thi
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stats-card" style="background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%); color: #212529;">
                <div class="stats-number">{{ $stats['pending_exam_registrations'] }}</div>
                <div class="stats-label">
                    <i class="fas fa-clock me-2"></i>
                    Chờ xác nhận
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Chart -->
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-line me-2"></i>
                        Thống kê liên hệ 6 tháng gần nhất
                    </h5>
                </div>
                <div class="card-body">
                    <canvas id="contactsChart" height="100"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt me-2"></i>
                        Thao tác nhanh
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">
                            <i class="fas fa-envelope me-2"></i>
                            Xem tất cả liên hệ
                        </a>
                        <a href="{{ route('admin.contacts.index', ['status' => 'new']) }}" class="btn btn-success">
                            <i class="fas fa-bell me-2"></i>
                            Liên hệ mới ({{ $stats['new_contacts'] }})
                        </a>
                        <a href="{{ route('admin.contacts.export') }}" class="btn btn-info">
                            <i class="fas fa-download me-2"></i>
                            Xuất báo cáo CSV
                        </a>
                        <a href="{{ route('admin.profile') }}" class="btn btn-secondary">
                            <i class="fas fa-user-cog me-2"></i>
                            Cài đặt tài khoản
                        </a>
                        <a href="{{ route('admin.exam-schedules.index') }}" class="btn btn-warning">
                            <i class="fas fa-calendar-check me-2"></i>
                            Quản lý lịch thi
                        </a>
                        <a href="{{ route('admin.exam-schedules.create') }}" class="btn btn-info">
                            <i class="fas fa-plus me-2"></i>
                            Thêm lịch thi mới
                        </a>
                        <a href="{{ route('admin.exam-registrations.index') }}" class="btn btn-success">
                            <i class="fas fa-user-plus me-2"></i>
                            Quản lý đăng ký lịch thi
                        </a>
                        <a href="{{ route('admin.exam-registrations.index', ['status' => 'pending']) }}" class="btn btn-warning">
                            <i class="fas fa-clock me-2"></i>
                            Đăng ký chờ xác nhận ({{ $stats['pending_exam_registrations'] }})
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Contacts -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-clock me-2"></i>
                        Liên hệ gần đây
                    </h5>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">
                        Xem tất cả
                    </a>
                </div>
                <div class="card-body">
                    @if($recentContacts->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Họ tên</th>
                                        <th>Điện thoại</th>
                                        <th>Email</th>
                                        <th>Chương trình</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentContacts as $contact)
                                        <tr>
                                            <td>
                                                <strong>{{ $contact->name }}</strong>
                                            </td>
                                            <td>
                                                <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                                    <i class="fas fa-phone me-1"></i>
                                                    {{ $contact->phone }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($contact->email)
                                                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                                        {{ $contact->email }}
                                                    </a>
                                                @else
                                                    <span class="text-muted">Chưa có</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge bg-light text-dark">
                                                    {{ $contact->program }}
                                                </span>
                                            </td>
                                            <td>
                                                {!! $contact->status_badge !!}
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $contact->created_at->diffForHumans() }}
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('admin.contacts.show', $contact) }}" 
                                                       class="btn btn-outline-primary btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if($contact->status === 'new')
                                                        <form action="{{ route('admin.contacts.update-status', $contact) }}" 
                                                              method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="contacted">
                                                            <button type="submit" class="btn btn-outline-success btn-sm" 
                                                                    title="Đánh dấu đã liên hệ">
                                                                <i class="fas fa-phone"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Chưa có liên hệ nào</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Chart configuration
    const ctx = document.getElementById('contactsChart').getContext('2d');
    const chartData = @json($monthlyStats);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.map(item => item.month),
            datasets: [{
                label: 'Số lượng liên hệ',
                data: chartData.map(item => item.contacts),
                borderColor: '#F9D200',
                backgroundColor: 'rgba(249, 210, 0, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#F57F25',
                pointBorderColor: '#F57F25',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                }
            },
            elements: {
                point: {
                    hoverBackgroundColor: '#F57F25'
                }
            }
        }
    });
</script>
@endpush