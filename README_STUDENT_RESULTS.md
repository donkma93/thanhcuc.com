# Hệ Thống Quản Lý Kết Quả Học Viên

## Tổng Quan

Hệ thống quản lý kết quả học viên cho phép admin quản lý hai loại nội dung chính:
- **Bảng Điểm**: Kết quả thi của học viên (Goethe, TestDaF, DSH, Telc...)
- **Phản Hồi**: Đánh giá và cảm nhận của học viên về khóa học

## Tính Năng Chính

### 1. Quản Lý CRUD
- ✅ **Create**: Thêm mới kết quả học viên
- ✅ **Read**: Xem danh sách và chi tiết
- ✅ **Update**: Chỉnh sửa thông tin
- ✅ **Delete**: Xóa kết quả

### 2. Quản Lý Trạng Thái
- **Hiển thị/Ẩn**: Bật/tắt hiển thị trên frontend
- **Nổi bật**: Đánh dấu kết quả quan trọng
- **Thứ tự sắp xếp**: Tùy chỉnh thứ tự hiển thị

### 3. Thao Tác Hàng Loạt
- Kích hoạt/ẩn nhiều kết quả cùng lúc
- Đánh dấu nổi bật hàng loạt
- Xóa nhiều kết quả

### 4. Frontend Integration
- Hiển thị động từ database
- Phân loại theo loại (bảng điểm/phản hồi)
- Hiển thị kết quả nổi bật

## Cấu Trúc Database

### Bảng `student_results`
```sql
- id: Primary key
- title: Tiêu đề kết quả
- description: Mô tả chi tiết
- type: Loại (score/feedback)
- image_path: Đường dẫn ảnh
- student_name: Tên học viên
- certificate_type: Loại chứng chỉ
- level: Cấp độ (A1, A2, B1, B2, C1, C2)
- score: Điểm số (chỉ cho bảng điểm)
- sort_order: Thứ tự sắp xếp
- is_active: Trạng thái hiển thị
- is_featured: Đánh dấu nổi bật
- created_at, updated_at: Timestamps
```

## Routes

### Admin Routes
```
GET    /admin/student-results              # Danh sách
GET    /admin/student-results/create       # Form thêm mới
POST   /admin/student-results              # Lưu mới
GET    /admin/student-results/{id}         # Xem chi tiết
GET    /admin/student-results/{id}/edit    # Form chỉnh sửa
PUT    /admin/student-results/{id}         # Cập nhật
DELETE /admin/student-results/{id}         # Xóa
PATCH  /admin/student-results/{id}/toggle-status    # Bật/tắt hiển thị
PATCH  /admin/student-results/{id}/toggle-featured  # Bật/tắt nổi bật
POST   /admin/student-results/update-order          # Cập nhật thứ tự
POST   /admin/student-results/bulk-action           # Thao tác hàng loạt
```

### Frontend Routes
```
GET    /ket-qua-hoc-vien                   # Trang kết quả học viên
```

## Sử Dụng

### 1. Thêm Kết Quả Mới
1. Vào Admin → Kết Quả Học Viên
2. Click "Thêm Mới"
3. Chọn loại: Bảng Điểm hoặc Phản Hồi
4. Điền thông tin cần thiết
5. Upload ảnh (bắt buộc)
6. Cài đặt trạng thái và thứ tự
7. Click "Lưu Kết Quả"

### 2. Chỉnh Sửa Kết Quả
1. Vào Admin → Kết Quả Học Viên
2. Click nút "Chỉnh sửa" (biểu tượng bút chì)
3. Thay đổi thông tin cần thiết
4. Upload ảnh mới (không bắt buộc)
5. Click "Cập Nhật"

### 3. Quản Lý Trạng Thái
- **Nút mắt**: Bật/tắt hiển thị
- **Nút sao**: Đánh dấu nổi bật
- **Input số**: Thay đổi thứ tự sắp xếp

### 4. Thao Tác Hàng Loạt
1. Chọn các kết quả cần thao tác
2. Click nút thao tác tương ứng:
   - Kích hoạt: Hiển thị các kết quả đã chọn
   - Ẩn: Ẩn các kết quả đã chọn
   - Nổi bật: Đánh dấu nổi bật
   - Xóa: Xóa các kết quả đã chọn

## Dữ Liệu Mẫu

Hệ thống đã có sẵn dữ liệu mẫu bao gồm:
- 5 bảng điểm mẫu (Goethe, TestDaF, DSH, Telc)
- 4 phản hồi mẫu từ học viên

### Chạy Seeder
```bash
php artisan db:seed --class=StudentResultSeeder
```

## Lưu Ý Quan Trọng

### 1. Ảnh
- Định dạng: JPG, PNG, GIF
- Kích thước tối đa: 2MB
- Lưu trong thư mục: `storage/app/public/student-results/`

### 2. Validation
- Tiêu đề: Bắt buộc, tối đa 255 ký tự
- Loại: Bắt buộc (score hoặc feedback)
- Ảnh: Bắt buộc khi tạo mới
- Điểm số: Chỉ hiển thị khi loại là "score"

### 3. Frontend
- Kết quả chỉ hiển thị khi `is_active = true`
- Kết quả nổi bật hiển thị ở đầu trang
- Sắp xếp theo `sort_order` và `created_at`

## Troubleshooting

### 1. Ảnh không hiển thị
- Kiểm tra symbolic link: `php artisan storage:link`
- Kiểm tra quyền thư mục storage
- Kiểm tra đường dẫn ảnh trong database

### 2. Lỗi validation
- Kiểm tra tất cả trường bắt buộc
- Kiểm tra định dạng và kích thước ảnh
- Kiểm tra loại dữ liệu (score/feedback)

### 3. Không thể xóa
- Kiểm tra quyền admin
- Kiểm tra CSRF token
- Kiểm tra route permissions

## Tương Lai

### Tính Năng Dự Kiến
- [ ] Export dữ liệu ra Excel/PDF
- [ ] Import dữ liệu từ file Excel
- [ ] Thống kê và báo cáo
- [ ] API cho mobile app
- [ ] Tích hợp với hệ thống học viên

### Cải Tiến
- [ ] Cache dữ liệu để tăng tốc độ
- [ ] Lazy loading cho ảnh
- [ ] Responsive design cho mobile
- [ ] Dark mode
- [ ] Đa ngôn ngữ

## Hỗ Trợ

Nếu gặp vấn đề, vui lòng:
1. Kiểm tra log Laravel: `storage/logs/laravel.log`
2. Kiểm tra console browser
3. Kiểm tra network tab trong DevTools
4. Liên hệ admin để được hỗ trợ

---

**Phiên bản**: 1.0.0  
**Cập nhật lần cuối**: 13/08/2025  
**Tác giả**: AI Assistant
