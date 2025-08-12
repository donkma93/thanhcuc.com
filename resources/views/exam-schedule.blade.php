@extends('layouts.app')

@section('title', 'Lịch Thi Chứng Chỉ Tiếng Đức - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Page Header -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Lịch Thi Chứng Chỉ</h1>
                <p class="lead">
                    Lịch thi các chứng chỉ tiếng Đức quốc tế năm 2024
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Exam Schedule -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3">LỊCH THI 2024</h2>
            <p class="lead text-muted">Kế hoạch thi và đăng ký các chứng chỉ tiếng Đức</p>
        </div>
        
        <!-- Goethe Certificate -->
        @if($goetheExams->count() > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-certificate me-3"></i>
                            Goethe Certificate
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3">Trình Độ</th>
                                        <th class="py-3">Kỳ Thi</th>
                                        <th class="py-3">Ngày Thi</th>
                                        <th class="py-3">Hạn Đăng Ký</th>
                                        <th class="py-3">Lệ Phí</th>
                                        <th class="py-3">Địa Điểm</th>
                                        <th class="py-3">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($goetheExams as $exam)
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-success fs-6">Goethe {{ $exam->level }}</span>
                                            @if($exam->is_featured)
                                                <i class="fas fa-star text-warning ms-1" title="Nổi bật"></i>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($exam->exam_period)
                                                <span class="badge bg-info">{{ $exam->exam_period }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_exam_date }}</strong><br>
                                            <small class="text-muted">
                                                {{ $exam->day_of_week }}
                                                @if($exam->exam_time)
                                                    , {{ $exam->time }}
                                                @endif
                                            </small>
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <span class="text-success">{{ $exam->formatted_registration_deadline }}</span>
                                            @else
                                                <span class="text-danger">{{ $exam->formatted_registration_deadline }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_fee }}</strong>
                                        </td>
                                        <td class="py-3">
                                            {{ Str::limit($exam->location, 30) }}
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <button type="button" class="btn btn-primary btn-sm" onclick="openExamRegistrationModal({{ $exam->id }})">
                                                    <i class="fas fa-calendar-plus me-1"></i>
                                                    Đăng Ký
                                                </button>
                                            @else
                                                <span class="text-muted">Đã đóng</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- TestDaF -->
        @if($testdafExams->count() > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-secondary text-white py-3">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-university me-3"></i>
                            TestDaF (Test Deutsch als Fremdsprache)
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3">Trình Độ</th>
                                        <th class="py-3">Kỳ Thi</th>
                                        <th class="py-3">Ngày Thi</th>
                                        <th class="py-3">Hạn Đăng Ký</th>
                                        <th class="py-3">Lệ Phí</th>
                                        <th class="py-3">Địa Điểm</th>
                                        <th class="py-3">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testdafExams as $exam)
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-secondary fs-6">
                                                @if($exam->level)
                                                    TestDaF {{ $exam->level }}
                                                @else
                                                    TestDaF
                                                @endif
                                            </span>
                                            @if($exam->is_featured)
                                                <i class="fas fa-star text-warning ms-1" title="Nổi bật"></i>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($exam->exam_period)
                                                <span class="badge bg-info">{{ $exam->exam_period }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_exam_date }}</strong><br>
                                            <small class="text-muted">
                                                {{ $exam->day_of_week }}
                                                @if($exam->exam_time)
                                                    , {{ $exam->time }}
                                                @endif
                                            </small>
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <span class="text-success">{{ $exam->formatted_registration_deadline }}</span>
                                            @else
                                                <span class="text-danger">{{ $exam->formatted_registration_deadline }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_fee }}</strong>
                                        </td>
                                        <td class="py-3">
                                            {{ Str::limit($exam->location, 30) }}
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <button type="button" class="btn btn-primary btn-sm" onclick="openExamRegistrationModal({{ $exam->id }})">
                                                    <i class="fas fa-calendar-plus me-1"></i>
                                                    Đăng Ký
                                                </button>
                                            @else
                                                <span class="text-muted">Đã đóng</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Telc -->
        @if($telcExams->count() > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-info text-white py-3">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-graduation-cap me-3"></i>
                            Telc (The European Language Certificates)
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3">Trình Độ</th>
                                        <th class="py-3">Kỳ Thi</th>
                                        <th class="py-3">Ngày Thi</th>
                                        <th class="py-3">Hạn Đăng Ký</th>
                                        <th class="py-3">Lệ Phí</th>
                                        <th class="py-3">Địa Điểm</th>
                                        <th class="py-3">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($telcExams as $exam)
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-info fs-6">Telc {{ $exam->level }}</span>
                                            @if($exam->is_featured)
                                                <i class="fas fa-star text-warning ms-1" title="Nổi bật"></i>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($exam->exam_period)
                                                <span class="badge bg-info">{{ $exam->exam_period }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_exam_date }}</strong><br>
                                            <small class="text-muted">
                                                {{ $exam->day_of_week }}
                                                @if($exam->exam_time)
                                                    , {{ $exam->time }}
                                                @endif
                                            </small>
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <span class="text-success">{{ $exam->formatted_registration_deadline }}</span>
                                            @else
                                                <span class="text-danger">{{ $exam->formatted_registration_deadline }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_fee }}</strong>
                                        </td>
                                        <td class="py-3">
                                            {{ Str::limit($exam->location, 30) }}
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <button type="button" class="btn btn-primary btn-sm" onclick="openExamRegistrationModal({{ $exam->id }})">
                                                    <i class="fas fa-calendar-plus me-1"></i>
                                                    Đăng Ký
                                                </button>
                                            @else
                                                <span class="text-muted">Đã đóng</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Other Exams -->
        @if($otherExams->count() > 0)
        <div class="row mb-5">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-warning text-dark py-3">
                        <h4 class="mb-0 d-flex align-items-center">
                            <i class="fas fa-certificate me-3"></i>
                            Các Chứng Chỉ Khác
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="py-3">Loại Thi</th>
                                        <th class="py-3">Trình Độ</th>
                                        <th class="py-3">Kỳ Thi</th>
                                        <th class="py-3">Ngày Thi</th>
                                        <th class="py-3">Hạn Đăng Ký</th>
                                        <th class="py-3">Lệ Phí</th>
                                        <th class="py-3">Địa Điểm</th>
                                        <th class="py-3">Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($otherExams as $exam)
                                    <tr>
                                        <td class="py-3">
                                            <span class="badge bg-warning text-dark fs-6">{{ $exam->exam_type }}</span>
                                            @if($exam->is_featured)
                                                <i class="fas fa-star text-warning ms-1" title="Nổi bật"></i>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($exam->level)
                                                <span class="badge bg-secondary">{{ $exam->level }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            @if($exam->exam_period)
                                                <span class="badge bg-info">{{ $exam->exam_period }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_exam_date }}</strong><br>
                                            <small class="text-muted">
                                                {{ $exam->day_of_week }}
                                                @if($exam->exam_time)
                                                    , {{ $exam->time }}
                                                @endif
                                            </small>
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <span class="text-success">{{ $exam->formatted_registration_deadline }}</span>
                                            @else
                                                <span class="text-danger">{{ $exam->formatted_registration_deadline }}</span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <strong>{{ $exam->formatted_fee }}</strong>
                                        </td>
                                        <td class="py-3">
                                            {{ Str::limit($exam->location, 30) }}
                                        </td>
                                        <td class="py-3">
                                            @if($exam->isRegistrationOpen())
                                                <button type="button" class="btn btn-primary btn-sm" onclick="openExamRegistrationModal({{ $exam->id }})">
                                                    <i class="fas fa-calendar-plus me-1"></i>
                                                    Đăng Ký
                                                </button>
                                            @else
                                                <span class="text-muted">Đã đóng</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Important Notes -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm bg-light">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary mb-3">
                            <i class="fas fa-info-circle me-2"></i>Lưu Ý Quan Trọng
                        </h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Đăng ký sớm:</strong> Số lượng chỗ thi có hạn, nên đăng ký càng sớm càng tốt
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Chuẩn bị tài liệu:</strong> CMND/CCCD, ảnh 3x4, bằng cấp liên quan
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Lệ phí:</strong> Có thể thay đổi theo quy định của từng tổ chức thi
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Kết quả:</strong> Thường có sau 4-6 tuần kể từ ngày thi
                            </li>
                            <li class="mb-0">
                                <i class="fas fa-check text-success me-2"></i>
                                <strong>Hỗ trợ:</strong> Thanh Cúc hỗ trợ thủ tục đăng ký và luyện thi miễn phí
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h3 class="fw-bold mb-3">Cần hỗ trợ đăng ký thi chứng chỉ?</h3>
                <p class="mb-0">Liên hệ ngay với chúng tôi để được tư vấn và hỗ trợ thủ tục đăng ký thi!</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg me-3">Liên Hệ Ngay</a>
                <a href="tel:0975186230" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-phone me-2"></i>Hotline
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Include Exam Registration Modal -->
@include('partials.exam-registration-modal')

@endsection
