# Hướng Dẫn Sử Dụng Hình Ảnh - Anh Ngữ SEC

## 📁 Cấu Trúc Thư Mục Hình Ảnh

```
public/images/
├── hero/
│   └── english-learning.svg          # Hình ảnh hero section
├── courses/
│   ├── toeic-icon.svg               # Icon khóa học TOEIC
│   ├── ielts-icon.svg               # Icon khóa học IELTS
│   ├── conversation-icon.svg        # Icon khóa học Giao tiếp
│   └── vstep-icon.svg               # Icon khóa học VSTEP
├── teachers/
│   ├── teacher-1.svg                # Hình ảnh giảng viên mẫu 1
│   └── teacher-2.svg                # Hình ảnh giảng viên mẫu 2
├── about/
│   └── sec-building.svg             # Hình ảnh tòa nhà SEC
└── icons/
    ├── success-icon.svg             # Icon thành công
    ├── learning-icon.svg            # Icon học tập
    └── certificate-icon.svg         # Icon chứng chỉ
```

## 🎨 Đặc Điểm Hình Ảnh

### Màu Sắc Chủ Đạo
- **Primary**: #13265b (Navy Blue)
- **Secondary**: #f59e0b (Orange)
- **Success**: #10b981 (Green)
- **Accent**: #ef4444 (Red)

### Định Dạng
- **Format**: SVG (Vector graphics)
- **Ưu điểm**: 
  - Scalable (có thể phóng to/thu nhỏ không mất chất lượng)
  - Nhẹ (file size nhỏ)
  - Hỗ trợ animation CSS
  - Responsive tự động

## 🖼️ Hình Ảnh Đã Tạo

### 1. Hero Section
**File**: `public/images/hero/english-learning.svg`
- **Kích thước**: 500x400px
- **Nội dung**: Minh họa học tiếng Anh với sách, mũ tốt nghiệp, speech bubbles
- **Animation**: Floating particles, rotating elements
- **Sử dụng**: Trang chủ hero section

### 2. Course Icons

#### TOEIC Icon
**File**: `public/images/courses/toeic-icon.svg`
- **Màu chủ đạo**: Orange gradient
- **Nội dung**: Certificate TOEIC với điểm 800+, trophy
- **Animation**: Floating elements

#### IELTS Icon  
**File**: `public/images/courses/ielts-icon.svg`
- **Màu chủ đạo**: Green gradient
- **Nội dung**: IELTS badge với 4 skills (L,R,W,S), score 6.5+
- **Animation**: Rotating stars

#### Conversation Icon
**File**: `public/images/courses/conversation-icon.svg`
- **Màu chủ đạo**: Red gradient
- **Nội dung**: Speech bubbles, microphone, sound waves
- **Animation**: Sound wave animation

#### VSTEP Icon
**File**: `public/images/courses/vstep-icon.svg`
- **Màu chủ đạo**: Purple gradient
- **Nội dung**: VSTEP certificate B1/B2, graduation cap, Vietnam flag
- **Animation**: Achievement stars

### 3. About Page
**File**: `public/images/about/sec-building.svg`
- **Kích thước**: 600x400px
- **Nội dung**: Tòa nhà SEC, students, trees, sky background
- **Animation**: Moving clouds, floating elements
- **Địa chỉ**: 108B Trường Chinh, Đống Đa, Hà Nội

### 4. Teacher Images
**File**: `public/images/teachers/teacher-1.svg` & `teacher-2.svg`
- **Kích thước**: 300x300px
- **Nội dung**: Minh họa giảng viên với academic elements
- **Phong cách**: Professional, friendly
- **Placeholder**: Có thể thay thế bằng ảnh thật

### 5. Utility Icons

#### Success Icon
**File**: `public/images/icons/success-icon.svg`
- **Nội dung**: Checkmark với glow effect
- **Animation**: Drawing checkmark, sparkles
- **Sử dụng**: Thành tích, hoàn thành

#### Learning Icon
**File**: `public/images/icons/learning-icon.svg`
- **Nội dung**: Book, graduation cap, light bulb
- **Animation**: Light rays, floating elements
- **Sử dụng**: Features, benefits

#### Certificate Icon
**File**: `public/images/icons/certificate-icon.svg`
- **Nội dung**: Certificate, ribbons, trophy
- **Animation**: Rotating stars
- **Sử dụng**: Achievements, certifications

## 🔧 Cách Sử Dụng

### Trong Blade Templates
```html
<!-- Hero image -->
<img src="{{ asset('images/hero/english-learning.svg') }}" 
     alt="SEC English Center" 
     class="img-fluid rounded shadow-lg animate-float">

<!-- Course icons -->
<img src="{{ asset('images/courses/toeic-icon.svg') }}" 
     alt="TOEIC" 
     class="rounded animate-on-scroll">

<!-- About image -->
<img src="{{ asset('images/about/sec-building.svg') }}" 
     alt="SEC Building" 
     class="img-fluid rounded shadow-lg animate-on-scroll">
```

### Với Animation Classes
```html
<!-- Fade in on scroll -->
<img src="{{ asset('images/courses/ielts-icon.svg') }}" 
     class="animate-on-scroll animate-delay-1">

<!-- Floating animation -->
<img src="{{ asset('images/hero/english-learning.svg') }}" 
     class="animate-float">

<!-- Pulse animation -->
<img src="{{ asset('images/courses/toeic-icon.svg') }}" 
     class="animate-pulse">
```

## 🎯 Tối Ưu Hóa

### Performance
- **SVG**: Tự động tối ưu cho web
- **Lazy Loading**: Sử dụng `loading="lazy"` cho images
- **Responsive**: Tự động scale theo screen size

### SEO
- **Alt Text**: Luôn có mô tả alt text
- **Semantic**: Tên file có ý nghĩa
- **Structured**: Tổ chức thư mục logic

### Accessibility
- **High Contrast**: Màu sắc có độ tương phản cao
- **Scalable**: Có thể phóng to mà không mất chất lượng
- **Alternative Text**: Mô tả đầy đủ cho screen readers

## 📱 Responsive Design

### Breakpoints
```css
/* Mobile */
@media (max-width: 768px) {
    .hero-image {
        max-width: 300px;
    }
}

/* Tablet */
@media (max-width: 1024px) {
    .course-icon {
        width: 60px;
        height: 60px;
    }
}
```

### Adaptive Images
```html
<!-- Responsive hero image -->
<img src="{{ asset('images/hero/english-learning.svg') }}" 
     class="img-fluid" 
     style="max-width: 100%; height: auto;">
```

## 🔄 Cập Nhật Hình Ảnh

### Thay Thế Hình Ảnh
1. Tạo file SVG mới với cùng tên
2. Đặt vào thư mục tương ứng
3. Giữ nguyên kích thước và tỷ lệ
4. Test trên nhiều device

### Thêm Hình Ảnh Mới
1. Tạo trong thư mục phù hợp
2. Sử dụng color scheme nhất quán
3. Thêm animation nếu cần
4. Cập nhật documentation

## 💡 Best Practices

### Design
- **Consistent Style**: Giữ phong cách nhất quán
- **Brand Colors**: Sử dụng màu sắc thương hiệu
- **Simple & Clean**: Thiết kế đơn giản, dễ hiểu
- **Professional**: Phù hợp với ngành giáo dục

### Technical
- **Optimize SVG**: Minify code SVG
- **Proper Naming**: Tên file rõ ràng, có ý nghĩa
- **Version Control**: Track changes trong Git
- **Backup**: Lưu trữ file gốc

### User Experience
- **Fast Loading**: Tối ưu kích thước file
- **Meaningful**: Hình ảnh có ý nghĩa, hỗ trợ nội dung
- **Accessible**: Dễ tiếp cận cho mọi người dùng
- **Engaging**: Tạo sự thu hút, tương tác

## 🚀 Kết Quả

Sau khi áp dụng hệ thống hình ảnh mới:

✅ **Thay thế hoàn toàn placeholder images**
✅ **Hình ảnh vector chất lượng cao**
✅ **Animation và hiệu ứng đặc biệt**
✅ **Responsive design tự động**
✅ **Performance tối ưu**
✅ **Brand identity nhất quán**
✅ **Professional appearance**

Trang web giờ đây có hình ảnh chuyên nghiệp, phù hợp với thương hiệu SEC và tạo trải nghiệm người dùng tuyệt vời! 🎉