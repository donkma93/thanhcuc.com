{{-- Admin Messagebox Component --}}
<div id="messageboxContainer" class="messagebox-container">
    {{-- Success Messages --}}
    @if(session('success'))
        <div class="messagebox messagebox-success animate__animated animate__fadeInDown" data-auto-dismiss="5000">
            <div class="messagebox-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="messagebox-content">
                <div class="messagebox-title">Thành công!</div>
                <div class="messagebox-message">{{ session('success') }}</div>
            </div>
            <button type="button" class="messagebox-close" onclick="dismissMessagebox(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    {{-- Error Messages --}}
    @if(session('error'))
        <div class="messagebox messagebox-error animate__animated animate__fadeInDown" data-auto-dismiss="8000">
            <div class="messagebox-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="messagebox-content">
                <div class="messagebox-title">Lỗi!</div>
                <div class="messagebox-message">{{ session('error') }}</div>
            </div>
            <button type="button" class="messagebox-close" onclick="dismissMessagebox(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    {{-- Warning Messages --}}
    @if(session('warning'))
        <div class="messagebox messagebox-warning animate__animated animate__fadeInDown" data-auto-dismiss="6000">
            <div class="messagebox-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="messagebox-content">
                <div class="messagebox-title">Cảnh báo!</div>
                <div class="messagebox-message">{{ session('warning') }}</div>
            </div>
            <button type="button" class="messagebox-close" onclick="dismissMessagebox(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    {{-- Info Messages --}}
    @if(session('info'))
        <div class="messagebox messagebox-info animate__animated animate__fadeInDown" data-auto-dismiss="5000">
            <div class="messagebox-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="messagebox-content">
                <div class="messagebox-title">Thông tin!</div>
                <div class="messagebox-message">{{ session('info') }}</div>
            </div>
            <button type="button" class="messagebox-close" onclick="dismissMessagebox(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="messagebox messagebox-error animate__animated animate__fadeInDown" data-auto-dismiss="10000">
            <div class="messagebox-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="messagebox-content">
                <div class="messagebox-title">Lỗi xác thực!</div>
                <div class="messagebox-message">
                    @if($errors->count() == 1)
                        {{ $errors->first() }}
                    @else
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <button type="button" class="messagebox-close" onclick="dismissMessagebox(this)">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>

{{-- Messagebox Styles --}}
<style>
/* Messagebox Container */
.messagebox-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    max-width: 400px;
    width: 100%;
}

/* Base Messagebox Styles */
.messagebox {
    display: flex;
    align-items: flex-start;
    padding: 16px;
    margin-bottom: 12px;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

.messagebox::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background: currentColor;
}

.messagebox:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

/* Messagebox Icon */
.messagebox-icon {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    margin-right: 12px;
    margin-top: 2px;
}

.messagebox-icon i {
    font-size: 20px;
    color: currentColor;
}

/* Messagebox Content */
.messagebox-content {
    flex: 1;
    min-width: 0;
}

.messagebox-title {
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 4px;
    color: currentColor;
}

.messagebox-message {
    font-size: 13px;
    line-height: 1.4;
    opacity: 0.9;
}

.messagebox-message ul {
    padding-left: 16px;
    margin-top: 4px;
}

.messagebox-message li {
    margin-bottom: 2px;
}

/* Close Button */
.messagebox-close {
    flex-shrink: 0;
    width: 24px;
    height: 24px;
    border: none;
    background: none;
    color: currentColor;
    opacity: 0.7;
    cursor: pointer;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    margin-left: 8px;
}

.messagebox-close:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.1);
}

.messagebox-close i {
    font-size: 12px;
}

/* Success Messagebox */
.messagebox-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
    border-color: rgba(21, 87, 36, 0.2);
}

.messagebox-success::before {
    background: #28a745;
}

/* Error Messagebox */
.messagebox-error {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
    border-color: rgba(114, 28, 36, 0.2);
}

.messagebox-error::before {
    background: #dc3545;
}

/* Warning Messagebox */
.messagebox-warning {
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    color: #856404;
    border-color: rgba(133, 100, 4, 0.2);
}

.messagebox-warning::before {
    background: #ffc107;
}

/* Info Messagebox */
.messagebox-info {
    background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
    color: #0c5460;
    border-color: rgba(12, 84, 96, 0.2);
}

.messagebox-info::before {
    background: #17a2b8;
}

/* Progress Bar for Auto Dismiss */
.messagebox[data-auto-dismiss]::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    background: currentColor;
    opacity: 0.3;
    animation: messageboxProgress var(--dismiss-time, 5s) linear forwards;
}

@keyframes messageboxProgress {
    from {
        width: 100%;
    }
    to {
        width: 0%;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .messagebox-container {
        top: 10px;
        right: 10px;
        left: 10px;
        max-width: none;
    }
    
    .messagebox {
        padding: 14px;
        margin-bottom: 10px;
    }
    
    .messagebox-title {
        font-size: 13px;
    }
    
    .messagebox-message {
        font-size: 12px;
    }
}

/* Animation Classes */
.animate__fadeInDown {
    animation: fadeInDown 0.5s ease-out;
}

.animate__fadeOutUp {
    animation: fadeOutUp 0.3s ease-in forwards;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeOutUp {
    from {
        opacity: 1;
        transform: translateY(0);
    }
    to {
        opacity: 0;
        transform: translateY(-20px);
    }
}

/* Dark Mode Support */
@media (prefers-color-scheme: dark) {
    .messagebox {
        backdrop-filter: blur(20px);
        border-color: rgba(255, 255, 255, 0.1);
    }
    
    .messagebox-success {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.2) 0%, rgba(40, 167, 69, 0.1) 100%);
        color: #4caf50;
    }
    
    .messagebox-error {
        background: linear-gradient(135deg, rgba(220, 53, 69, 0.2) 0%, rgba(220, 53, 69, 0.1) 100%);
        color: #f44336;
    }
    
    .messagebox-warning {
        background: linear-gradient(135deg, rgba(255, 193, 7, 0.2) 0%, rgba(255, 193, 7, 0.1) 100%);
        color: #ff9800;
    }
    
    .messagebox-info {
        background: linear-gradient(135deg, rgba(23, 162, 184, 0.2) 0%, rgba(23, 162, 184, 0.1) 100%);
        color: #2196f3;
    }
}
</style>

{{-- Messagebox JavaScript --}}
<script>
// Messagebox Management
class MessageboxManager {
    constructor() {
        this.container = document.getElementById('messageboxContainer');
        this.initializeAutoDissmiss();
        this.initializeKeyboardShortcuts();
    }

    // Initialize auto-dismiss functionality
    initializeAutoDissmiss() {
        const messageboxes = document.querySelectorAll('.messagebox[data-auto-dismiss]');
        
        messageboxes.forEach(messagebox => {
            const dismissTime = parseInt(messagebox.dataset.autoDismiss);
            messagebox.style.setProperty('--dismiss-time', dismissTime + 'ms');
            
            setTimeout(() => {
                this.dismissMessagebox(messagebox);
            }, dismissTime);
        });
    }

    // Initialize keyboard shortcuts
    initializeKeyboardShortcuts() {
        document.addEventListener('keydown', (e) => {
            // ESC key to dismiss all messageboxes
            if (e.key === 'Escape') {
                this.dismissAllMessageboxes();
            }
        });
    }

    // Show a new messagebox programmatically
    showMessagebox(type, title, message, autoDismiss = 5000) {
        const messagebox = this.createMessagebox(type, title, message, autoDismiss);
        this.container.appendChild(messagebox);
        
        // Trigger animation
        requestAnimationFrame(() => {
            messagebox.classList.add('animate__fadeInDown');
        });

        // Auto dismiss if specified
        if (autoDismiss > 0) {
            messagebox.style.setProperty('--dismiss-time', autoDismiss + 'ms');
            setTimeout(() => {
                this.dismissMessagebox(messagebox);
            }, autoDismiss);
        }

        return messagebox;
    }

    // Create messagebox element
    createMessagebox(type, title, message, autoDismiss = 0) {
        const iconMap = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };

        const messagebox = document.createElement('div');
        messagebox.className = `messagebox messagebox-${type}`;
        
        if (autoDismiss > 0) {
            messagebox.setAttribute('data-auto-dismiss', autoDismiss);
        }

        messagebox.innerHTML = `
            <div class="messagebox-icon">
                <i class="${iconMap[type] || 'fas fa-info-circle'}"></i>
            </div>
            <div class="messagebox-content">
                <div class="messagebox-title">${title}</div>
                <div class="messagebox-message">${message}</div>
            </div>
            <button type="button" class="messagebox-close" onclick="messageboxManager.dismissMessagebox(this.parentElement)">
                <i class="fas fa-times"></i>
            </button>
        `;

        return messagebox;
    }

    // Dismiss a specific messagebox
    dismissMessagebox(messagebox) {
        if (!messagebox || !messagebox.classList.contains('messagebox')) {
            return;
        }

        messagebox.classList.remove('animate__fadeInDown');
        messagebox.classList.add('animate__fadeOutUp');
        
        setTimeout(() => {
            if (messagebox.parentNode) {
                messagebox.parentNode.removeChild(messagebox);
            }
        }, 300);
    }

    // Dismiss all messageboxes
    dismissAllMessageboxes() {
        const messageboxes = document.querySelectorAll('.messagebox');
        messageboxes.forEach(messagebox => {
            this.dismissMessagebox(messagebox);
        });
    }

    // Show success message
    success(message, title = 'Thành công!', autoDismiss = 5000) {
        return this.showMessagebox('success', title, message, autoDismiss);
    }

    // Show error message
    error(message, title = 'Lỗi!', autoDismiss = 8000) {
        return this.showMessagebox('error', title, message, autoDismiss);
    }

    // Show warning message
    warning(message, title = 'Cảnh báo!', autoDismiss = 6000) {
        return this.showMessagebox('warning', title, message, autoDismiss);
    }

    // Show info message
    info(message, title = 'Thông tin!', autoDismiss = 5000) {
        return this.showMessagebox('info', title, message, autoDismiss);
    }

    // Show confirmation dialog
    confirm(message, title = 'Xác nhận', onConfirm = null, onCancel = null) {
        const messagebox = this.createMessagebox('warning', title, message, 0);
        
        // Add confirmation buttons
        const buttonsHtml = `
            <div class="messagebox-buttons mt-3">
                <button type="button" class="btn btn-sm btn-primary me-2" onclick="messageboxManager.handleConfirm(this, true)">
                    <i class="fas fa-check me-1"></i>Xác nhận
                </button>
                <button type="button" class="btn btn-sm btn-secondary" onclick="messageboxManager.handleConfirm(this, false)">
                    <i class="fas fa-times me-1"></i>Hủy bỏ
                </button>
            </div>
        `;
        
        messagebox.querySelector('.messagebox-content').insertAdjacentHTML('beforeend', buttonsHtml);
        messagebox.querySelector('.messagebox-close').style.display = 'none';
        
        // Store callbacks
        messagebox._onConfirm = onConfirm;
        messagebox._onCancel = onCancel;
        
        this.container.appendChild(messagebox);
        messagebox.classList.add('animate__fadeInDown');
        
        return messagebox;
    }

    // Handle confirmation dialog response
    handleConfirm(button, confirmed) {
        const messagebox = button.closest('.messagebox');
        
        if (confirmed && messagebox._onConfirm) {
            messagebox._onConfirm();
        } else if (!confirmed && messagebox._onCancel) {
            messagebox._onCancel();
        }
        
        this.dismissMessagebox(messagebox);
    }
}

// Global messagebox manager instance
let messageboxManager;

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    messageboxManager = new MessageboxManager();
});

// Global function for backward compatibility
function dismissMessagebox(element) {
    if (messageboxManager) {
        messageboxManager.dismissMessagebox(element);
    }
}

// Global helper functions
function showSuccess(message, title, autoDismiss) {
    return messageboxManager ? messageboxManager.success(message, title, autoDismiss) : null;
}

function showError(message, title, autoDismiss) {
    return messageboxManager ? messageboxManager.error(message, title, autoDismiss) : null;
}

function showWarning(message, title, autoDismiss) {
    return messageboxManager ? messageboxManager.warning(message, title, autoDismiss) : null;
}

function showInfo(message, title, autoDismiss) {
    return messageboxManager ? messageboxManager.info(message, title, autoDismiss) : null;
}

function showConfirm(message, title, onConfirm, onCancel) {
    return messageboxManager ? messageboxManager.confirm(message, title, onConfirm, onCancel) : null;
}
</script>