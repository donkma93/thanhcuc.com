/**
 * Messagebox AJAX Helper
 * Handles AJAX responses and displays messageboxes automatically
 */

// Extend jQuery AJAX to handle messagebox responses
$(document).ready(function() {
    // Global AJAX setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Global AJAX success handler
    $(document).ajaxSuccess(function(event, xhr, settings) {
        try {
            const response = typeof xhr.responseJSON === 'object' ? xhr.responseJSON : JSON.parse(xhr.responseText);
            
            if (response.messagebox) {
                const { type, message } = response.messagebox;
                
                switch (type) {
                    case 'success':
                        showSuccess(message);
                        break;
                    case 'error':
                        showError(message);
                        break;
                    case 'warning':
                        showWarning(message);
                        break;
                    case 'info':
                        showInfo(message);
                        break;
                }
            }
        } catch (e) {
            // Response is not JSON or doesn't have messagebox data
        }
    });

    // Global AJAX error handler
    $(document).ajaxError(function(event, xhr, settings) {
        if (xhr.status === 422) {
            // Validation errors
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.errors) {
                    const errorMessages = Object.values(response.errors).flat();
                    showError(errorMessages.join('<br>'), 'Lỗi xác thực!');
                }
            } catch (e) {
                showError('Có lỗi xác thực dữ liệu!');
            }
        } else if (xhr.status === 500) {
            showError('Có lỗi hệ thống! Vui lòng thử lại sau.');
        } else if (xhr.status === 404) {
            showError('Không tìm thấy tài nguyên yêu cầu!');
        } else if (xhr.status === 403) {
            showError('Bạn không có quyền thực hiện hành động này!');
        } else if (xhr.status === 401) {
            showError('Phiên đăng nhập đã hết hạn! Vui lòng đăng nhập lại.');
            setTimeout(() => {
                window.location.href = '/admin/login';
            }, 2000);
        } else if (xhr.status !== 0) { // Ignore aborted requests
            try {
                const response = JSON.parse(xhr.responseText);
                if (response.messagebox) {
                    showError(response.messagebox.message);
                } else if (response.message) {
                    showError(response.message);
                } else {
                    showError('Có lỗi xảy ra! Vui lòng thử lại.');
                }
            } catch (e) {
                showError('Có lỗi xảy ra! Vui lòng thử lại.');
            }
        }
    });
});

/**
 * AJAX Helper Functions
 */

// Generic AJAX request with messagebox handling
function ajaxRequest(url, options = {}) {
    const defaultOptions = {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    };

    const finalOptions = { ...defaultOptions, ...options };

    return $.ajax(url, finalOptions);
}

// POST request with messagebox
function ajaxPost(url, data = {}, options = {}) {
    return ajaxRequest(url, {
        method: 'POST',
        data: JSON.stringify(data),
        ...options
    });
}

// PUT request with messagebox
function ajaxPut(url, data = {}, options = {}) {
    return ajaxRequest(url, {
        method: 'PUT',
        data: JSON.stringify(data),
        ...options
    });
}

// DELETE request with messagebox
function ajaxDelete(url, options = {}) {
    return ajaxRequest(url, {
        method: 'DELETE',
        ...options
    });
}

// Form submission with messagebox
function submitFormAjax(form, options = {}) {
    const $form = $(form);
    const url = $form.attr('action') || window.location.href;
    const method = $form.attr('method') || 'POST';
    const formData = new FormData(form);

    return $.ajax(url, {
        method: method,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        ...options
    });
}

/**
 * Confirmation Dialog with AJAX
 */
function confirmAjax(message, url, options = {}) {
    return new Promise((resolve, reject) => {
        showConfirm(
            message,
            'Xác nhận',
            function() {
                // User confirmed
                ajaxRequest(url, options)
                    .done(resolve)
                    .fail(reject);
            },
            function() {
                // User cancelled
                reject(new Error('User cancelled'));
            }
        );
    });
}

// Confirm delete with AJAX
function confirmDelete(message, url) {
    return confirmAjax(message, url, { method: 'DELETE' });
}

// Confirm action with AJAX
function confirmAction(message, url, method = 'POST', data = {}) {
    return confirmAjax(message, url, {
        method: method,
        data: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    });
}

/**
 * Loading States
 */
function showLoading(element, text = 'Đang xử lý...') {
    const $element = $(element);
    $element.prop('disabled', true);
    
    if ($element.is('button')) {
        $element.data('original-text', $element.html());
        $element.html(`<i class="fas fa-spinner fa-spin me-2"></i>${text}`);
    }
}

function hideLoading(element) {
    const $element = $(element);
    $element.prop('disabled', false);
    
    if ($element.is('button') && $element.data('original-text')) {
        $element.html($element.data('original-text'));
    }
}

/**
 * Form Validation Helpers
 */
function clearValidationErrors(form) {
    const $form = $(form);
    $form.find('.is-invalid').removeClass('is-invalid');
    $form.find('.invalid-feedback').remove();
}

function showValidationErrors(form, errors) {
    clearValidationErrors(form);
    const $form = $(form);
    
    Object.keys(errors).forEach(field => {
        const $field = $form.find(`[name="${field}"]`);
        if ($field.length) {
            $field.addClass('is-invalid');
            $field.after(`<div class="invalid-feedback">${errors[field][0]}</div>`);
        }
    });
}

/**
 * Auto-refresh functionality
 */
function autoRefresh(selector, interval = 30000) {
    setInterval(() => {
        $(selector).each(function() {
            const $element = $(this);
            const url = $element.data('refresh-url') || window.location.href;
            
            $.get(url)
                .done(function(response) {
                    if (response.html) {
                        $element.html(response.html);
                    }
                })
                .fail(function() {
                    console.warn('Auto-refresh failed for element:', $element);
                });
        });
    }, interval);
}

/**
 * Utility Functions
 */
function reloadPage(delay = 1000) {
    setTimeout(() => {
        window.location.reload();
    }, delay);
}

function redirectTo(url, delay = 1000) {
    setTimeout(() => {
        window.location.href = url;
    }, delay);
}

// Export for use in other scripts
window.MessageboxAjax = {
    ajaxRequest,
    ajaxPost,
    ajaxPut,
    ajaxDelete,
    submitFormAjax,
    confirmAjax,
    confirmDelete,
    confirmAction,
    showLoading,
    hideLoading,
    clearValidationErrors,
    showValidationErrors,
    autoRefresh,
    reloadPage,
    redirectTo
};