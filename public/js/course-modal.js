// Global course modal handler available on all pages
window.openCourseModal = function(courseId, courseName = null) {
    const modalEl = document.getElementById('courseModal');
    const bodyEl = document.getElementById('courseModalBody');
    const titleEl = document.getElementById('courseModalLabel');

    if (!modalEl || !bodyEl || !titleEl) {
        console.error('Course modal elements not found');
        return;
    }

    // Set title if provided
    if (courseName) {
        titleEl.textContent = courseName;
    }

    // Loading state
    bodyEl.innerHTML = `
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Đang tải thông tin khóa học...</p>
        </div>
    `;

    // Show modal
    const modal = new bootstrap.Modal(modalEl);
    modal.show();

    // Fetch course details
    fetch(`/api/courses/${courseId}`)
        .then(response => response.json())
        .then(data => {
            if (!data || !data.course) {
                bodyEl.innerHTML = `
                    <div class="text-center text-danger py-4">
                        <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                        <p>Không thể tải thông tin khóa học. Vui lòng thử lại sau.</p>
                    </div>
                `;
                return;
            }

            const course = data.course;
            titleEl.textContent = course.name || courseName || 'Chi tiết khóa học';

            // Normalize image URL
            const imagePath = course.image || '';
            const isAbsolute = /^https?:\/\//i.test(imagePath);
            const imageUrl = imagePath
                ? (isAbsolute ? imagePath : `/storage/${imagePath.replace(/^\/+/, '')}`)
                : '';

            // Normalize duration
            const duration = course.duration_hours ?? course.duration ?? null;

            // Normalize price
            const priceValue = (typeof course.price === 'string') ? parseFloat(course.price) : course.price;
            const price = (priceValue !== null && priceValue !== undefined && !Number.isNaN(priceValue))
                ? new Intl.NumberFormat('vi-VN').format(course.price) + ' đ'
                : 'Liên hệ';

            // Normalize features (array or JSON string)
            let features = [];
            if (Array.isArray(course.features)) {
                features = course.features;
            } else if (typeof course.features === 'string' && course.features.trim()) {
                try { features = JSON.parse(course.features); } catch (_) { features = []; }
            }

            bodyEl.innerHTML = `
                <div class="row g-4">
                    <div class="col-md-4">
                        ${imageUrl ? `
                            <img src="${imageUrl}" alt="${course.name || ''}" class="img-fluid rounded shadow-sm">
                        ` : `
                            <div class="d-flex align-items-center justify-content-center bg-light rounded" style="height: 220px;">
                                <i class="fas fa-book fa-3x text-muted"></i>
                            </div>
                        `}
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-primary mb-3">${course.name || ''}</h4>
                        <p class="text-muted mb-3">${course.short_description || course.description || ''}</p>

                        <div class="row g-3 mb-3">
                            ${duration ? `
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-clock text-primary me-2"></i>
                                        <span><strong>Thời lượng:</strong> ${duration} giờ</span>
                                    </div>
                                </div>
                            ` : ''}
                            ${course.level ? `
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-signal text-primary me-2"></i>
                                        <span><strong>Trình độ:</strong> ${course.level}</span>
                                    </div>
                                </div>
                            ` : ''}
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-money-bill text-primary me-2"></i>
                                    <span><strong>Học phí:</strong> ${price}</span>
                                </div>
                            </div>
                        </div>

                        ${features.length ? `
                            <div class="mb-3">
                                <h6 class="fw-bold">Đặc điểm nổi bật</h6>
                                <div class="row">
                                    ${features.map(f => `
                                        <div class="col-6 mb-2">
                                            <span class="badge bg-light text-dark">
                                                <i class="fas fa-check text-success me-1"></i>${f}
                                            </span>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                        ` : ''}

                        <div class="d-flex gap-2">
                            <a href="${(window.location.origin || '')}/lien-he" class="btn btn-primary">
                                <i class="fas fa-phone me-2"></i>Nhận tư vấn
                            </a>
                            <a href="${(window.location.origin || '')}/lich-khai-giang" class="btn btn-outline-primary">
                                <i class="fas fa-calendar-alt me-2"></i>Xem lịch khai giảng
                            </a>
                        </div>
                    </div>
                </div>
            `;
        })
        .catch(error => {
            console.error('Error fetching course details:', error);
            bodyEl.innerHTML = `
                <div class="text-center text-danger py-4">
                    <i class="fas fa-exclamation-triangle fa-2x mb-3"></i>
                    <p>Đã xảy ra lỗi khi tải thông tin khóa học.</p>
                </div>
            `;
        });
};

