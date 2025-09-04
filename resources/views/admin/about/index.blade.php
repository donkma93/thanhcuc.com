@extends('admin.layouts.app')

@section('title', __('general.admin_about_management'))

@section('header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">
                <i class="fas fa-users me-2"></i>
                {{ __('general.admin_about_management') }}
            </h1>
            <p class="text-muted mb-0">{{ __('general.admin_about_description') }}</p>
        </div>
        <div>
            <button type="button" class="btn btn-warning" onclick="resetToDefault()">
                <i class="fas fa-undo me-2"></i>
                {{ __('general.restore_default') }}
            </button>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const overviewEl = document.querySelector('#setting_about_overview_content');
    if (overviewEl && !overviewEl.classList.contains('ck-initialized')) {
        ClassicEditor
            .create(overviewEl, {
                toolbar: {
                    items: [
                        'heading', '|', 'bold', 'italic', 'underline', 'link', '|',
                        'bulletedList', 'numberedList', 'blockQuote', '|',
                        'undo', 'redo'
                    ]
                },
                link: {
                    decorators: {
                        addTargetToExternalLinks: {
                            mode: 'automatic',
                            callback: url => /^(https?:)?\/\//.test(url),
                            attributes: {
                                target: '_blank', rel: 'noopener noreferrer'
                            }
                        }
                    }
                }
            })
            .then(editor => {
                overviewEl.classList.add('ck-initialized');
            })
            .catch(error => {
                console.error('CKEditor init failed:', error);
            });
    }
});
</script>
@endpush

@section('content')
    @if(session('image_updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>Thành công!</strong> 
            @if(session('image_updated') === 'header')
                Ảnh header đã được cập nhật thành công! 
            @elseif(session('image_updated') === 'building')
                Ảnh tòa nhà đã được cập nhật thành công!
            @endif
            Để thấy thay đổi ngay lập tức, hãy sử dụng nút "Xóa cache ảnh" bên dưới hoặc làm mới trang.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" id="aboutForm" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        
        <!-- Quản lý ảnh header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-images me-2"></i>Quản lý ảnh header
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Ảnh header chính -->
                            <div class="col-lg-6 mb-4">
                                <div class="border rounded p-3">
                                    <h6 class="fw-bold mb-3">
                                        <i class="fas fa-image me-2 text-primary"></i>Ảnh Header Chính
                                    </h6>
                                    <p class="text-muted small mb-3">Ảnh hiển thị toàn màn hình ở đầu trang about</p>
                                    
                                    @if(file_exists(public_path('images/about/team-photo.jpg')))
                                        <div class="mb-3">
                                            <label class="form-label">Ảnh hiện tại:</label>
                                            <div class="position-relative">
                                                <img src="{{ asset('images/about/team-photo.jpg') }}?v={{ time() }}" 
                                                     alt="Ảnh header hiện tại" 
                                                     class="img-fluid rounded border" 
                                                     style="max-height: 200px; width: 100%; object-fit: cover;">
                                                <div class="position-absolute top-0 end-0 m-2">
                                                    <span class="badge bg-success">Đang sử dụng</span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-warning mb-3">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Chưa có ảnh header. Vui lòng upload ảnh để hiển thị.
                                        </div>
                                    @endif
                                    
                                    <div class="mb-3">
                                        <label for="header_image" class="form-label">Upload ảnh mới:</label>
                                        <input type="file" 
                                               class="form-control @error('header_image') is-invalid @enderror" 
                                               id="header_image" 
                                               name="header_image" 
                                               accept="image/*">
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Định dạng: JPG, PNG, GIF, SVG. Kích thước tối đa: 2MB
                                        </div>
                                        @error('header_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="previewImage('header_image', 'header_preview')">
                                            <i class="fas fa-eye me-1"></i>Xem trước
                                        </button>
                                        @if(file_exists(public_path('images/about/team-photo.jpg')))
                                            <a href="{{ asset('images/about/team-photo.jpg') }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-external-link-alt me-1"></i>Xem ảnh gốc
                                            </a>
                                        @endif
                                    </div>
                                    
                                    <!-- Preview -->
                                    <div id="header_preview" class="mt-3" style="display: none;">
                                        <label class="form-label">Xem trước:</label>
                                        <img id="header_preview_img" src="" alt="Preview" class="img-fluid rounded border" style="max-height: 200px; width: 100%; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Ảnh tòa nhà -->
                            <div class="col-lg-6 mb-4">
                                <div class="border rounded p-3">
                                    <h6 class="fw-bold mb-3">
                                        <i class="fas fa-building me-2 text-primary"></i>Ảnh Tòa Nhà
                                    </h6>
                                    <p class="text-muted small mb-3">Ảnh hiển thị trong phần tổng quan về trung tâm</p>
                                    
                                    @if(file_exists(public_path('images/about/sec-building.svg')))
                                        <div class="mb-3">
                                            <label class="form-label">Ảnh hiện tại:</label>
                                            <div class="position-relative">
                                                <img src="{{ asset('images/about/sec-building.svg') }}?v={{ time() }}" 
                                                     alt="Ảnh tòa nhà hiện tại" 
                                                     class="img-fluid rounded border" 
                                                     style="max-height: 200px; width: 100%; object-fit: cover;">
                                                <div class="position-absolute top-0 end-0 m-2">
                                                    <span class="badge bg-success">Đang sử dụng</span>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-warning mb-3">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            Chưa có ảnh tòa nhà. Vui lòng upload ảnh để hiển thị.
                                        </div>
                                    @endif
                                    
                                    <div class="mb-3">
                                        <label for="building_image" class="form-label">Upload ảnh mới:</label>
                                        <input type="file" 
                                               class="form-control @error('building_image') is-invalid @enderror" 
                                               id="building_image" 
                                               name="building_image" 
                                               accept="image/*">
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Định dạng: JPG, PNG, GIF, SVG. Kích thước tối đa: 2MB
                                        </div>
                                        @error('building_image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="previewImage('building_image', 'building_preview')">
                                            <i class="fas fa-eye me-1"></i>Xem trước
                                        </button>
                                        @if(file_exists(public_path('images/about/sec-building.svg')))
                                            <a href="{{ asset('images/about/sec-building.svg') }}" target="_blank" class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-external-link-alt me-1"></i>Xem ảnh gốc
                                            </a>
                                        @endif
                                    </div>
                                    
                                    <!-- Preview -->
                                    <div id="building_preview" class="mt-3" style="display: none;">
                                        <label class="form-label">Xem trước:</label>
                                        <img id="building_preview_img" src="" alt="Preview" class="img-fluid rounded border" style="max-height: 200px; width: 100%; object-fit: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="fas fa-lightbulb me-2"></i>
                            <strong>Lưu ý:</strong> Ảnh sẽ được tự động resize và tối ưu hóa. 
                            Nên sử dụng ảnh có tỷ lệ khung hình phù hợp để hiển thị đẹp nhất.
                        </div>
                        
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Lưu ý về cache:</strong> Sau khi upload ảnh mới, có thể cần làm mới trang hoặc xóa cache browser để thấy thay đổi ngay lập tức.
                            <div class="mt-2">
                                <button type="button" class="btn btn-sm btn-outline-warning" onclick="refreshPage()">
                                    <i class="fas fa-sync-alt me-1"></i>Làm mới trang
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-info" onclick="clearImageCache()">
                                    <i class="fas fa-broom me-1"></i>Xóa cache ảnh
                                </button>
                            </div>
                        </div>
                        
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>Mẹo:</strong> Để thấy thay đổi ảnh ngay lập tức:
                            <ul class="mb-0 mt-2">
                                <li>Nhấn <kbd>Ctrl + F5</kbd> (Windows) hoặc <kbd>Cmd + Shift + R</kbd> (Mac) để làm mới hoàn toàn</li>
                                <li>Hoặc sử dụng nút "Xóa cache ảnh" bên trên</li>
                                <li>Hoặc mở trang about trong tab ẩn danh</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Thông tin cơ bản -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-info-circle me-2"></i>Thông tin cơ bản
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Header Settings -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary mb-3">
                                <i class="fas fa-heading me-2"></i>Cài đặt Header
                            </h6>
                            
                            <div class="mb-3">
                                <label for="setting_about_header_title" class="form-label">
                                    Tiêu đề Header <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('settings.about_header_title') is-invalid @enderror" 
                                       id="setting_about_header_title" 
                                       name="settings[about_header_title]" 
                                       value="{{ old('settings.about_header_title', \App\Models\Setting::get('about_header_title', 'Đội Ngũ Giảng Viên Chuyên Nghiệp')) }}"
                                       placeholder="Tiêu đề hiển thị trên ảnh header"
                                       required>
                                <div class="form-text">Tiêu đề chính hiển thị trên ảnh header</div>
                                @error('settings.about_header_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="setting_about_header_subtitle" class="form-label">
                                    Mô tả Header <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('settings.about_header_subtitle') is-invalid @enderror" 
                                          id="setting_about_header_subtitle" 
                                          name="settings[about_header_subtitle]" 
                                          rows="3"
                                          placeholder="Mô tả ngắn gọn về đội ngũ giảng viên"
                                          required>{{ old('settings.about_header_subtitle', \App\Models\Setting::get('about_header_subtitle', 'Hơn 25 giảng viên giàu kinh nghiệm, tận tâm với sứ mệnh giúp học viên chinh phục tiếng Đức thành công')) }}</textarea>
                                <div class="form-text">Mô tả ngắn gọn hiển thị dưới tiêu đề</div>
                                @error('settings.about_header_subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Header Statistics -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary mb-3">
                                <i class="fas fa-chart-bar me-2"></i>Thống kê Header
                            </h6>
                            <p class="text-muted small mb-3">Các con số thống kê hiển thị trên ảnh header</p>
                            
                            @php
                                $headerStats = json_decode(\App\Models\Setting::get('about_header_stats', '[]'), true);
                                if (empty($headerStats)) {
                                    $headerStats = [
                                        ['number' => '25+', 'label' => 'Giảng viên'],
                                        ['number' => '4+', 'label' => 'Năm kinh nghiệm'],
                                        ['number' => '1000+', 'label' => 'Học viên thành công']
                                    ];
                                }
                            @endphp
                            
                            <div id="header-stats-container">
                                @foreach($headerStats as $index => $stat)
                                    <div class="header-stat-item border rounded p-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Số liệu</label>
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="header_stats[{{ $index }}][number]" 
                                                       value="{{ $stat['number'] ?? '' }}"
                                                       placeholder="25+">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Nhãn</label>
                                                <input type="text" 
                                                       class="form-control" 
                                                       name="header_stats[{{ $index }}][label]" 
                                                       value="{{ $stat['label'] ?? '' }}"
                                                       placeholder="Giảng viên">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="removeHeaderStat({{ $index }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addHeaderStat()">
                                <i class="fas fa-plus me-1"></i>Thêm thống kê
                            </button>
                            
                            <input type="hidden" name="settings[about_header_stats]" id="header_stats_json">
                        </div>
                        
                        <!-- Other Settings -->
                        @foreach($aboutSettings->where('sort_order', '<=', 4) as $setting)
                            <div class="mb-3">
                                <label for="setting_{{ $setting->key }}" class="form-label">
                                    {{ $setting->label }}
                                    @if(in_array($setting->key, ['about_page_title', 'about_page_subtitle', 'about_overview_title', 'about_overview_content']))
                                        <span class="text-danger">*</span>
                                    @endif
                                    @if($setting->description)
                                        <i class="fas fa-info-circle text-muted ms-1" 
                                           title="{{ $setting->description }}" 
                                           data-bs-toggle="tooltip"></i>
                                    @endif
                                </label>
                                
                                @if($setting->type === 'text')
                                    <input type="text" 
                                           class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                           id="setting_{{ $setting->key }}" 
                                           name="settings[{{ $setting->key }}]" 
                                           value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                           placeholder="{{ $setting->description }}"
                                           @if(in_array($setting->key, ['about_page_title', 'about_overview_title'])) required @endif>
                                @elseif($setting->type === 'textarea')
                                    <textarea class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                              id="setting_{{ $setting->key }}" 
                                              name="settings[{{ $setting->key }}]" 
                                              rows="4"
                                              placeholder="{{ $setting->description }}"
                                              @if(in_array($setting->key, ['about_page_subtitle', 'about_overview_content'])) required @endif>{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                @endif
                                
                                @error('settings.' . $setting->key)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                @if($setting->description && $setting->type !== 'checkbox')
                                    <div class="form-text">{{ $setting->description }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sứ mệnh & Tầm nhìn -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-bullseye me-2"></i>Sứ mệnh & Tầm nhìn
                        </h5>
                    </div>
                    <div class="card-body">
                        @foreach($aboutSettings->whereIn('sort_order', [5, 6]) as $setting)
                            <div class="mb-3">
                                <label for="setting_{{ $setting->key }}" class="form-label">
                                    {{ $setting->label }}
                                    <span class="text-danger">*</span>
                                    @if($setting->description)
                                        <i class="fas fa-info-circle text-muted ms-1" 
                                           title="{{ $setting->description }}" 
                                           data-bs-toggle="tooltip"></i>
                                    @endif
                                </label>
                                
                                <textarea class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                          id="setting_{{ $setting->key }}" 
                                          name="settings[{{ $setting->key }}]" 
                                          rows="4"
                                          placeholder="{{ $setting->description }}"
                                          required>{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                
                                @error('settings.' . $setting->key)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                @if($setting->description)
                                    <div class="form-text">{{ $setting->description }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Call-to-Action -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-bullhorn me-2"></i>Call-to-Action
                        </h5>
                    </div>
                    <div class="card-body">
                        @foreach($aboutSettings->whereIn('sort_order', [10, 11]) as $setting)
                            <div class="mb-3">
                                <label for="setting_{{ $setting->key }}" class="form-label">
                                    {{ $setting->label }}
                                    <span class="text-danger">*</span>
                                    @if($setting->description)
                                        <i class="fas fa-info-circle text-muted ms-1" 
                                           title="{{ $setting->description }}" 
                                           data-bs-toggle="tooltip"></i>
                                    @endif
                                </label>
                                
                                @if($setting->type === 'text')
                                    <input type="text" 
                                           class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                           id="setting_{{ $setting->key }}" 
                                           name="settings[{{ $setting->key }}]" 
                                           value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                           placeholder="{{ $setting->description }}"
                                           required>
                                @else
                                    <textarea class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                              id="setting_{{ $setting->key }}" 
                                              name="settings[{{ $setting->key }}]" 
                                              rows="3"
                                              placeholder="{{ $setting->description }}"
                                              required>{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                @endif
                                
                                @error('settings.' . $setting->key)
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                @if($setting->description)
                                    <div class="form-text">{{ $setting->description }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Giá trị cốt lõi -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-heart me-2"></i>Giá trị cốt lõi
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $coreValuesSetting = $aboutSettings->where('key', 'about_core_values')->first();
                            $coreValues = $coreValuesSetting ? json_decode($coreValuesSetting->value, true) : [];
                        @endphp
                        
                        <div id="core-values-container">
                            @foreach($coreValues as $index => $value)
                                <div class="core-value-item border rounded p-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Icon (FontAwesome)</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="core_values[{{ $index }}][icon]" 
                                                   value="{{ $value['icon'] ?? '' }}"
                                                   placeholder="fas fa-heart">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tiêu đề</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="core_values[{{ $index }}][title]" 
                                                   value="{{ $value['title'] ?? '' }}"
                                                   placeholder="Tận Tâm">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Mô tả</label>
                                            <textarea class="form-control" 
                                                      name="core_values[{{ $index }}][description]" 
                                                      rows="2"
                                                      placeholder="Mô tả giá trị cốt lõi">{{ $value['description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <input type="hidden" name="settings[about_core_values]" id="core_values_json">
                    </div>
                </div>
            </div>

            <!-- Thành tựu -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-trophy me-2"></i>Thành tựu đạt được
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $achievementsSetting = $aboutSettings->where('key', 'about_achievements')->first();
                            $achievements = $achievementsSetting ? json_decode($achievementsSetting->value, true) : [];
                        @endphp
                        
                        <div id="achievements-container">
                            @foreach($achievements as $index => $achievement)
                                <div class="achievement-item border rounded p-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Số liệu</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="achievements[{{ $index }}][number]" 
                                                   value="{{ $achievement['number'] ?? '' }}"
                                                   placeholder="30,000+">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Tiêu đề</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="achievements[{{ $index }}][title]" 
                                                   value="{{ $achievement['title'] ?? '' }}"
                                                   placeholder="Học Viên">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Mô tả</label>
                                            <textarea class="form-control" 
                                                      name="achievements[{{ $index }}][description]" 
                                                      rows="2"
                                                      placeholder="Mô tả thành tựu">{{ $achievement['description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <input type="hidden" name="settings[about_achievements]" id="achievements_json">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>
                            Lưu Thông tin
                        </button>
                        <button type="reset" class="btn btn-secondary btn-lg ms-2">
                            <i class="fas fa-undo me-2"></i>
                            Khôi phục
                        </button>
                        <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" target="_blank" class="btn btn-info btn-lg ms-2">
                            <i class="fas fa-eye me-2"></i>
                            Xem trang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Form submission handler
        document.getElementById('aboutForm').addEventListener('submit', function(e) {
            // Update JSON fields before submission
            updateCoreValuesJson();
            updateAchievementsJson();
            updateHeaderStatsJson();
            
            // Validate form before submission
            if (!validateForm()) {
                e.preventDefault();
                return false;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang lưu...';
            submitBtn.disabled = true;
            
            // Re-enable button after form submission
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });
        
        // Auto-refresh images after successful upload
        @if(session('image_updated'))
            // Force refresh images after successful upload
            setTimeout(() => {
                // Refresh all images on the page
                const images = document.querySelectorAll('img');
                images.forEach(img => {
                    if (img.src.includes('images/about/')) {
                        const newSrc = img.src.split('?')[0] + '?v=' + Date.now();
                        img.src = newSrc;
                    }
                });
            }, 1000);
        @endif
    });
    
    // Preview image function
    function previewImage(inputId, previewId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const previewImg = document.getElementById(previewId + '_img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function updateCoreValuesJson() {
        const coreValues = [];
        document.querySelectorAll('.core-value-item').forEach((item, index) => {
            const iconInput = item.querySelector(`input[name="core_values[${index}][icon]"]`);
            const titleInput = item.querySelector(`input[name="core_values[${index}][title]"]`);
            const descriptionInput = item.querySelector(`textarea[name="core_values[${index}][description]"]`);
            
            if (iconInput && titleInput && descriptionInput) {
                const icon = iconInput.value.trim();
                const title = titleInput.value.trim();
                const description = descriptionInput.value.trim();
                
                if (title) { // Chỉ thêm nếu có tiêu đề
                    coreValues.push({ 
                        icon: icon || 'fas fa-star', // Default icon if empty
                        title: title, 
                        description: description || title // Use title as description if empty
                    });
                }
            }
        });
        
        // Đảm bảo luôn có ít nhất 1 giá trị mặc định
        if (coreValues.length === 0) {
            coreValues.push({
                icon: 'fas fa-heart',
                title: 'Tận Tâm',
                description: 'Luôn đặt lợi ích của học viên lên hàng đầu'
            });
        }
        
        try {
            const jsonString = JSON.stringify(coreValues);
            document.getElementById('core_values_json').value = jsonString;
            console.log('Core values JSON updated:', jsonString);
        } catch (error) {
            console.error('Error creating JSON:', error);
            // Fallback to default
            const defaultValues = [{
                icon: 'fas fa-heart',
                title: 'Tận Tâm',
                description: 'Luôn đặt lợi ích của học viên lên hàng đầu'
            }];
            document.getElementById('core_values_json').value = JSON.stringify(defaultValues);
        }
    }
    
    function updateAchievementsJson() {
        const achievements = [];
        document.querySelectorAll('.achievement-item').forEach((item, index) => {
            const numberInput = item.querySelector(`input[name="achievements[${index}][number]"]`);
            const titleInput = item.querySelector(`input[name="achievements[${index}][title]"]`);
            const descriptionInput = item.querySelector(`textarea[name="achievements[${index}][description]"]`);
            
            if (numberInput && titleInput && descriptionInput) {
                const number = numberInput.value.trim();
                const title = titleInput.value.trim();
                const description = descriptionInput.value.trim();
                
                if (title) { // Chỉ thêm nếu có tiêu đề
                    achievements.push({ 
                        number: number || '0', // Default number if empty
                        title: title, 
                        description: description || title // Use title as description if empty
                    });
                }
            }
        });
        
        // Đảm bảo luôn có ít nhất 1 thành tựu mặc định
        if (achievements.length === 0) {
            achievements.push({
                number: '1000+',
                title: 'Học Viên',
                description: 'Đã tin tưởng và lựa chọn chúng tôi'
            });
        }
        
        try {
            const jsonString = JSON.stringify(achievements);
            document.getElementById('achievements_json').value = jsonString;
            console.log('Achievements JSON updated:', jsonString);
        } catch (error) {
            console.error('Error creating JSON:', error);
            // Fallback to default
            const defaultValues = [{
                number: '1000+',
                title: 'Học Viên',
                description: 'Đã tin tưởng và lựa chọn chúng tôi'
            }];
            document.getElementById('achievements_json').value = JSON.stringify(defaultValues);
        }
    }
    
    // Header statistics functions
    function addHeaderStat() {
        const container = document.getElementById('header-stats-container');
        const index = container.children.length;
        
        const statHtml = `
            <div class="header-stat-item border rounded p-3 mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Số liệu <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               name="header_stats[${index}][number]" 
                               placeholder="25+"
                               required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nhãn <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control" 
                               name="header_stats[${index}][label]" 
                               placeholder="Giảng viên"
                               required>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">&nbsp;</label>
                        <button type="button" class="btn btn-outline-danger btn-sm w-100" onclick="removeHeaderStat(${index})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        container.insertAdjacentHTML('beforeend', statHtml);
    }
    
    function removeHeaderStat(index) {
        const container = document.getElementById('header-stats-container');
        const items = container.querySelectorAll('.header-stat-item');
        
        if (items[index]) {
            items[index].remove();
            
            // Reindex remaining items
            const remainingItems = container.querySelectorAll('.header-stat-item');
            remainingItems.forEach((item, newIndex) => {
                const numberInput = item.querySelector('input[name*="[number]"]');
                const labelInput = item.querySelector('input[name*="[label]"]');
                const removeBtn = item.querySelector('button');
                
                if (numberInput) {
                    numberInput.name = `header_stats[${newIndex}][number]`;
                }
                if (labelInput) {
                    labelInput.name = `header_stats[${newIndex}][label]`;
                }
                if (removeBtn) {
                    removeBtn.onclick = () => removeHeaderStat(newIndex);
                }
            });
        }
    }
    
    function updateHeaderStatsJson() {
        const headerStats = [];
        document.querySelectorAll('.header-stat-item').forEach((item, index) => {
            const numberInput = item.querySelector(`input[name="header_stats[${index}][number]"]`);
            const labelInput = item.querySelector(`input[name="header_stats[${index}][label]"]`);
            
            if (numberInput && labelInput) {
                const number = numberInput.value.trim();
                const label = labelInput.value.trim();
                
                // Chỉ thêm vào mảng nếu cả number và label đều có giá trị
                if (number && label) {
                    headerStats.push({ 
                        number: number, 
                        label: label 
                    });
                }
            }
        });
        
        // Đảm bảo luôn có ít nhất 3 thống kê mặc định
        if (headerStats.length === 0) {
            headerStats.push(
                { number: '25+', label: 'Giảng viên' },
                { number: '4+', label: 'Năm kinh nghiệm' },
                { number: '1000+', label: 'Học viên thành công' }
            );
        }
        
        try {
            const jsonString = JSON.stringify(headerStats);
            document.getElementById('header_stats_json').value = jsonString;
            console.log('Header stats JSON updated:', jsonString);
        } catch (error) {
            console.error('Error creating JSON:', error);
            // Fallback to default
            const defaultValues = [
                { number: '25+', label: 'Giảng viên' },
                { number: '4+', label: 'Năm kinh nghiệm' },
                { number: '1000+', label: 'Học viên thành công' }
            ];
            document.getElementById('header_stats_json').value = JSON.stringify(defaultValues);
        }
    }
    
    // Form validation function
    function validateForm() {
        let isValid = true;
        const errors = [];
        
        // Update all JSON fields before validation
        updateCoreValuesJson();
        updateAchievementsJson();
        updateHeaderStatsJson();
        
        // Validate header stats
        const headerStatsContainer = document.getElementById('header-stats-container');
        const headerStatItems = headerStatsContainer.querySelectorAll('.header-stat-item');
        
        headerStatItems.forEach((item, index) => {
            const numberInput = item.querySelector(`input[name="header_stats[${index}][number]"]`);
            const labelInput = item.querySelector(`input[name="header_stats[${index}][label]"]`);
            
            if (numberInput && labelInput) {
                if (!numberInput.value.trim()) {
                    errors.push(`Số liệu thống kê ${index + 1} không được để trống`);
                    isValid = false;
                }
                if (!labelInput.value.trim()) {
                    errors.push(`Nhãn thống kê ${index + 1} không được để trống`);
                    isValid = false;
                }
            }
        });
        
        // Validate other required fields
        const requiredFields = document.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            alert('Vui lòng kiểm tra các lỗi sau:\n' + errors.join('\n'));
        }
        
        return isValid;
    }
    
    function resetToDefault() {
        if (confirm('Bạn có chắc chắn muốn khôi phục về cài đặt mặc định? Tất cả thay đổi hiện tại sẽ bị mất.')) {
            window.location.href = '{{ route("admin.about.reset") }}';
        }
    }

    function refreshPage() {
        window.location.reload();
    }

    function clearImageCache() {
        if (confirm('Bạn có chắc chắn muốn xóa cache ảnh? Tất cả ảnh sẽ được tải lại từ server.')) {
            // Show loading state
            const btn = event.target;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Đang xóa cache...';
            btn.disabled = true;
            
            // Call API to clear cache
            fetch('{{ route("admin.about.clear-cache") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cache ảnh đã được xóa thành công! Vui lòng tải lại trang để thấy thay đổi.');
                    // Optionally reload the page
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    alert('Có lỗi xảy ra: ' + (data.message || 'Không thể xóa cache'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi xóa cache. Vui lòng thử lại.');
            })
            .finally(() => {
                // Restore button state
                btn.innerHTML = originalText;
                btn.disabled = false;
            });
        }
    }
    
    // Initialize JSON fields when page loads
    function initializeJsonFields() {
        updateCoreValuesJson();
        updateAchievementsJson();
        updateHeaderStatsJson();
        console.log('JSON fields initialized');
    }
    
    // Call initialization when page loads
    document.addEventListener('DOMContentLoaded', function() {
        initializeJsonFields();
    });
</script>
@endpush