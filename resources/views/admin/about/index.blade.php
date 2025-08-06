@extends('admin.layouts.app')

@section('title', 'Quản lý Về Chúng Tôi')

@section('header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">
                <i class="fas fa-users me-2"></i>
                Quản lý Về Chúng Tôi
            </h1>
            <p class="text-muted mb-0">Quản lý thông tin trang Về chúng tôi</p>
        </div>
        <div>
            <button type="button" class="btn btn-warning" onclick="resetToDefault()">
                <i class="fas fa-undo me-2"></i>
                Khôi phục mặc định
            </button>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" id="aboutForm">
        @csrf
        @method('PUT')
        
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

            <!-- Hệ thống cơ sở -->
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i>Hệ thống cơ sở
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $locationsSetting = $aboutSettings->where('key', 'about_locations')->first();
                            $locations = $locationsSetting ? json_decode($locationsSetting->value, true) : [];
                        @endphp
                        
                        <div id="locations-container">
                            @foreach($locations as $index => $location)
                                <div class="location-item border rounded p-3 mb-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label">Tên cơ sở</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="locations[{{ $index }}][name]" 
                                                   value="{{ $location['name'] ?? '' }}"
                                                   placeholder="Cơ Sở 1">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Địa chỉ</label>
                                            <textarea class="form-control" 
                                                      name="locations[{{ $index }}][address]" 
                                                      rows="2"
                                                      placeholder="Địa chỉ cơ sở">{{ $location['address'] ?? '' }}</textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Điện thoại</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   name="locations[{{ $index }}][phone]" 
                                                   value="{{ $location['phone'] ?? '' }}"
                                                   placeholder="0975.186.230">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Mô tả</label>
                                            <textarea class="form-control" 
                                                      name="locations[{{ $index }}][description]" 
                                                      rows="2"
                                                      placeholder="Mô tả cơ sở">{{ $location['description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <input type="hidden" name="settings[about_locations]" id="locations_json">
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
                        <a href="{{ route('about') }}" target="_blank" class="btn btn-info btn-lg ms-2">
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
            updateLocationsJson();
        });
    });
    
    function updateCoreValuesJson() {
        const coreValues = [];
        document.querySelectorAll('.core-value-item').forEach((item, index) => {
            const icon = item.querySelector(`input[name="core_values[${index}][icon]"]`).value;
            const title = item.querySelector(`input[name="core_values[${index}][title]"]`).value;
            const description = item.querySelector(`textarea[name="core_values[${index}][description]"]`).value;
            
            if (title.trim()) {
                coreValues.push({ icon, title, description });
            }
        });
        
        document.getElementById('core_values_json').value = JSON.stringify(coreValues);
    }
    
    function updateAchievementsJson() {
        const achievements = [];
        document.querySelectorAll('.achievement-item').forEach((item, index) => {
            const number = item.querySelector(`input[name="achievements[${index}][number]"]`).value;
            const title = item.querySelector(`input[name="achievements[${index}][title]"]`).value;
            const description = item.querySelector(`textarea[name="achievements[${index}][description]"]`).value;
            
            if (title.trim()) {
                achievements.push({ number, title, description });
            }
        });
        
        document.getElementById('achievements_json').value = JSON.stringify(achievements);
    }
    
    function updateLocationsJson() {
        const locations = [];
        document.querySelectorAll('.location-item').forEach((item, index) => {
            const name = item.querySelector(`input[name="locations[${index}][name]"]`).value;
            const address = item.querySelector(`textarea[name="locations[${index}][address]"]`).value;
            const phone = item.querySelector(`input[name="locations[${index}][phone]"]`).value;
            const description = item.querySelector(`textarea[name="locations[${index}][description]"]`).value;
            
            if (name.trim()) {
                locations.push({ name, address, phone, description });
            }
        });
        
        document.getElementById('locations_json').value = JSON.stringify(locations);
    }
    
    function resetToDefault() {
        if (confirm('Bạn có chắc chắn muốn khôi phục về cài đặt mặc định? Tất cả thay đổi hiện tại sẽ bị mất.')) {
            window.location.href = '{{ route("admin.about.reset") }}';
        }
    }
</script>
@endpush