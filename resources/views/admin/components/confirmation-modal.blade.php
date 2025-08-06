{{-- Admin Confirmation Modal Component --}}
<div id="confirmationModal" class="confirmation-modal-overlay" style="display: none;">
    <div class="confirmation-modal">
        <div class="confirmation-modal-header">
            <div class="confirmation-modal-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <h4 class="confirmation-modal-title" id="confirmationTitle">Xác nhận</h4>
        </div>
        
        <div class="confirmation-modal-body">
            <p class="confirmation-modal-message" id="confirmationMessage">
                Bạn có chắc chắn muốn thực hiện hành động này?
            </p>
        </div>
        
        <div class="confirmation-modal-footer">
            <button type="button" class="btn btn-secondary confirmation-cancel" id="confirmationCancel">
                <i class="fas fa-times me-2"></i>Hủy bỏ
            </button>
            <button type="button" class="btn btn-danger confirmation-confirm" id="confirmationConfirm">
                <i class="fas fa-check me-2"></i>Xác nhận
            </button>
        </div>
    </div>
</div>

{{-- Confirmation Modal Styles --}}
<style>
/* Modal Overlay */
.confirmation-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(5px);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.confirmation-modal-overlay.show {
    opacity: 1;
}

/* Modal Container */
.confirmation-modal {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    max-width: 500px;
    width: 90%;
    max-height: 90vh;
    overflow: hidden;
    transform: scale(0.7) translateY(-50px);
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.confirmation-modal-overlay.show .confirmation-modal {
    transform: scale(1) translateY(0);
}

/* Modal Header */
.confirmation-modal-header {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
    color: white;
    padding: 25px 30px;
    text-align: center;
    position: relative;
}

.confirmation-modal-header.warning {
    background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
    color: #333;
}

.confirmation-modal-header.info {
    background: linear-gradient(135deg, #17a2b8 0%, #007bff 100%);
}

.confirmation-modal-header.success {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
}

.confirmation-modal-icon {
    font-size: 3rem;
    margin-bottom: 10px;
    opacity: 0.9;
}

.confirmation-modal-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 600;
}

/* Modal Body */
.confirmation-modal-body {
    padding: 30px;
    text-align: center;
}

.confirmation-modal-message {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #333;
    margin: 0;
}

/* Modal Footer */
.confirmation-modal-footer {
    padding: 20px 30px 30px;
    display: flex;
    gap: 15px;
    justify-content: center;
}

.confirmation-modal-footer .btn {
    min-width: 120px;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 500;
    border: none;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.confirmation-cancel {
    background: #6c757d;
    color: white;
}

.confirmation-cancel:hover {
    background: #5a6268;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
}

.confirmation-confirm {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
    color: white;
}

.confirmation-confirm:hover {
    background: linear-gradient(135deg, #c82333 0%, #bd2130 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
}

.confirmation-confirm.warning {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
    color: #333;
}

.confirmation-confirm.warning:hover {
    background: linear-gradient(135deg, #e0a800 0%, #d39e00 100%);
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
}

.confirmation-confirm.success {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
    color: white;
}

.confirmation-confirm.success:hover {
    background: linear-gradient(135deg, #1e7e34 0%, #155724 100%);
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
}

/* Button Loading State */
.btn.loading {
    pointer-events: none;
    opacity: 0.7;
}

.btn.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid transparent;
    border-top: 2px solid currentColor;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .confirmation-modal {
        width: 95%;
        margin: 20px;
    }
    
    .confirmation-modal-header {
        padding: 20px;
    }
    
    .confirmation-modal-body {
        padding: 20px;
    }
    
    .confirmation-modal-footer {
        padding: 15px 20px 20px;
        flex-direction: column;
    }
    
    .confirmation-modal-footer .btn {
        width: 100%;
        min-width: auto;
    }
    
    .confirmation-modal-icon {
        font-size: 2.5rem;
    }
    
    .confirmation-modal-title {
        font-size: 1.3rem;
    }
    
    .confirmation-modal-message {
        font-size: 1rem;
    }
}

/* Animation Classes */
.fade-in {
    animation: fadeIn 0.3s ease-out;
}

.fade-out {
    animation: fadeOut 0.3s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.7) translateY(-50px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
    to {
        opacity: 0;
        transform: scale(0.7) translateY(-50px);
    }
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
    .confirmation-modal {
        background: #2d3748;
        color: #e2e8f0;
    }
    
    .confirmation-modal-message {
        color: #e2e8f0;
    }
}
</style>

{{-- Confirmation Modal JavaScript --}}
<script>
class ConfirmationModal {
    constructor() {
        this.modal = document.getElementById('confirmationModal');
        this.titleElement = document.getElementById('confirmationTitle');
        this.messageElement = document.getElementById('confirmationMessage');
        this.cancelButton = document.getElementById('confirmationCancel');
        this.confirmButton = document.getElementById('confirmationConfirm');
        this.currentCallback = null;
        this.currentCancelCallback = null;
        
        this.initializeEvents();
    }
    
    initializeEvents() {
        // Cancel button
        this.cancelButton.addEventListener('click', () => {
            this.hide();
            if (this.currentCancelCallback) {
                this.currentCancelCallback();
            }
        });
        
        // Confirm button
        this.confirmButton.addEventListener('click', () => {
            if (this.currentCallback) {
                this.setLoading(true);
                
                // Execute callback
                const result = this.currentCallback();
                
                // If callback returns a promise, handle it
                if (result && typeof result.then === 'function') {
                    result
                        .then(() => {
                            this.setLoading(false);
                            this.hide();
                        })
                        .catch((error) => {
                            this.setLoading(false);
                            console.error('Confirmation action failed:', error);
                            // Don't hide modal on error, let user try again
                        });
                } else {
                    this.setLoading(false);
                    this.hide();
                }
            } else {
                this.hide();
            }
        });
        
        // Close on overlay click
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                this.hide();
                if (this.currentCancelCallback) {
                    this.currentCancelCallback();
                }
            }
        });
        
        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isVisible()) {
                this.hide();
                if (this.currentCancelCallback) {
                    this.currentCancelCallback();
                }
            }
        });
    }
    
    show(options = {}) {
        console.log('ConfirmationModal.show() called with options:', options);
        
        const {
            title = 'Xác nhận',
            message = 'Bạn có chắc chắn muốn thực hiện hành động này?',
            type = 'danger', // danger, warning, info, success
            confirmText = 'Xác nhận',
            cancelText = 'Hủy bỏ',
            onConfirm = null,
            onCancel = null
        } = options;
        
        // Set content
        this.titleElement.textContent = title;
        this.messageElement.textContent = message;
        this.confirmButton.textContent = confirmText;
        this.cancelButton.textContent = cancelText;
        
        // Set callbacks
        this.currentCallback = onConfirm;
        this.currentCancelCallback = onCancel;
        
        // Set theme
        this.setTheme(type);
        
        console.log('Showing modal element:', this.modal);
        
        // Show modal
        this.modal.style.display = 'flex';
        this.modal.style.zIndex = '10000';
        
        requestAnimationFrame(() => {
            this.modal.classList.add('show');
            console.log('Modal should now be visible');
        });
        
        // Focus on cancel button by default
        setTimeout(() => {
            if (this.cancelButton) {
                this.cancelButton.focus();
            }
        }, 300);
        
        return this;
    }
    
    hide() {
        this.modal.classList.remove('show');
        setTimeout(() => {
            this.modal.style.display = 'none';
            this.setLoading(false);
        }, 300);
        
        return this;
    }
    
    setTheme(type) {
        const header = this.modal.querySelector('.confirmation-modal-header');
        const confirmBtn = this.confirmButton;
        
        // Reset classes
        header.className = 'confirmation-modal-header';
        confirmBtn.className = 'btn confirmation-confirm';
        
        // Apply theme
        switch (type) {
            case 'warning':
                header.classList.add('warning');
                confirmBtn.classList.add('warning');
                break;
            case 'info':
                header.classList.add('info');
                break;
            case 'success':
                header.classList.add('success');
                confirmBtn.classList.add('success');
                break;
            case 'danger':
            default:
                // Default styling (already applied)
                break;
        }
    }
    
    setLoading(loading) {
        if (loading) {
            this.confirmButton.classList.add('loading');
            this.confirmButton.disabled = true;
            this.cancelButton.disabled = true;
        } else {
            this.confirmButton.classList.remove('loading');
            this.confirmButton.disabled = false;
            this.cancelButton.disabled = false;
        }
    }
    
    isVisible() {
        return this.modal.style.display !== 'none' && this.modal.classList.contains('show');
    }
    
    // Convenience methods
    confirm(message, onConfirm, onCancel) {
        return this.show({
            title: 'Xác nhận',
            message: message,
            type: 'danger',
            confirmText: 'Xác nhận',
            cancelText: 'Hủy bỏ',
            onConfirm: onConfirm,
            onCancel: onCancel
        });
    }
    
    warning(message, onConfirm, onCancel) {
        return this.show({
            title: 'Cảnh báo',
            message: message,
            type: 'warning',
            confirmText: 'Tiếp tục',
            cancelText: 'Hủy bỏ',
            onConfirm: onConfirm,
            onCancel: onCancel
        });
    }
    
    info(message, onConfirm, onCancel) {
        return this.show({
            title: 'Thông tin',
            message: message,
            type: 'info',
            confirmText: 'Đồng ý',
            cancelText: 'Hủy bỏ',
            onConfirm: onConfirm,
            onCancel: onCancel
        });
    }
    
    delete(itemName, onConfirm, onCancel) {
        return this.show({
            title: 'Xác nhận xóa',
            message: `Bạn có chắc chắn muốn xóa "${itemName}"? Hành động này không thể hoàn tác.`,
            type: 'danger',
            confirmText: 'Xóa',
            cancelText: 'Hủy bỏ',
            onConfirm: onConfirm,
            onCancel: onCancel
        });
    }
}

// Global confirmation modal instance
let confirmationModal;

// Initialize immediately and also when DOM is ready
function initializeConfirmationModal() {
    if (!confirmationModal) {
        confirmationModal = new ConfirmationModal();
        window.confirmationModal = confirmationModal;
        window.ConfirmationModal = ConfirmationModal;
    }
}

// Try to initialize immediately
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeConfirmationModal);
} else {
    initializeConfirmationModal();
}

// Global helper functions
function showConfirmation(options) {
    if (!window.confirmationModal) {
        initializeConfirmationModal();
    }
    return window.confirmationModal ? window.confirmationModal.show(options) : null;
}

function confirmAction(message, onConfirm, onCancel) {
    if (!window.confirmationModal) {
        initializeConfirmationModal();
    }
    return window.confirmationModal ? window.confirmationModal.confirm(message, onConfirm, onCancel) : null;
}

function confirmWarning(message, onConfirm, onCancel) {
    if (!window.confirmationModal) {
        initializeConfirmationModal();
    }
    return window.confirmationModal ? window.confirmationModal.warning(message, onConfirm, onCancel) : null;
}

function confirmInfo(message, onConfirm, onCancel) {
    if (!window.confirmationModal) {
        initializeConfirmationModal();
    }
    return window.confirmationModal ? window.confirmationModal.info(message, onConfirm, onCancel) : null;
}

function confirmDelete(itemName, onConfirm, onCancel) {
    if (!window.confirmationModal) {
        initializeConfirmationModal();
    }
    return window.confirmationModal ? window.confirmationModal.delete(itemName, onConfirm, onCancel) : null;
}
</script>
