@extends('admin.layouts.app')

@section('title', 'Quản lý Du Học Đức')

@section('header')
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h1 class="h3 mb-0">
                <i class="fas fa-graduation-cap me-2 text-primary"></i>
                Quản lý Du Học Đức
            </h1>
            <p class="text-muted mb-0">Chỉnh sửa toàn bộ thông tin trang Du Học Đức &amp; Chuyên đề Điều Dưỡng (Bài duy nhất)</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('du-hoc-duc') }}" target="_blank" class="btn btn-outline-primary">
                <i class="fas fa-external-link-alt me-1"></i> Xem trang ngoài
            </a>
            <button type="button" class="btn btn-warning" onclick="confirmReset()">
                <i class="fas fa-undo me-1"></i> Khôi phục mặc định
            </button>
        </div>
    </div>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2 fs-5 align-middle"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2 fs-5 align-middle"></i>
            <strong>Có lỗi xảy ra:</strong>
            <ul class="mb-0 mt-1">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.du-hoc-duc.update') }}" method="POST" enctype="multipart/form-data" id="duHocDucForm">
        @csrf
        @method('PUT')

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs nav-fill mb-4 bg-white p-2 rounded shadow-sm border" id="duHocTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold py-3" id="tab-general-btn" data-bs-toggle="tab" data-bs-target="#tab-general" type="button" role="tab">
                    <i class="fas fa-sliders-h me-2 text-primary"></i>1. Chung &amp; Banner
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3" id="tab-about-btn" data-bs-toggle="tab" data-bs-target="#tab-about" type="button" role="tab">
                    <i class="fas fa-info-circle me-2 text-info"></i>2. Giới thiệu
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3" id="tab-values-btn" data-bs-toggle="tab" data-bs-target="#tab-values" type="button" role="tab">
                    <i class="fas fa-star me-2 text-warning"></i>3. Giá trị (Thêm/Xóa)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3" id="tab-conditions-btn" data-bs-toggle="tab" data-bs-target="#tab-conditions" type="button" role="tab">
                    <i class="fas fa-tasks me-2 text-success"></i>4. Điều kiện (Thêm/Xóa)
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3" id="tab-nursing-btn" data-bs-toggle="tab" data-bs-target="#tab-nursing" type="button" role="tab">
                    <i class="fas fa-user-nurse me-2 text-danger"></i>5. Chuyên đề Điều Dưỡng
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold py-3" id="tab-blog-btn" data-bs-toggle="tab" data-bs-target="#tab-blog" type="button" role="tab">
                    <i class="fas fa-newspaper me-2 text-secondary"></i>6. Bài viết kiến thức
                </button>
            </li>
        </ul>

        <!-- Tab Contents -->
        <div class="tab-content" id="duHocTabContent">
            <!-- TAB 1: GENERAL & BANNERS -->
            <div class="tab-pane fade show active" id="tab-general" role="tabpanel">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-primary"><i class="fas fa-tags me-2"></i>Cài đặt SEO &amp; Banner đầu trang</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tiêu đề Meta (SEO Title)</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $settings['meta_title']) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tiêu đề hiển thị (Page Title)</label>
                                <input type="text" name="page_title" class="form-control" value="{{ old('page_title', $settings['page_title']) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Mô tả Meta (SEO Description)</label>
                                <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $settings['meta_description']) }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row g-4">
                            <!-- Banner 1 -->
                            <div class="col-lg-6">
                                <div class="border rounded p-3 bg-light h-100">
                                    <h6 class="fw-bold mb-2 text-dark"><i class="fas fa-image me-2 text-primary"></i>Banner Chính (Đầu trang)</h6>
                                    <p class="text-muted small mb-3">Hiển thị ở đầu trang Du Học Đức</p>
                                    <div class="mb-3 text-center bg-white p-2 rounded border">
                                        <img src="{{ asset($settings['banner_image']) }}?v={{ time() }}" id="banner_image_preview" alt="Banner chính" class="img-fluid rounded" style="max-height: 180px;">
                                    </div>
                                    <label class="form-label fw-bold small">Thay đổi ảnh banner:</label>
                                    <input type="file" name="banner_image" class="form-control" accept="image/*" onchange="previewFile(this, 'banner_image_preview')">
                                    <small class="text-muted">Định dạng JPG, PNG, WEBP. Kích thước khuyến nghị: 1920x600 px</small>
                                </div>
                            </div>

                            <!-- Roadmap Banner -->
                            <div class="col-lg-6">
                                <div class="border rounded p-3 bg-light h-100">
                                    <h6 class="fw-bold mb-2 text-dark"><i class="fas fa-map-signs me-2 text-success"></i>Banner Lộ Trình Du Học Nghề Đức</h6>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small">Tiêu đề lộ trình:</label>
                                        <input type="text" name="roadmap_title" class="form-control form-control-sm" value="{{ old('roadmap_title', $settings['roadmap_title']) }}">
                                    </div>
                                    <div class="mb-3 text-center bg-white p-2 rounded border">
                                        <img src="{{ asset($settings['roadmap_image']) }}?v={{ time() }}" id="roadmap_image_preview" alt="Lộ trình" class="img-fluid rounded" style="max-height: 140px;">
                                    </div>
                                    <label class="form-label fw-bold small">Thay đổi ảnh lộ trình:</label>
                                    <input type="file" name="roadmap_image" class="form-control" accept="image/*" onchange="previewFile(this, 'roadmap_image_preview')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: ABOUT SECTION -->
            <div class="tab-pane fade" id="tab-about" role="tabpanel">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-info"><i class="fas fa-info-circle me-2"></i>Mục Giới Thiệu Du Học Nghề</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tiêu đề mục giới thiệu</label>
                                    <input type="text" name="about_title" class="form-control" value="{{ old('about_title', $settings['about_title']) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nội dung giới thiệu (Đoạn 1)</label>
                                    <textarea name="about_content_1" class="form-control" rows="4">{{ old('about_content_1', $settings['about_content_1']) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nội dung giới thiệu (Đoạn 2)</label>
                                    <textarea name="about_content_2" class="form-control" rows="4">{{ old('about_content_2', $settings['about_content_2']) }}</textarea>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Chữ trên nút bấm (CTA Button)</label>
                                        <input type="text" name="about_btn_text" class="form-control" value="{{ old('about_btn_text', $settings['about_btn_text']) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small">Liên kết nút bấm</label>
                                        <input type="text" name="about_btn_link" class="form-control" value="{{ old('about_btn_link', $settings['about_btn_link']) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="border rounded p-3 bg-light text-center h-100">
                                    <h6 class="fw-bold mb-3 text-dark text-start"><i class="fas fa-image me-2 text-info"></i>Ảnh Giới Thiệu</h6>
                                    <div class="mb-3 bg-white p-2 rounded border">
                                        <img src="{{ asset($settings['about_image']) }}?v={{ time() }}" id="about_image_preview" alt="Ảnh giới thiệu" class="img-fluid rounded" style="max-height: 240px;">
                                    </div>
                                    <label class="form-label fw-bold small text-start w-100">Thay đổi ảnh giới thiệu:</label>
                                    <input type="file" name="about_image" class="form-control" accept="image/*" onchange="previewFile(this, 'about_image_preview')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 3: VALUES (THÊM / SỬA / XÓA) -->
            <div class="tab-pane fade" id="tab-values" role="tabpanel">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-warning"><i class="fas fa-star me-2"></i>Giá Trị Của Chương Trình</h5>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addValueItem()">
                            <i class="fas fa-plus me-1"></i> Thêm giá trị mới
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tiêu đề phần giá trị</label>
                            <input type="text" name="values_title" class="form-control" value="{{ old('values_title', $settings['values_title']) }}">
                        </div>

                        <label class="form-label fw-bold mb-2">Danh sách các giá trị nổi bật (Kèm icon check):</label>
                        <div id="values-list-container">
                            @foreach(($settings['values_items'] ?? []) as $index => $item)
                                @continue(!is_scalar($item))
                                <div class="input-group mb-2 value-item-row">
                                    <span class="input-group-text bg-warning text-dark fw-bold">{{ $index + 1 }}</span>
                                    <input type="text" name="values_items[]" class="form-control" value="{{ $item }}" required>
                                    <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)" title="Xóa mục này">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <small class="text-muted"><i class="fas fa-info-circle me-1"></i> Bạn có thể bấm "Thêm giá trị mới" để bổ sung, hoặc bấm nút thùng rác màu đỏ để xóa bớt mục.</small>
                    </div>
                </div>
            </div>

            <!-- TAB 4: CONDITIONS (THÊM / SỬA / XÓA) -->
            <div class="tab-pane fade" id="tab-conditions" role="tabpanel">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-success"><i class="fas fa-tasks me-2"></i>Điều Kiện Khi Đi Du Học Nghề</h5>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addConditionItem()">
                            <i class="fas fa-plus me-1"></i> Thêm điều kiện mới
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tiêu đề phần điều kiện</label>
                            <input type="text" name="conditions_title" class="form-control" value="{{ old('conditions_title', $settings['conditions_title']) }}">
                        </div>

                        <label class="form-label fw-bold mb-2">Danh sách điều kiện tham gia (Đánh số tròn 1, 2, 3...):</label>
                        <div id="conditions-list-container">
                            @foreach(($settings['conditions_items'] ?? []) as $index => $item)
                                @continue(!is_scalar($item))
                                <div class="input-group mb-2 condition-item-row">
                                    <span class="input-group-text bg-success text-white fw-bold">{{ $index + 1 }}</span>
                                    <input type="text" name="conditions_items[]" class="form-control" value="{{ $item }}" required>
                                    <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)" title="Xóa mục này">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <small class="text-muted"><i class="fas fa-info-circle me-1"></i> Bấm "Thêm điều kiện mới" để bổ sung điều kiện, hoặc bấm nút xóa để bỏ bớt điều kiện.</small>
                    </div>
                </div>
            </div>

            <!-- TAB 5: NURSING PROGRAM DETAILS (CHUYÊN ĐỀ ĐIỀU DƯỠNG) -->
            <div class="tab-pane fade" id="tab-nursing" role="tabpanel">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold text-danger"><i class="fas fa-user-nurse me-2"></i>Nội Dung Chuyên Đề: Du Học Nghề Điều Dưỡng Đức</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4 mb-4">
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tiêu đề bài viết chuyên đề</label>
                                    <input type="text" name="nursing_title" class="form-control" value="{{ old('nursing_title', $settings['nursing_title']) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Mô tả tóm tắt đầu bài</label>
                                    <textarea name="nursing_subtitle" class="form-control" rows="3">{{ old('nursing_subtitle', $settings['nursing_subtitle']) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="border rounded p-3 bg-light text-center">
                                    <h6 class="fw-bold mb-2 text-dark text-start">Ảnh Banner Chuyên Đề Điều Dưỡng</h6>
                                    <div class="mb-2 bg-white p-2 rounded border">
                                        <img src="{{ asset($settings['nursing_banner_image']) }}?v={{ time() }}" id="nursing_banner_image_preview" alt="Banner điều dưỡng" class="img-fluid rounded" style="max-height: 150px;">
                                    </div>
                                    <input type="file" name="nursing_banner_image" class="form-control form-control-sm" accept="image/*" onchange="previewFile(this, 'nursing_banner_image_preview')">
                                </div>
                            </div>
                        </div>

                        <!-- 1. Chuyên ngành & Đào tạo -->
                        <div class="border rounded p-3 mb-3 bg-light">
                            <h6 class="fw-bold text-dark"><span class="badge bg-warning text-dark me-2">Phần 1</span>Chuyên ngành &amp; Đào tạo</h6>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">3 Chuyên ngành chính:</label>
                                    <textarea name="nursing_majors" class="form-control form-control-sm" rows="2">{{ old('nursing_majors', $settings['nursing_majors']) }}</textarea>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Thời gian học:</label>
                                    <textarea name="nursing_duration" class="form-control form-control-sm" rows="2">{{ old('nursing_duration', $settings['nursing_duration']) }}</textarea>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Làm thêm ngoài giờ:</label>
                                    <textarea name="nursing_overtime" class="form-control form-control-sm" rows="2">{{ old('nursing_overtime', $settings['nursing_overtime']) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Công việc thực tế -->
                        <div class="border rounded p-3 mb-3 bg-light">
                            <h6 class="fw-bold text-dark"><span class="badge bg-info text-white me-2">Phần 2</span>Công việc thực tế</h6>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Chăm sóc &amp; điều trị:</label>
                                    <textarea name="nursing_work_care" class="form-control form-control-sm" rows="2">{{ old('nursing_work_care', $settings['nursing_work_care']) }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Quản lý &amp; Phối hợp:</label>
                                    <textarea name="nursing_work_manage" class="form-control form-control-sm" rows="2">{{ old('nursing_work_manage', $settings['nursing_work_manage']) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Điều kiện tham gia -->
                        <div class="border rounded p-3 mb-3 bg-light">
                            <h6 class="fw-bold text-dark"><span class="badge bg-primary text-white me-2">Phần 3</span>Điều kiện tham gia ngành điều dưỡng</h6>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Độ tuổi &amp; Học vấn:</label>
                                    <input type="text" name="nursing_cond_age" class="form-control form-control-sm" value="{{ old('nursing_cond_age', $settings['nursing_cond_age']) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Trình độ ngoại ngữ:</label>
                                    <input type="text" name="nursing_cond_lang" class="form-control form-control-sm" value="{{ old('nursing_cond_lang', $settings['nursing_cond_lang']) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Yêu cầu sức khỏe:</label>
                                    <input type="text" name="nursing_cond_health" class="form-control form-control-sm" value="{{ old('nursing_cond_health', $settings['nursing_cond_health']) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Hợp đồng đào tạo:</label>
                                    <input type="text" name="nursing_cond_contract" class="form-control form-control-sm" value="{{ old('nursing_cond_contract', $settings['nursing_cond_contract']) }}">
                                </div>
                            </div>
                        </div>

                        <!-- 4. Quyền lợi & Thu nhập -->
                        <div class="border rounded p-3 mb-3 bg-light">
                            <h6 class="fw-bold text-dark"><span class="badge bg-success text-white me-2">Phần 4</span>Quyền lợi &amp; Thu nhập nổi bật</h6>
                            <div class="row g-3 mt-1">
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Học phí chuyên ngành:</label>
                                    <input type="text" name="nursing_tuition" class="form-control form-control-sm" value="{{ old('nursing_tuition', $settings['nursing_tuition']) }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Trợ cấp học nghề/tháng:</label>
                                    <input type="text" name="nursing_allowance" class="form-control form-control-sm" value="{{ old('nursing_allowance', $settings['nursing_allowance']) }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Lương sau tốt nghiệp:</label>
                                    <input type="text" name="nursing_salary" class="form-control form-control-sm" value="{{ old('nursing_salary', $settings['nursing_salary']) }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-bold">Quy đổi VNĐ/tháng:</label>
                                    <input type="text" name="nursing_salary_vnd" class="form-control form-control-sm" value="{{ old('nursing_salary_vnd', $settings['nursing_salary_vnd']) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Chính sách định cư:</label>
                                    <input type="text" name="nursing_settlement" class="form-control form-control-sm" value="{{ old('nursing_settlement', $settings['nursing_settlement']) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Chế độ đãi ngộ khác:</label>
                                    <input type="text" name="nursing_benefits_other" class="form-control form-control-sm" value="{{ old('nursing_benefits_other', $settings['nursing_benefits_other']) }}">
                                </div>
                            </div>
                        </div>

                        <!-- 5. Đánh giá ưu & nhược điểm (Thêm / Xóa) -->
                        <div class="border rounded p-3 mb-3 bg-light">
                            <h6 class="fw-bold text-dark"><span class="badge bg-secondary text-white me-2">Phần 5</span>Đánh giá ưu &amp; nhược điểm</h6>
                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label fw-bold small text-success mb-0"><i class="fas fa-thumbs-up me-1"></i>Thuận lợi (Ưu điểm):</label>
                                        <button type="button" class="btn btn-xs btn-outline-success btn-sm" onclick="addAdvantageItem()">
                                            <i class="fas fa-plus"></i> Thêm
                                        </button>
                                    </div>
                                    <div id="adv-container">
                                        @foreach(($settings['nursing_advantages'] ?? []) as $adv)
                                            @continue(!is_scalar($adv))
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="text" name="nursing_advantages[]" class="form-control" value="{{ $adv }}">
                                                <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <label class="form-label fw-bold small text-danger mb-0"><i class="fas fa-exclamation-circle me-1"></i>Thử thách (Khó khăn):</label>
                                        <button type="button" class="btn btn-xs btn-outline-danger btn-sm" onclick="addChallengeItem()">
                                            <i class="fas fa-plus"></i> Thêm
                                        </button>
                                    </div>
                                    <div id="chal-container">
                                        @foreach(($settings['nursing_challenges'] ?? []) as $chal)
                                            @continue(!is_scalar($chal))
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="text" name="nursing_challenges[]" class="form-control" value="{{ $chal }}">
                                                <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 6: KNOWLEDGE ARTICLES (THÊM / SỬA / XÓA BÀI VIẾT) -->
            <div class="tab-pane fade" id="tab-blog" role="tabpanel">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold text-secondary"><i class="fas fa-newspaper me-2"></i>Bài Viết Kiến Thức Du Học</h5>
                        <button type="button" class="btn btn-sm btn-primary" onclick="addArticleItem()">
                            <i class="fas fa-plus me-1"></i> Thêm bài viết mới
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tiêu đề khối kiến thức du học</label>
                            <input type="text" name="blog_title" class="form-control" value="{{ old('blog_title', $settings['blog_title']) }}">
                        </div>

                        <div id="articles-container">
                            @foreach(($settings['blog_articles'] ?? []) as $index => $art)
                                @continue(!is_array($art))
                                <div class="border rounded p-3 mb-3 bg-light article-card" id="article_card_{{ $index }}">
                                    <div class="d-flex justify-content-between align-items-center mb-2 border-bottom pb-2">
                                        <h6 class="fw-bold mb-0 text-dark">
                                            <span class="badge bg-secondary me-2">Bài #{{ $index + 1 }}</span>
                                            <span class="article-title-preview">{{ $art['title'] ?? '' }}</span>
                                        </h6>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this.closest('.article-card'))">
                                            <i class="fas fa-trash me-1"></i> Xóa bài này
                                        </button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label class="form-label small fw-bold">Tiêu đề bài viết:</label>
                                                <input type="text" name="blog_articles[{{ $index }}][title]" class="form-control form-control-sm" value="{{ $art['title'] ?? '' }}" required>
                                            </div>
                                            <div class="row g-2 mb-2">
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold">Ngày đăng:</label>
                                                    <input type="text" name="blog_articles[{{ $index }}][date]" class="form-control form-control-sm" value="{{ $art['date'] ?? date('d/m/Y') }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label small fw-bold">Liên kết nút Xem thêm:</label>
                                                    <input type="text" name="blog_articles[{{ $index }}][link]" class="form-control form-control-sm" value="{{ $art['link'] ?? '#form-dang-ky' }}">
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label small fw-bold">Tóm tắt nội dung bài viết:</label>
                                                <textarea name="blog_articles[{{ $index }}][summary]" class="form-control form-control-sm" rows="3">{{ $art['summary'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <label class="form-label small fw-bold">Ảnh bài viết:</label>
                                            <div class="bg-white p-2 rounded border mb-2">
                                                <img src="{{ asset($art['image'] ?? 'images/du-hoc-duc/blog_berlin.png') }}?v={{ time() }}" id="art_img_prev_{{ $index }}" alt="Ảnh bài viết" class="img-fluid rounded" style="max-height: 120px;">
                                            </div>
                                            <input type="hidden" name="blog_articles[{{ $index }}][image]" value="{{ $art['image'] ?? 'images/du-hoc-duc/blog_berlin.png' }}">
                                            <input type="file" name="blog_articles[{{ $index }}][new_image]" class="form-control form-control-sm" accept="image/*" onchange="previewFile(this, 'art_img_prev_{{ $index }}')">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Bottom Save Bar -->
        <div class="sticky-bottom bg-white p-3 border-top rounded-top shadow-lg d-flex justify-content-between align-items-center">
            <span class="text-muted small">
                <i class="fas fa-check-double text-success me-1"></i> Trang duy nhất &bull; Mọi thay đổi sẽ có hiệu lực ngay trên website.
            </span>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4 fw-bold">
                    <i class="fas fa-save me-2"></i> LƯU THAY ĐỔI
                </button>
            </div>
        </div>
    </form>

    <!-- Hidden Form for Reset -->
    <form id="resetForm" action="{{ route('admin.du-hoc-duc.reset') }}" method="GET" style="display: none;">
        @csrf
    </form>

    <!-- JavaScript Helpers for Dynamic Add / Remove -->
    <script>
    function previewFile(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeRow(btn) {
        if (confirm('Bạn có chắc chắn muốn xóa mục này?')) {
            btn.closest('.input-group, .article-card').remove();
            renumberRows();
        }
    }

    function renumberRows() {
        // Values
        document.querySelectorAll('#values-list-container .value-item-row').forEach((row, i) => {
            row.querySelector('.input-group-text').textContent = i + 1;
        });
        // Conditions
        document.querySelectorAll('#conditions-list-container .condition-item-row').forEach((row, i) => {
            row.querySelector('.input-group-text').textContent = i + 1;
        });
    }

    function addValueItem() {
        const container = document.getElementById('values-list-container');
        const count = container.querySelectorAll('.value-item-row').length + 1;
        const div = document.createElement('div');
        div.className = 'input-group mb-2 value-item-row';
        div.innerHTML = `
            <span class="input-group-text bg-warning text-dark fw-bold">${count}</span>
            <input type="text" name="values_items[]" class="form-control" placeholder="Nhập giá trị mới..." required>
            <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)" title="Xóa"><i class="fas fa-trash"></i></button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }

    function addConditionItem() {
        const container = document.getElementById('conditions-list-container');
        const count = container.querySelectorAll('.condition-item-row').length + 1;
        const div = document.createElement('div');
        div.className = 'input-group mb-2 condition-item-row';
        div.innerHTML = `
            <span class="input-group-text bg-success text-white fw-bold">${count}</span>
            <input type="text" name="conditions_items[]" class="form-control" placeholder="Nhập điều kiện mới..." required>
            <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)" title="Xóa"><i class="fas fa-trash"></i></button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }

    function addAdvantageItem() {
        const container = document.getElementById('adv-container');
        const div = document.createElement('div');
        div.className = 'input-group input-group-sm mb-2';
        div.innerHTML = `
            <input type="text" name="nursing_advantages[]" class="form-control" placeholder="Nhập ưu điểm mới..." required>
            <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }

    function addChallengeItem() {
        const container = document.getElementById('chal-container');
        const div = document.createElement('div');
        div.className = 'input-group input-group-sm mb-2';
        div.innerHTML = `
            <input type="text" name="nursing_challenges[]" class="form-control" placeholder="Nhập thử thách mới..." required>
            <button type="button" class="btn btn-outline-danger" onclick="removeRow(this)"><i class="fas fa-times"></i></button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }

    let articleCount = {{ count($settings['blog_articles'] ?? []) }};
    function addArticleItem() {
        const container = document.getElementById('articles-container');
        const idx = articleCount++;
        const card = document.createElement('div');
        card.className = 'border rounded p-3 mb-3 bg-light article-card';
        card.id = `article_card_${idx}`;
        card.innerHTML = `
            <div class="d-flex justify-content-between align-items-center mb-2 border-bottom pb-2">
                <h6 class="fw-bold mb-0 text-dark">
                    <span class="badge bg-secondary me-2">Bài mới</span>
                    <span>Tiêu đề bài viết mới</span>
                </h6>
                <button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this.closest('.article-card'))">
                    <i class="fas fa-trash me-1"></i> Xóa bài này
                </button>
            </div>
            <div class="row g-3">
                <div class="col-md-8">
                    <div class="mb-2">
                        <label class="form-label small fw-bold">Tiêu đề bài viết:</label>
                        <input type="text" name="blog_articles[${idx}][title]" class="form-control form-control-sm" placeholder="Nhập tiêu đề..." required>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Ngày đăng:</label>
                            <input type="text" name="blog_articles[${idx}][date]" class="form-control form-control-sm" value="${new Date().toLocaleDateString('vi-VN')}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Liên kết nút Xem thêm:</label>
                            <input type="text" name="blog_articles[${idx}][link]" class="form-control form-control-sm" value="#form-dang-ky">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-bold">Tóm tắt nội dung bài viết:</label>
                        <textarea name="blog_articles[${idx}][summary]" class="form-control form-control-sm" rows="3" placeholder="Nhập tóm tắt bài viết..."></textarea>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <label class="form-label small fw-bold">Ảnh bài viết:</label>
                    <div class="bg-white p-2 rounded border mb-2">
                        <img src="{{ asset('images/du-hoc-duc/blog_berlin.png') }}" id="art_img_prev_${idx}" alt="Ảnh" class="img-fluid rounded" style="max-height: 120px;">
                    </div>
                    <input type="hidden" name="blog_articles[${idx}][image]" value="images/du-hoc-duc/blog_berlin.png">
                    <input type="file" name="blog_articles[${idx}][new_image]" class="form-control form-control-sm" accept="image/*" onchange="previewFile(this, 'art_img_prev_${idx}')">
                </div>
            </div>
        `;
        container.appendChild(card);
        card.querySelector('input').focus();
    }

    function confirmReset() {
        if (confirm('Bạn có chắc chắn muốn khôi phục toàn bộ nội dung mặc định của trang Du Học Đức? Mọi chỉnh sửa tùy chỉnh trước đó sẽ được đặt lại theo mẫu chuẩn.')) {
            document.getElementById('resetForm').submit();
        }
    }
    </script>
@endsection

