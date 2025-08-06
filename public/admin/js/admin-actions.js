/**
 * Admin Actions JavaScript
 * Handles common admin actions with messagebox integration
 */

$(document).ready(function() {
    // Initialize admin actions
    initializeAdminActions();
});

function initializeAdminActions() {
    // Delete confirmation
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const url = $this.attr('href') || $this.data('url');
        const itemName = $this.data('name') || 'mục này';
        const message = $this.data('message') || `Bạn có chắc chắn muốn xóa "${itemName}"? Hành động này không thể hoàn tác!`;
        
        showConfirm(
            message,
            'Xác nhận xóa',
            function() {
                // Create and submit delete form
                const form = $('<form>', {
                    method: 'POST',
                    action: url
                });
                
                form.append($('<input>', {
                    type: 'hidden',
                    name: '_token',
                    value: $('meta[name="csrf-token"]').attr('content')
                }));
                
                form.append($('<input>', {
                    type: 'hidden',
                    name: '_method',
                    value: 'DELETE'
                }));
                
                $('body').append(form);
                form.submit();
            }
        );
    });

    // Status toggle confirmation
    $(document).on('click', '.btn-toggle-status', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const url = $this.attr('href') || $this.data('url');
        const action = $this.data('action') || 'thay đổi trạng thái';
        const itemName = $this.data('name') || 'mục này';
        
        showConfirm(
            `Bạn có chắc chắn muốn ${action} cho "${itemName}"?`,
            'Xác nhận',
            function() {
                window.location.href = url;
            }
        );
    });

    // Bulk action confirmation
    $(document).on('submit', '.bulk-action-form', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const action = $form.find('select[name="action"]').val();
        const selectedItems = $form.find('input[name="selected_items[]"]:checked');
        
        if (!action) {
            showWarning('Vui lòng chọn hành động cần thực hiện!');
            return;
        }
        
        if (selectedItems.length === 0) {
            showWarning('Vui lòng chọn ít nhất một mục để thực hiện hành động!');
            return;
        }
        
        const actionText = getActionText(action);
        const count = selectedItems.length;
        
        showConfirm(
            `Bạn có chắc chắn muốn ${actionText} ${count} mục đã chọn?`,
            'Xác nhận hành động',
            function() {
                $form.off('submit').submit();
            }
        );
    });

    // AJAX form submission
    $(document).on('submit', '.ajax-form', function(e) {
        e.preventDefault();
        
        const $form = $(this);
        const $submitBtn = $form.find('button[type="submit"]');
        
        // Show loading state
        showLoading($submitBtn);
        
        // Submit form via AJAX
        submitFormAjax($form[0])
            .done(function(response) {
                // Success handled by global AJAX handler
                if (response.redirect) {
                    setTimeout(() => {
                        window.location.href = response.redirect;
                    }, 1000);
                } else if (response.reload) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            })
            .fail(function() {
                // Error handled by global AJAX handler
            })
            .always(function() {
                hideLoading($submitBtn);
            });
    });

    // Quick edit functionality
    $(document).on('click', '.btn-quick-edit', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const url = $this.data('url');
        const field = $this.data('field');
        const currentValue = $this.data('value');
        const itemName = $this.data('name') || 'mục này';
        
        // Create quick edit modal
        createQuickEditModal(url, field, currentValue, itemName);
    });

    // Sort order update
    if ($('.sortable-list').length) {
        $('.sortable-list').sortable({
            handle: '.sort-handle',
            update: function(event, ui) {
                const $list = $(this);
                const url = $list.data('sort-url');
                const items = [];
                
                $list.find('[data-id]').each(function(index) {
                    items.push({
                        id: $(this).data('id'),
                        sort_order: index + 1
                    });
                });
                
                // Update sort order via AJAX
                ajaxPost(url, { items: items })
                    .done(function() {
                        // Success message handled by global handler
                    });
            }
        });
    }

    // Auto-save functionality
    $(document).on('change', '.auto-save', function() {
        const $this = $(this);
        const url = $this.data('url');
        const field = $this.attr('name');
        const value = $this.is(':checkbox') ? $this.is(':checked') : $this.val();
        
        const data = {};
        data[field] = value;
        
        // Show saving indicator
        const $indicator = $('<span class="text-muted ms-2"><i class="fas fa-spinner fa-spin"></i> Đang lưu...</span>');
        $this.after($indicator);
        
        ajaxPost(url, data)
            .done(function() {
                $indicator.html('<i class="fas fa-check text-success"></i> Đã lưu').delay(2000).fadeOut();
            })
            .fail(function() {
                $indicator.html('<i class="fas fa-times text-danger"></i> Lỗi').delay(2000).fadeOut();
            });
    });

    // Image preview
    $(document).on('change', '.image-input', function() {
        const input = this;
        const $preview = $(input).siblings('.image-preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                $preview.attr('src', e.target.result).show();
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    });

    // Copy to clipboard
    $(document).on('click', '.btn-copy', function(e) {
        e.preventDefault();
        
        const $this = $(this);
        const text = $this.data('text') || $this.text();
        
        navigator.clipboard.writeText(text).then(function() {
            showSuccess('Đã sao chép vào clipboard!');
            
            // Visual feedback
            const originalText = $this.html();
            $this.html('<i class="fas fa-check"></i> Đã sao chép');
            setTimeout(() => {
                $this.html(originalText);
            }, 2000);
        }).catch(function() {
            showError('Không thể sao chép vào clipboard!');
        });
    });
}

// Helper functions
function getActionText(action) {
    const actionMap = {
        'delete': 'xóa',
        'activate': 'kích hoạt',
        'deactivate': 'vô hiệu hóa',
        'feature': 'đánh dấu nổi bật',
        'unfeature': 'bỏ đánh dấu nổi bật',
        'publish': 'xuất bản',
        'unpublish': 'hủy xuất bản',
        'archive': 'lưu trữ',
        'restore': 'khôi phục'
    };
    
    return actionMap[action] || action;
}

function createQuickEditModal(url, field, currentValue, itemName) {
    const modalId = 'quickEditModal';
    
    // Remove existing modal
    $(`#${modalId}`).remove();
    
    const modal = $(`
        <div class="modal fade" id="${modalId}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Chỉnh sửa nhanh: ${itemName}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="quick-edit-form">
                            <div class="mb-3">
                                <label for="quickEditValue" class="form-label">${field}</label>
                                <input type="text" class="form-control" id="quickEditValue" name="${field}" value="${currentValue}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary" id="saveQuickEdit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    `);
    
    $('body').append(modal);
    
    // Show modal
    const bsModal = new bootstrap.Modal(modal[0]);
    bsModal.show();
    
    // Handle save
    modal.find('#saveQuickEdit').on('click', function() {
        const $btn = $(this);
        const newValue = modal.find('#quickEditValue').val();
        
        if (newValue === currentValue) {
            bsModal.hide();
            return;
        }
        
        showLoading($btn);
        
        const data = {};
        data[field] = newValue;
        
        ajaxPost(url, data)
            .done(function() {
                bsModal.hide();
                // Reload page to show changes
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            })
            .always(function() {
                hideLoading($btn);
            });
    });
    
    // Focus input
    modal.on('shown.bs.modal', function() {
        modal.find('#quickEditValue').focus().select();
    });
}

// Export functions for global use
window.AdminActions = {
    initializeAdminActions,
    getActionText,
    createQuickEditModal
};