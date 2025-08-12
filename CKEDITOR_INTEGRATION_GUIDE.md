# Hướng dẫn tích hợp CKEditor cho phần quản trị khóa học

## Tổng quan
Đã tích hợp CKEditor 5 vào phần quản trị viên cho mục mô tả khóa học, cho phép định dạng văn bản với các công cụ như in đậm, in nghiêng, danh sách, v.v.

## Các file đã được cập nhật

### 1. Views (Blade Templates)
- `resources/views/admin/courses/create.blade.php` - Form tạo khóa học mới
- `resources/views/admin/courses/edit.blade.php` - Form chỉnh sửa khóa học
- `resources/views/admin/courses/show.blade.php` - Hiển thị chi tiết khóa học
- `resources/views/home.blade.php` - Hiển thị modal khóa học ở frontend

### 2. CSS Styling
- `public/css/admin.css` - CSS tùy chỉnh cho CKEditor

### 3. JavaScript Configuration
- `public/admin/js/ckeditor-config.js` - Cấu hình CKEditor

## Tính năng CKEditor

### Thanh công cụ bao gồm:
- **Định dạng văn bản**: In đậm (B), In nghiêng (I), Gạch chân (U), Gạch ngang (S)
- **Danh sách**: Danh sách có dấu đầu dòng, Danh sách số
- **Liên kết**: Thêm link, Trích dẫn
- **Thao tác**: Hoàn tác, Làm lại

### Tính năng bổ sung:
- **Auto-resize**: Tự động điều chỉnh chiều cao theo nội dung
- **Fallback**: Nếu CKEditor không tải được, sẽ sử dụng textarea thông thường
- **Styling**: Giao diện phù hợp với theme admin
- **Tiếng Việt**: Hỗ trợ ngôn ngữ tiếng Việt

## Cách sử dụng

### 1. Tạo khóa học mới
1. Vào Admin Panel > Khóa học > Thêm mới
2. Điền thông tin cơ bản
3. Trong phần "Mô tả chi tiết", sử dụng thanh công cụ CKEditor để định dạng văn bản
4. Lưu khóa học

### 2. Chỉnh sửa khóa học
1. Vào Admin Panel > Khóa học > Chọn khóa học cần sửa
2. Chỉnh sửa mô tả với CKEditor
3. Lưu thay đổi

### 3. Xem kết quả
- Trong admin panel: HTML content sẽ được hiển thị đúng định dạng
- Ở frontend: HTML content sẽ được hiển thị trong modal khóa học

## Lưu ý kỹ thuật

### Bảo mật
- CKEditor đã được cấu hình để loại bỏ các plugin không cần thiết (upload image, etc.)
- HTML content được lưu trực tiếp vào database
- Khi hiển thị, sử dụng `{!! $content !!}` để render HTML

### Performance
- CKEditor được load từ CDN để tối ưu tốc độ
- File cấu hình riêng biệt để dễ quản lý
- Fallback mechanism nếu CDN không khả dụng

### Responsive
- CKEditor responsive trên mobile
- Chiều cao tối thiểu 150px trên mobile
- Toolbar compact trên màn hình nhỏ

## Troubleshooting

### CKEditor không hiển thị
1. Kiểm tra console browser để xem lỗi
2. Đảm bảo CDN CKEditor có thể truy cập
3. Kiểm tra file `ckeditor-config.js` có được load không

### Nội dung không lưu được
1. Kiểm tra validation rules trong controller
2. Đảm bảo field `description` được include trong `$fillable` của model
3. Kiểm tra database column có hỗ trợ text dài không

### Hiển thị HTML tags
1. Đảm bảo sử dụng `{!! $content !!}` thay vì `{{ $content }}`
2. Kiểm tra không có `e()` function được áp dụng

## Cập nhật trong tương lai

### Có thể thêm:
- Plugin upload ảnh
- Bảng (table) support
- Màu sắc text
- Font size options
- Code highlighting

### Tùy chỉnh thêm:
- Thêm/remove toolbar items
- Thay đổi theme
- Custom plugins
- Integration với file manager
