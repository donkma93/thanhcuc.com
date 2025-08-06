/**
 * Confirmation Modal Helpers
 * Provides easy integration with forms, links, and AJAX actions
 */

// Wait for DOM and confirmation modal to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Auto-bind confirmation to elements with data-confirm attribute
    bindConfirmationElements();
    
    // Auto-bind delete confirmations
    bindDeleteConfirmations();
    
    // Auto-bind form confirmations
    bindFormConfirmations();
});

/**
 * Bind confirmation to elements with data-confirm attribute
 */
function bindConfirmationElements() {
    document.addEventListener('click', function(e) {
        const element = e.target.closest('[data-confirm]');
        if (!element) return;
        
        e.preventDefault();
        e.stopPropagation();
        
        const message = element.getAttribute('data-confirm');
        const type = element.getAttribute('data-confirm-type') || 'danger';
        const title = element.getAttribute('data-confirm-title') || 'Xác nhận';
        const confirmText = element.getAttribute('data-confirm-text') || 'Xác nhận';
        const cancelText = element.getAttribute('data-cancel-text') || 'Hủy bỏ';
        
        // Ensure we use the confirmation modal, not messagebox
        if (window.confirmationModal) {
            window.confirmationModal.show({
                title: title,
                message: message,
                type: type,
                confirmText: confirmText,
                cancelText: cancelText,
                onConfirm: function() {
                    return executeElementAction(element);
                }
            });
        } else {
            console.error('Confirmation modal not available');
        }
    });
}

/**
 * Bind delete confirmations to elements with data-delete attribute
 */
function bindDeleteConfirmations() {
    document.addEventListener('click', function(e) {
        const element = e.target.closest('[data-delete]');
        if (!element) return;
        
        console.log('Delete confirmation triggered for element:', element);
        
        e.preventDefault();
        e.stopPropagation();
        
        const itemName = element.getAttribute('data-delete') || 'mục này';
        const customMessage = element.getAttribute('data-delete-message');
        
        const message = customMessage || `Bạn có chắc chắn muốn xóa "${itemName}"? Hành động này không thể hoàn tác.`;
        
        console.log('Item name:', itemName);
        console.log('Message:', message);
        console.log('window.confirmationModal:', window.confirmationModal);
        
        // Use confirmation modal directly
        if (window.confirmationModal) {
            window.confirmationModal.delete(itemName, function() {
                console.log('Delete confirmed, executing action...');
                return executeElementAction(element);
            });
        } else {
            console.error('Confirmation modal not available');
            // Fallback to browser confirm
            if (confirm(message)) {
                executeElementAction(element);
            }
        }
    });
}

/**
 * Bind form confirmations
 */
function bindFormConfirmations() {
    document.addEventListener('submit', function(e) {
        const form = e.target;
        const confirmMessage = form.getAttribute('data-confirm');
        
        if (!confirmMessage) return;
        
        e.preventDefault();
        e.stopPropagation();
        
        const type = form.getAttribute('data-confirm-type') || 'warning';
        const title = form.getAttribute('data-confirm-title') || 'Xác nhận';
        
        // Use confirmation modal directly
        if (window.confirmationModal) {
            window.confirmationModal.show({
                title: title,
                message: confirmMessage,
                type: type,
                onConfirm: function() {
                    // Remove the data-confirm attribute to prevent infinite loop
                    form.removeAttribute('data-confirm');
                    form.submit();
                }
            });
        } else {
            console.error('Confirmation modal not available');
        }
    });
}

/**
 * Execute action for an element (link, button, etc.)
 */
function executeElementAction(element) {
    const href = element.getAttribute('href');
    const formId = element.getAttribute('data-form');
    const ajaxUrl = element.getAttribute('data-ajax-url');
    const ajaxMethod = element.getAttribute('data-ajax-method') || 'POST';
    
    if (formId) {
        // Submit a specific form
        const form = document.getElementById(formId);
        if (form) {
            form.submit();
        }
        return Promise.resolve();
    } else if (ajaxUrl) {
        // Make AJAX request
        return makeAjaxRequest(ajaxUrl, ajaxMethod, element);
    } else if (href && href !== '#') {
        // Navigate to URL
        window.location.href = href;
        return Promise.resolve();
    } else if (element.type === 'submit') {
        // Submit parent form
        const form = element.closest('form');
        if (form) {
            form.submit();
        }
        return Promise.resolve();
    }
    
    return Promise.resolve();
}

/**
 * Make AJAX request with confirmation
 */
function makeAjaxRequest(url, method, element) {
    return new Promise((resolve, reject) => {
        const data = {};
        
        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            data._token = csrfToken.getAttribute('content');
        }
        
        // Add method override for non-GET requests
        if (method.toUpperCase() !== 'GET' && method.toUpperCase() !== 'POST') {
            data._method = method;
            method = 'POST';
        }
        
        // Get additional data from element attributes
        const dataAttributes = element.dataset;
        Object.keys(dataAttributes).forEach(key => {
            if (key.startsWith('param')) {
                const paramName = key.replace('param', '').toLowerCase();
                data[paramName] = dataAttributes[key];
            }
        });
        
        $.ajax({
            url: url,
            method: method,
            data: data,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': data._token
            }
        })
        .done(function(response) {
            // Handle successful response
            if (response.redirect) {
                window.location.href = response.redirect;
            } else if (response.reload) {
                window.location.reload();
            }
            resolve(response);
        })
        .fail(function(xhr) {
            // Error handling is done by messagebox-ajax.js
            reject(xhr);
        });
    });
}

/**
 * Confirmation helpers for programmatic use
 */

// Confirm before navigating to URL
function confirmNavigation(message, url, type = 'warning') {
    if (window.confirmationModal) {
        window.confirmationModal.show({
            title: 'Xác nhận',
            message: message,
            type: type,
            onConfirm: function() {
                window.location.href = url;
            }
        });
    }
}

// Confirm before submitting form
function confirmFormSubmit(formSelector, message, type = 'warning') {
    const form = document.querySelector(formSelector);
    if (!form) return;
    
    if (window.confirmationModal) {
        window.confirmationModal.show({
            title: 'Xác nhận',
            message: message,
            type: type,
            onConfirm: function() {
                form.submit();
            }
        });
    }
}

// Confirm AJAX action
function confirmAjaxAction(message, url, method = 'POST', data = {}, type = 'danger') {
    if (window.confirmationModal) {
        window.confirmationModal.show({
            title: 'Xác nhận',
            message: message,
            type: type,
            onConfirm: function() {
                return $.ajax({
                    url: url,
                    method: method,
                    data: data,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
        });
    }
}

// Confirm bulk actions
function confirmBulkAction(selectedItems, actionName, formSelector) {
    if (selectedItems.length === 0) {
        if (window.messageboxManager) {
            window.messageboxManager.error('Vui lòng chọn ít nhất một mục để thực hiện hành động này.');
        }
        return;
    }
    
    const message = `Bạn có chắc chắn muốn ${actionName} ${selectedItems.length} mục đã chọn?`;
    
    if (window.confirmationModal) {
        window.confirmationModal.show({
            title: 'Xác nhận hành động hàng loạt',
            message: message,
            type: 'warning',
            onConfirm: function() {
                const form = document.querySelector(formSelector);
                if (form) {
                    form.submit();
                }
            }
        });
    }
}

// Export functions for global use
window.ConfirmationHelpers = {
    confirmNavigation,
    confirmFormSubmit,
    confirmAjaxAction,
    confirmBulkAction,
    executeElementAction,
    makeAjaxRequest
};

/**
 * jQuery integration
 */
if (typeof $ !== 'undefined') {
    // jQuery plugin for easy confirmation
    $.fn.confirmAction = function(options = {}) {
        return this.each(function() {
            const $element = $(this);
            const defaultOptions = {
                message: 'Bạn có chắc chắn muốn thực hiện hành động này?',
                type: 'danger',
                title: 'Xác nhận'
            };
            
            const settings = $.extend({}, defaultOptions, options);
            
            $element.on('click', function(e) {
                e.preventDefault();
                
                if (window.confirmationModal) {
                    window.confirmationModal.show({
                        title: settings.title,
                        message: settings.message,
                        type: settings.type,
                        onConfirm: function() {
                            if (settings.onConfirm) {
                                return settings.onConfirm.call($element[0]);
                            } else {
                                return executeElementAction($element[0]);
                            }
                        },
                        onCancel: settings.onCancel
                    });
                }
            });
        });
    };
    
    // jQuery plugin for delete confirmation
    $.fn.confirmDelete = function(itemName) {
        return this.each(function() {
            const $element = $(this);
            
            $element.on('click', function(e) {
                e.preventDefault();
                
                if (window.confirmationModal) {
                    window.confirmationModal.delete(itemName || 'mục này', function() {
                        return executeElementAction($element[0]);
                    });
                }
            });
        });
    };
}

// Global helper functions for backward compatibility
function showConfirmation(options) {
    return window.confirmationModal ? window.confirmationModal.show(options) : null;
}

function confirmAction(message, onConfirm, onCancel) {
    return window.confirmationModal ? window.confirmationModal.confirm(message, onConfirm, onCancel) : null;
}

function confirmWarning(message, onConfirm, onCancel) {
    return window.confirmationModal ? window.confirmationModal.warning(message, onConfirm, onCancel) : null;
}

function confirmInfo(message, onConfirm, onCancel) {
    return window.confirmationModal ? window.confirmationModal.info(message, onConfirm, onCancel) : null;
}

function confirmDelete(itemName, onConfirm, onCancel) {
    return window.confirmationModal ? window.confirmationModal.delete(itemName, onConfirm, onCancel) : null;
}
