# 🔐 Hướng Dẫn Sử Dụng Admin Panel - Thanh Cúc Du Học

## 📋 Mục Lục
- [Đăng Nhập Admin](#đăng-nhập-admin)
- [Dashboard](#dashboard)
- [Quản Lý Liên Hệ](#quản-lý-liên-hệ)
- [Quản Lý Kết Quả Học Viên](#quản-lý-kết-quả-học-viên)
- [Thông Tin Cá Nhân](#thông-tin-cá-nhân)
- [Tạo Admin User Mới](#tạo-admin-user-mới)
- [Backup & Bảo Mật](#backup--bảo-mật)

---

## 🚀 Đăng Nhập Admin

### Truy Cập Admin Panel
```
URL: https://thanhcuc.edu.vn/admin/login
```

### Tài Khoản Mặc Định
```
Email: admin@thanhcuc.edu.vn
Password: admin123

Email: manager@thanhcuc.edu.vn  
Password: manager123
```

> ⚠️ **Quan trọng**: Hãy đổi mật khẩu mặc định ngay sau lần đăng nhập đầu tiên!

---

## 📊 Dashboard

Dashboard cung cấp tổng quan về hệ thống:

### 📈 Thống Kê Tổng Quan
- **Tổng liên hệ**: Số lượng tất cả liên hệ từ website
- **Liên hệ mới**: Số liên hệ chưa được xử lý (trạng thái "Mới")
- **Đã liên hệ**: Số liên hệ đã được tư vấn viên liên hệ
- **Hoàn thành**: Số liên hệ đã hoàn tất quy trình

### 📊 Biểu Đồ Thống Kê
- Biểu đồ đường thể hiện số lượng liên hệ trong 6 tháng gần nhất
- Giúp theo dõi xu hướng và hiệu quả marketing

### ⚡ Thao Tác Nhanh
- **Xem tất cả liên hệ**: Chuyển đến trang quản lý liên hệ
- **Liên hệ mới**: Lọc chỉ hiển thị liên hệ mới
- **Xuất báo cáo CSV**: Tải xuống dữ liệu liên hệ
- **Cài đặt tài khoản**: Chỉnh sửa thông tin cá nhân

### 🕒 Liên Hệ Gần Đây
Hiển thị 5 liên hệ mới nhất với thông tin:
- Họ tên, điện thoại, email
- Chương trình quan tâm
- Trạng thái xử lý
- Thời gian đăng ký

---

## 📞 Quản Lý Liên Hệ

### 🔍 Tìm Kiếm & Lọc
- **Tìm kiếm**: Theo tên, email, điện thoại, chương trình
- **Lọc trạng thái**: Mới, Đã liên hệ, Hoàn thành
- **Xuất CSV**: Tải xuống dữ liệu theo bộ lọc

### 📋 Danh Sách Liên Hệ
Mỗi liên hệ hiển thị:
- ✅ Checkbox để chọn (cho thao tác hàng loạt)
- 👤 **Họ tên** và tin nhắn (nếu có)
- 📱 **Liên hệ**: Điện thoại (click để gọi), Email (click để gửi mail)
- 🎓 **Chương trình**: Badge hiển thị chương trình quan tâm
- 🏷️ **Trạng thái**: Badge màu theo trạng thái
- ⏰ **Thời gian**: Ngày giờ đăng ký và thời gian tương đối

### ⚡ Thao Tác Hàng Loạt
1. **Chọn liên hệ**: Tick checkbox các liên hệ cần xử lý
2. **Chọn thao tác**:
   - Đánh dấu đã liên hệ
   - Đánh dấu hoàn thành  
   - Xóa
3. **Thực hiện**: Click "Thực hiện" và xác nhận

### 👁️ Chi Tiết Liên Hệ
Click vào nút "👁️" để xem chi tiết:

#### Thông Tin Liên Hệ
- Họ tên, điện thoại, email
- Chương trình quan tâm
- Tin nhắn của khách hàng
- Thời gian đăng ký và liên hệ

#### Thao Tác Nhanh
- 📞 **Gọi điện**: Mở ứng dụng gọi điện
- 📧 **Gửi email**: Mở ứng dụng email
- 💬 **WhatsApp**: Mở WhatsApp với số điện thoại
- 💬 **Zalo**: Mở Zalo với số điện thoại

#### Quản Lý Trạng Thái
- Dropdown chọn trạng thái: Mới → Đã liên hệ → Hoàn thành
- Tự động cập nhật thời gian liên hệ khi chuyển sang "Đã liên hệ"

#### Ghi Chú Quản Trị
- Thêm ghi chú nội bộ về cuộc liên hệ
- Lưu thông tin tư vấn, kết quả, lịch hẹn
- Chỉ admin mới thấy được

#### Lịch Sử Timeline
- Đăng ký liên hệ
- Thời điểm được liên hệ
- Thời điểm hoàn thành

---

## 👤 Thông tin Cá Nhân

### ✏️ Cập Nhật Thông Tin
- **Họ và tên**: Tên hiển thị trong hệ thống
- **Email**: Email đăng nhập (phải duy nhất)
- **Mật khẩu mới**: Để trống nếu không đổi
- **Xác nhận mật khẩu**: Nhập lại mật khẩu mới

### ℹ️ Thông Tin Tài Khoản
- Avatar mặc định
- Vai trò (Admin/Manager)
- Trạng thái hoạt động
- Ngày tạo tài khoản
- Lần đăng nhập cuối

### 🔒 Bảo Mật Tài Khoản
**Mẹo bảo mật:**
- Sử dụng mật khẩu mạnh (ít nhất 8 ký tự)
- Kết hợp chữ hoa, chữ thường, số và ký tự đặc biệt
- Không chia sẻ thông tin đăng nhập
- Đăng xuất sau khi sử dụng xong
- Thường xuyên thay đổi mật khẩu

---

## 🔧 Tạo Admin User Mới

### Sử Dụng Command Line
```bash
# Tạo admin user với prompt tương tác
php artisan admin:create-user

# Tạo admin user với tham số
php artisan admin:create-user --name="Nguyễn Văn A" --email="admin@example.com" --password="password123" --role="admin"
```

### Các Vai Trò
- **admin**: Quyền đầy đủ
- **manager**: Quyền quản lý hạn chế

---

## 🏆 Quản Lý Kết Quả Học Viên

### 📊 Tổng Quan
Quản lý hai loại nội dung chính:
- **Bảng Điểm**: Kết quả thi của học viên (Goethe, TestDaF, DSH, Telc...)
- **Phản Hồi**: Đánh giá và cảm nhận của học viên về khóa học

### 🔍 Truy Cập
```
Admin Panel → Kết quả học viên
URL: /admin/student-results
```

### 📋 Danh Sách Kết Quả
Giao diện được chia thành 2 tabs:

#### 📊 Tab Bảng Điểm
- Hiển thị tất cả bảng điểm học viên
- Thông tin: Ảnh, tiêu đề, học viên, chứng chỉ, điểm số
- Trạng thái: Hiển thị/ẩn, nổi bật
- Thứ tự sắp xếp

#### 💬 Tab Phản Hồi
- Hiển thị tất cả phản hồi từ học viên
- Thông tin: Ảnh, tiêu đề, học viên, chứng chỉ, cấp độ
- Trạng thái: Hiển thị/ẩn, nổi bật
- Thứ tự sắp xếp

### ➕ Thêm Kết Quả Mới
1. Click "Thêm Mới"
2. Chọn loại: **Bảng Điểm** hoặc **Phản Hồi**
3. Điền thông tin:
   - **Tiêu đề**: Tên kết quả (bắt buộc)
   - **Mô tả**: Chi tiết về kết quả
   - **Tên học viên**: Tên người đạt kết quả
   - **Loại chứng chỉ**: Goethe, TestDaF, DSH, Telc, Khác
   - **Cấp độ**: A1, A2, B1, B2, C1, C2
   - **Điểm số**: Chỉ hiển thị khi chọn "Bảng Điểm"
4. **Upload ảnh**: Bắt buộc, định dạng JPG/PNG/GIF, tối đa 2MB
5. **Cài đặt**:
   - Thứ tự sắp xếp (số càng nhỏ càng hiển thị trước)
   - Hiển thị (bật/tắt)
   - Nổi bật (đánh dấu quan trọng)
6. Click "Lưu Kết Quả"

### ✏️ Chỉnh Sửa Kết Quả
1. Click nút "✏️" (bút chì) trên kết quả cần sửa
2. Thay đổi thông tin cần thiết
3. Upload ảnh mới (không bắt buộc)
4. Click "Cập Nhật"

### 👁️ Xem Chi Tiết
1. Click nút "👁️" (mắt) để xem chi tiết
2. Thông tin hiển thị đầy đủ:
   - Ảnh kết quả
   - Thông tin chi tiết
   - Trạng thái hiện tại
   - Thời gian tạo/cập nhật
3. **Thao tác nhanh**:
   - Bật/tắt hiển thị
   - Bật/tắt nổi bật
   - Chỉnh sửa

### ⚡ Thao Tác Hàng Loạt
1. **Chọn kết quả**: Tick checkbox các kết quả cần thao tác
2. **Chọn thao tác**:
   - **Kích hoạt**: Hiển thị các kết quả đã chọn
   - **Ẩn**: Ẩn các kết quả đã chọn
   - **Nổi bật**: Đánh dấu nổi bật
   - **Xóa**: Xóa các kết quả đã chọn
3. **Thực hiện**: Click nút thao tác tương ứng

### 🎯 Quản Lý Trạng Thái
- **Nút mắt**: Bật/tắt hiển thị trên frontend
- **Nút sao**: Đánh dấu nổi bật (hiển thị ở đầu trang)
- **Input số**: Thay đổi thứ tự sắp xếp

### 📱 Frontend Integration
Kết quả được hiển thị tự động tại:
```
/ket-qua-hoc-vien
```

**Hiển thị:**
- Kết quả nổi bật (3 cái đầu)
- Bảng điểm học viên (6 cái)
- Phản hồi học viên (6 cái)
- Thống kê tổng quan

### 🔧 Lưu Ý Quan Trọng
- **Ảnh**: Bắt buộc khi tạo mới, không bắt buộc khi sửa
- **Validation**: Tất cả trường bắt buộc phải được điền
- **Phân loại**: Tự động theo loại đã chọn
- **Trạng thái**: Chỉ kết quả "Hiển thị" mới xuất hiện trên frontend

---

## 💾 Backup & Bảo Mật

### 📊 Xuất Dữ Liệu
1. **Xuất tất cả liên hệ**:
   - Vào "Quản lý liên hệ"
   - Click "Xuất CSV"

2. **Xuất theo bộ lọc**:
   - Áp dụng bộ lọc (trạng thái, tìm kiếm)
   - Click "Xuất CSV"

### 🔐 Bảo Mật Hệ Thống
- **Middleware xác thực**: Tự động redirect nếu chưa đăng nhập
- **Session timeout**: Tự động đăng xuất sau thời gian không hoạt động
- **Password hashing**: Mật khẩu được mã hóa bằng bcrypt
- **CSRF protection**: Bảo vệ khỏi tấn công CSRF

### 🚨 Khắc Phục Sự Cố

#### Quên Mật Khẩu Admin
```bash
# Tạo admin user mới
php artisan admin:create-user

# Hoặc reset trong database
# UPDATE admin_users SET password = '$2y$10$...' WHERE email = 'admin@thanhcuc.edu.vn';
```

#### Lỗi 500 Internal Server Error
1. Kiểm tra log: `storage/logs/laravel.log`
2. Kiểm tra quyền thư mục: `storage/` và `bootstrap/cache/`
3. Chạy lại migration: `php artisan migrate`

#### Không Thể Đăng Nhập
1. Kiểm tra database connection
2. Kiểm tra bảng `admin_users` có dữ liệu
3. Chạy seeder: `php artisan db:seed --class=AdminUserSeeder`

---

## 📱 Responsive Design

Admin panel được thiết kế responsive, hoạt động tốt trên:
- 💻 **Desktop**: Layout đầy đủ với sidebar
- 📱 **Tablet**: Layout 2 cột, sidebar thu gọn
- 📱 **Mobile**: Layout 1 cột, menu hamburger

---

## 🎨 Giao Diện

### 🎨 Color Scheme
- **Primary**: #F9D200 (Vàng rực rỡ)
- **Secondary**: #F57F25 (Cam ấm)
- **Success**: #3EB850 (Xanh lá)
- **Dark**: #015862 (Xanh dương đậm)

### 📊 Components
- **Cards**: Bo góc 15px, shadow mềm
- **Buttons**: Gradient background, hover effects
- **Tables**: Hover effects, responsive
- **Forms**: Border radius 8px, focus states
- **Badges**: Rounded, màu theo trạng thái

---

## 📞 Hỗ Trợ

Nếu gặp vấn đề khi sử dụng admin panel:

1. **Kiểm tra log**: `storage/logs/laravel.log`
2. **Liên hệ developer**: Cung cấp thông tin lỗi chi tiết
3. **Backup dữ liệu**: Thường xuyên xuất CSV để backup

---

## 🔄 Cập Nhật Hệ Thống

Khi có cập nhật mới:
```bash
# Pull code mới
git pull origin main

# Cập nhật dependencies
composer install

# Chạy migration (nếu có)
php artisan migrate

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

**🎓 Chúc bạn sử dụng admin panel hiệu quả để quản lý du học nghề Đức!**