@extends('admin.layouts.app')

@section('title', 'Cài đặt Website')

@section('header')
    <div>
        <h1 class="h3 mb-0">
            <i class="fas fa-cogs me-2"></i>
            Cài đặt Website
        </h1>
        <p class="text-muted mb-0">Quản lý các cài đặt chung của website</p>
    </div>
@endsection

@section('content')
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="row">
            @foreach($settings as $group => $groupSettings)
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                @switch($group)
                                    @case('general')
                                        <i class="fas fa-globe me-2"></i>Cài đặt chung
                                        @break
                                    @case('company')
                                        <i class="fas fa-building me-2"></i>Thông tin công ty
                                        @break
                                    @case('contact')
                                        <i class="fas fa-phone me-2"></i>Thông tin liên hệ
                                        @break
                                    @case('social')
                                        <i class="fas fa-share-alt me-2"></i>Mạng xã hội
                                        @break
                                    @case('branches')
                                        <i class="fas fa-map-marker-alt me-2"></i>Chi nhánh
                                        @break
                                    @case('seo')
                                        <i class="fas fa-search me-2"></i>SEO
                                        @break
                                    @default
                                        <i class="fas fa-cog me-2"></i>{{ ucfirst($group) }}
                                @endswitch
                            </h5>
                        </div>
                        <div class="card-body">
                            @foreach($groupSettings as $setting)
                                <div class="mb-3">
                                    <label for="setting_{{ $setting->key }}" class="form-label">
                                        {{ $setting->label }}
                                        @if($setting->description)
                                            <i class="fas fa-info-circle text-muted ms-1" 
                                               title="{{ $setting->description }}" 
                                               data-bs-toggle="tooltip"></i>
                                        @endif
                                    </label>
                                    
                                    @switch($setting->type)
                                        @case('text')
                                            <input type="text" 
                                                   class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                                   id="setting_{{ $setting->key }}" 
                                                   name="settings[{{ $setting->key }}]" 
                                                   value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                                   placeholder="{{ $setting->description }}">
                                            @break
                                            
                                        @case('textarea')
                                            <textarea class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                                      id="setting_{{ $setting->key }}" 
                                                      name="settings[{{ $setting->key }}]" 
                                                      rows="3"
                                                      placeholder="{{ $setting->description }}">{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                            @break
                                            
                                        @case('image')
                                            <input type="file" 
                                                   class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                                   id="setting_{{ $setting->key }}" 
                                                   name="settings[{{ $setting->key }}]" 
                                                   accept="image/*">
                                            @if($setting->value)
                                                <div class="mt-2">
                                                    <img src="{{ Storage::url($setting->value) }}" 
                                                         alt="{{ $setting->label }}" 
                                                         class="img-thumbnail" 
                                                         style="max-width: 200px; max-height: 100px;">
                                                </div>
                                            @endif
                                            @break
                                            
                                        @case('select')
                                            <select class="form-select @error('settings.' . $setting->key) is-invalid @enderror" 
                                                    id="setting_{{ $setting->key }}" 
                                                    name="settings[{{ $setting->key }}]">
                                                @if(isset($setting->options))
                                                    @foreach(json_decode($setting->options, true) as $optionValue => $optionLabel)
                                                        <option value="{{ $optionValue }}" 
                                                                {{ old('settings.' . $setting->key, $setting->value) == $optionValue ? 'selected' : '' }}>
                                                            {{ $optionLabel }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @break
                                            
                                        @case('checkbox')
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" 
                                                       type="checkbox" 
                                                       id="setting_{{ $setting->key }}" 
                                                       name="settings[{{ $setting->key }}]" 
                                                       value="1"
                                                       {{ old('settings.' . $setting->key, $setting->value) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="setting_{{ $setting->key }}">
                                                    {{ $setting->description }}
                                                </label>
                                            </div>
                                            @break
                                            
                                        @case('color')
                                            <input type="color" 
                                                   class="form-control form-control-color @error('settings.' . $setting->key) is-invalid @enderror" 
                                                   id="setting_{{ $setting->key }}" 
                                                   name="settings[{{ $setting->key }}]" 
                                                   value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                                   style="width: 60px; height: 40px;">
                                            @break
                                            
                                        @case('json')
                                            @php $current = $setting->formatted_value; @endphp
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <input type="text" 
                                                           class="form-control" 
                                                           name="settings[{{ $setting->key }}][name]" 
                                                           value="{{ old('settings.' . $setting->key . '.name', $current['name'] ?? '') }}" 
                                                           placeholder="Tên">
                                                </div>
                                                <div class="col-6">
                                                    <input type="text" 
                                                           class="form-control" 
                                                           name="settings[{{ $setting->key }}][address]" 
                                                           value="{{ old('settings.' . $setting->key . '.address', $current['address'] ?? '') }}" 
                                                           placeholder="Địa chỉ">
                                                </div>
                                            </div>
                                            @break

                                        @default
                                            <input type="text" 
                                                   class="form-control @error('settings.' . $setting->key) is-invalid @enderror" 
                                                   id="setting_{{ $setting->key }}" 
                                                   name="settings[{{ $setting->key }}]" 
                                                   value="{{ old('settings.' . $setting->key, $setting->value) }}">
                                    @endswitch
                                    
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
            @endforeach
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>
                            Lưu Cài đặt
                        </button>
                        <button type="reset" class="btn btn-secondary btn-lg ms-2">
                            <i class="fas fa-undo me-2"></i>
                            Khôi phục
                        </button>
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
        
        // Image preview for file inputs
        const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
        imageInputs.forEach(input => {
            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        let preview = input.parentNode.querySelector('.preview-image');
                        if (!preview) {
                            preview = document.createElement('div');
                            preview.className = 'preview-image mt-2';
                            input.parentNode.appendChild(preview);
                        }
                        preview.innerHTML = `
                            <img src="${e.target.result}" 
                                 alt="Preview" 
                                 class="img-thumbnail" 
                                 style="max-width: 200px; max-height: 100px;">
                        `;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
        
        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                showAlert('error', 'Vui lòng điền đầy đủ các trường bắt buộc');
            }
        });
    });
    
    function showAlert(type, message) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        
        const alert = document.createElement('div');
        alert.className = `alert ${alertClass} alert-dismissible fade show`;
        alert.innerHTML = `
            <i class="fas ${icon} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.main-content');
        container.insertBefore(alert, container.firstChild);
        
        // Auto dismiss after 5 seconds
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    }
</script>
@endpush