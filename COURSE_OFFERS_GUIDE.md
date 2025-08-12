# Hướng dẫn Quản lý Ưu đãi Khóa học

## Tổng quan
Hệ thống quản lý ưu đãi khóa học cho phép admin tạo, chỉnh sửa và quản lý các ưu đãi hiển thị trên trang chủ website.

## Tính năng chính

### 1. Quản lý Ưu đãi
- **Tạo ưu đãi mới**: Thêm ưu đãi với tiêu đề, mô tả, icon, badge
- **Chỉnh sửa ưu đãi**: Cập nhật thông tin ưu đãi hiện có
- **Xóa ưu đãi**: Xóa ưu đãi không còn cần thiết
- **Sắp xếp thứ tự**: Điều chỉnh thứ tự hiển thị của các ưu đãi
- **Bật/tắt hiển thị**: Ẩn hoặc hiện ưu đãi trên trang chủ

### 2. Tùy chỉnh giao diện
- **Icon**: Sử dụng FontAwesome icons (ví dụ: fas fa-gift, fas fa-book)
- **Badge**: Thêm badge với text và màu sắc tùy chỉnh
- **Màu sắc**: Chọn màu cho badge (success, primary, info, warning, danger, secondary, dark)

## Cách sử dụng

### Truy cập quản lý ưu đãi
1. Đăng nhập vào admin panel
2. Vào menu "Ưu đãi khóa học" trong sidebar
3. Quản lý các ưu đãi hiện có hoặc tạo mới

### Tạo ưu đãi mới
1. Click "Thêm Ưu đãi Mới"
2. Điền thông tin:
   - **Tiêu đề**: Tên ưu đãi (bắt buộc)
   - **Mô tả**: Chi tiết ưu đãi (bắt buộc)
   - **Icon**: FontAwesome icon (tùy chọn)
   - **Badge Text**: Text hiển thị trên badge (tùy chọn)
   - **Badge Color**: Màu sắc badge
   - **Thứ tự hiển thị**: Số càng nhỏ hiển thị càng trước
   - **Hiển thị trên trang chủ**: Bật/tắt ưu đãi
3. Click "Lưu Ưu đãi"

### Chỉnh sửa ưu đãi
1. Click icon "Chỉnh sửa" bên cạnh ưu đãi
2. Thay đổi thông tin cần thiết
3. Click "Cập nhật Ưu đãi"

### Xóa ưu đãi
1. Click icon "Xóa" bên cạnh ưu đãi
2. Xác nhận xóa trong hộp thoại

## Hiển thị trên trang chủ

### Cách hoạt động
- Hệ thống tự động lấy 4 ưu đãi đầu tiên theo thứ tự sắp xếp
- Chỉ hiển thị các ưu đãi có trạng thái "Hoạt động"
- Nếu không có ưu đãi nào, sẽ hiển thị ưu đãi mặc định

### Tùy chỉnh hiển thị
- **Icon**: Hiển thị icon FontAwesome nếu có
- **Tiêu đề**: Hiển thị với màu tương ứng với badge color
- **Mô tả**: Text mô tả chi tiết ưu đãi
- **Badge**: Hiển thị badge với text và màu sắc đã cấu hình

## Ví dụ ưu đãi mẫu

### 1. Giảm học phí
- **Tiêu đề**: Giảm 30% học phí
- **Mô tả**: Ưu đãi đặc biệt cho khóa học Tiếng Đức cơ bản và nâng cao
- **Icon**: fas fa-percentage
- **Badge**: Tiết kiệm 3.000.000đ (màu đỏ)

### 2. Tặng tài liệu
- **Tiêu đề**: Tặng tài liệu miễn phí
- **Mô tả**: BỘ SÁCH TIẾNG ĐỨC CHUYÊN NGHIỆP + AUDIO CD TRỊ GIÁ 800.000Đ
- **Icon**: fas fa-book
- **Badge**: Miễn phí (màu xanh lá)

### 3. Học thử miễn phí
- **Tiêu đề**: Học thử 2 buổi miễn phí
- **Mô tả**: Trải nghiệm phương pháp giảng dạy trước khi quyết định đăng ký
- **Icon**: fas fa-chalkboard-teacher
- **Badge**: Không mất phí (màu xanh nhạt)

### 4. Cam kết đầu ra
- **Tiêu đề**: Cam kết đầu ra A2-B1
- **Mô tả**: Không đạt chuẩn sẽ được học lại miễn phí hoặc hoàn tiền 100%
- **Icon**: fas fa-certificate
- **Badge**: Bảo đảm (màu vàng)

## Lưu ý kỹ thuật

### Database
- Bảng: `course_offers`
- Migration: `2025_08_12_111517_create_course_offers_table.php`
- Model: `App\Models\CourseOffer`

### Routes
- Index: `admin/course-offers`
- Create: `admin/course-offers/create`
- Edit: `admin/course-offers/{id}/edit`
- Show: `admin/course-offers/{id}`
- Store: `admin/course-offers` (POST)
- Update: `admin/course-offers/{id}` (PUT)
- Delete: `admin/course-offers/{id}` (DELETE)

### Controller
- File: `app/Http/Controllers/Admin/CourseOfferController.php`
- Methods: index, create, store, show, edit, update, destroy

### Views
- Index: `resources/views/admin/course-offers/index.blade.php`
- Create: `resources/views/admin/course-offers/create.blade.php`
- Edit: `resources/views/admin/course-offers/edit.blade.php`
- Show: `resources/views/admin/course-offers/show.blade.php`

## Tương lai

### Tính năng có thể mở rộng
- **Thời gian ưu đãi**: Thêm ngày bắt đầu và kết thúc ưu đãi
- **Điều kiện áp dụng**: Chỉ áp dụng cho khóa học cụ thể
- **Mã giảm giá**: Tích hợp với hệ thống mã giảm giá
- **Thống kê**: Theo dõi hiệu quả của từng ưu đãi
- **Email marketing**: Tự động gửi email thông báo ưu đãi
