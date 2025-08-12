<!-- Exam Registration Modal -->
<div class="modal fade" id="examRegistrationModal" tabindex="-1" aria-labelledby="examRegistrationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="examRegistrationModalLabel">
                    <i class="fas fa-calendar-check me-2"></i>
                    Đăng Ký Lịch Thi
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Exam Schedule Info -->
                <div class="row mb-4" id="examScheduleInfo">
                    <div class="col-md-6">
                        <h6 class="text-primary mb-2">
                            <i class="fas fa-info-circle me-2"></i>
                            Thông tin lịch thi
                        </h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="mb-2">
                                    <strong>Loại thi:</strong>
                                    <span id="modalExamType" class="badge bg-primary ms-2"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Trình độ:</strong>
                                    <span id="modalExamLevel" class="badge bg-secondary ms-2"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Ngày thi:</strong>
                                    <span id="modalExamDate" class="text-success"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Giờ thi:</strong>
                                    <span id="modalExamTime"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Lệ phí:</strong>
                                    <span id="modalExamFee" class="text-primary fw-bold"></span>
                                </div>
                                <div class="mb-0">
                                    <strong>Địa điểm:</strong>
                                    <span id="modalExamLocation"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-primary mb-2">
                            <i class="fas fa-chart-bar me-2"></i>
                            Tình trạng đăng ký
                        </h6>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="mb-2">
                                    <strong>Số lượng tối đa:</strong>
                                    <span id="modalMaxParticipants"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Đã đăng ký:</strong>
                                    <span id="modalCurrentParticipants"></span>
                                </div>
                                <div class="mb-2">
                                    <strong>Còn chỗ:</strong>
                                    <span id="modalAvailableSlots" class="text-success fw-bold"></span>
                                </div>
                                <div class="mb-0">
                                    <strong>Hạn đăng ký:</strong>
                                    <span id="modalRegistrationDeadline"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Form -->
                <form id="examRegistrationForm">
                    <input type="hidden" id="examScheduleId" name="exam_schedule_id">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fullName" class="form-label">
                                Họ và tên <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="fullName" name="full_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">
                                Số điện thoại <span class="text-danger">*</span>
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="birthDate" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="birthDate" name="birth_date">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="idCard" class="form-label">CMND/CCCD</label>
                            <input type="text" class="form-control" id="idCard" name="id_card">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="notes" class="form-label">Ghi chú thêm</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" 
                                  placeholder="Ghi chú thêm về yêu cầu, lưu ý..."></textarea>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Lưu ý:</strong> Sau khi đăng ký, chúng tôi sẽ liên hệ để xác nhận thông tin và hướng dẫn các bước tiếp theo.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>
                    Đóng
                </button>
                <button type="button" class="btn btn-primary" id="submitRegistration">
                    <i class="fas fa-paper-plane me-2"></i>
                    Đăng ký ngay
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">
                    <i class="fas fa-check-circle me-2"></i>
                    Đăng ký thành công!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <h5 class="text-success">Chúc mừng!</h5>
                <p>Bạn đã đăng ký thành công lịch thi. Chúng tôi sẽ liên hệ sớm nhất để xác nhận thông tin.</p>
                <div class="alert alert-info">
                    <i class="fas fa-phone me-2"></i>
                    <strong>Liên hệ:</strong> 0123 456 789
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                    <i class="fas fa-check me-2"></i>
                    Đã hiểu
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Có lỗi xảy ra
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-triangle fa-3x text-danger mb-3"></i>
                <h5 class="text-danger">Đăng ký không thành công</h5>
                <p id="errorMessage">Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>
                    Đóng
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to open registration modal
    window.openExamRegistrationModal = function(examScheduleId) {
        // Fetch exam schedule details
        fetch(`/api/lich-thi/${examScheduleId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const exam = data.exam_schedule;
                    
                    // Fill exam schedule info
                    document.getElementById('examScheduleId').value = exam.id;
                    document.getElementById('modalExamType').textContent = exam.exam_type;
                    document.getElementById('modalExamLevel').textContent = exam.level || 'N/A';
                    document.getElementById('modalExamDate').textContent = exam.exam_date;
                    document.getElementById('modalExamTime').textContent = exam.exam_time || 'Chưa có';
                    document.getElementById('modalExamFee').textContent = exam.fee;
                    document.getElementById('modalExamLocation').textContent = exam.location;
                    document.getElementById('modalMaxParticipants').textContent = exam.max_participants || 'Không giới hạn';
                    document.getElementById('modalCurrentParticipants').textContent = exam.current_participants;
                    document.getElementById('modalAvailableSlots').textContent = exam.available_slots || 'Không giới hạn';
                    document.getElementById('modalRegistrationDeadline').textContent = exam.is_registration_open ? 'Còn mở' : 'Đã đóng';
                    
                    // Show modal
                    const modal = new bootstrap.Modal(document.getElementById('examRegistrationModal'));
                    modal.show();
                } else {
                    alert('Không thể tải thông tin lịch thi');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Có lỗi xảy ra khi tải thông tin lịch thi');
            });
    };

    // Handle form submission
    document.getElementById('submitRegistration').addEventListener('click', function() {
        const form = document.getElementById('examRegistrationForm');
        const formData = new FormData(form);
        
        // Show loading state
        this.disabled = true;
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Đang xử lý...';
        
        fetch('/dang-ky-lich-thi', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(Object.fromEntries(formData))
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide registration modal
                bootstrap.Modal.getInstance(document.getElementById('examRegistrationModal')).hide();
                
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
                
                // Reset form
                form.reset();
            } else {
                // Show error modal
                document.getElementById('errorMessage').textContent = data.message || 'Có lỗi xảy ra khi đăng ký';
                const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('errorMessage').textContent = 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.';
            const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        })
        .finally(() => {
            // Reset button state
            this.disabled = false;
            this.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Đăng ký ngay';
        });
    });
});
</script>
