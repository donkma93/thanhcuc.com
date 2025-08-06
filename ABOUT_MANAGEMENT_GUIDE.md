# Hướng dẫn Quản lý phần "Về chúng tôi"

## Tổng quan

Phần "Về chúng tôi" đã được tích hợp vào hệ thống quản trị với khả năng chỉnh sửa toàn bộ nội dung thông qua giao diện admin.

## Tính năng

### 1. Quản lý thông tin cơ bản
- **Tiêu đề trang**: Tiêu đề chính hiển thị trên header
- **Mô tả ngắn**: Mô tả hiển thị dưới tiêu đề
- **Tiêu đề tổng quan**: Tiêu đề phần giới thiệu trung tâm
- **Nội dung tổng quan**: Nội dung chi tiết về trung tâm (hỗ trợ HTML)

### 2. Sứ mệnh & Tầm nhìn
- **Sứ mệnh**: Sứ mệnh của trung tâm
- **Tầm nhìn**: Tầm nhìn phát triển

### 3. Giá trị cốt lõi (4 giá trị)
Mỗi giá trị bao gồm:
- **Icon**: Mã FontAwesome (ví dụ: `fas fa-heart`)
- **Tiêu đề**: Tên giá trị
- **Mô tả**: Mô tả chi tiết

### 4. Thành tựu đạt được (4 thành tựu)
Mỗi thành tựu bao gồm:
- **Số liệu**: Con số thống kê (ví dụ: `30,000+`)
- **Tiêu đề**: Tên thành tựu
- **Mô tả**: Mô tả chi tiết

### 5. Hệ thống cơ sở (4 cơ sở)
Mỗi cơ sở bao gồm:
- **Tên cơ sở**: Tên của cơ sở
- **Địa chỉ**: Địa chỉ chi tiết
- **Điện thoại**: Số điện thoại liên hệ
- **Mô tả**: Mô tả về cơ sở

### 6. Call-to-Action
- **Tiêu đề CTA**: Tiêu đề kêu gọi hành động
- **Mô tả CTA**: Nội dung kêu gọi hành động

## Cách sử dụng

### Truy cập trang quản lý
1. Đăng nhập vào admin panel
2. Trong menu bên trái, click vào **"Về chúng tôi"**
3. Trang quản lý sẽ hiển thị với tất cả các trường thông tin

### Chỉnh sửa thông tin
1. **Thông tin cơ bản**: Chỉnh sửa trực tiếp trong các ô input/textarea
2. **Giá trị cốt lõi**: Chỉnh sửa từng giá trị trong các form riêng biệt
3. **Thành tựu**: Cập nhật số liệu và mô tả cho từng thành tựu
4. **Cơ sở**: Cập nhật thông tin liên hệ cho từng cơ sở

### Lưu thay đổi
1. Sau khi chỉnh sửa, click nút **"Lưu Thông tin"**
2. Hệ thống sẽ validate dữ liệu và hiển thị thông báo kết quả
3. Trang web sẽ tự động cập nhật nội dung mới

### Khôi phục mặc định
1. Click nút **"Khôi phục mặc định"** ở góc trên bên phải
2. Xác nhận trong popup
3. Tất cả dữ liệu sẽ được reset về giá trị ban đầu

### Xem trước
- Click nút **"Xem trang"** để mở trang "Về chúng tôi" trong tab mới
- Kiểm tra hiển thị trên frontend

## Lưu ý kỹ thuật

### Dữ liệu lưu trữ
- Tất cả dữ liệu được lưu trong bảng `settings` với group = `about`
- Dữ liệu phức tạp (giá trị cốt lõi, thành tựu, cơ sở) được lưu dưới dạng JSON

### Validation
- Các trường bắt buộc được đánh dấu bằng dấu `*` đỏ
- Hệ thống sẽ kiểm tra tính hợp lệ của dữ liệu JSON
- Hiển thị lỗi chi tiết nếu có vấn đề

### Backup
- Dữ liệu được tự động backup trong database
- Có thể khôi phục về mặc định bất cứ lúc nào

## Cấu trúc file

### Controller
- `app/Http/Controllers/Admin/AboutController.php`

### Views
- `resources/views/admin/about/index.blade.php`

### Seeder
- `database/seeders/AboutSettingsSeeder.php`

### Routes
- `admin/about` - Trang quản lý
- `admin/about` (PUT) - Cập nhật dữ liệu
- `admin/about/reset` - Khôi phục mặc định

## Troubleshooting

### Lỗi thường gặp
1. **Lỗi JSON**: Kiểm tra format JSON trong các trường phức tạp
2. **Lỗi validation**: Đảm bảo các trường bắt buộc được điền đầy đủ
3. **Lỗi hiển thị**: Xóa cache bằng `php artisan cache:clear`

### Khôi phục dữ liệu
Nếu có vấn đề, chạy lệnh sau để khôi phục:
```bash
php artisan db:seed --class=AboutSettingsSeeder
```

## Kết luận

Hệ thống quản lý "Về chúng tôi" cung cấp giao diện thân thiện để chỉnh sửa toàn bộ nội dung trang mà không cần kiến thức kỹ thuật. Tất cả thay đổi được áp dụng ngay lập tức và có thể khôi phục dễ dàng.