// CKEditor Configuration for Admin Panel
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor for course descriptions
    const descriptionElement = document.querySelector('#description');
    if (descriptionElement) {
        initializeCKEditor(descriptionElement, {
            placeholder: 'Mô tả chi tiết về khóa học, nội dung, mục tiêu...',
            toolbarItems: [
                'bold', 'italic', 'underline', 'strikethrough',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'link', 'blockQuote',
                '|',
                'undo', 'redo'
            ]
        });
    }

    // Initialize CKEditor for teacher bios
    const bioElement = document.querySelector('#bio');
    if (bioElement) {
        initializeCKEditor(bioElement, {
            placeholder: 'Mô tả về kinh nghiệm, phong cách giảng dạy, thành tích...',
            toolbarItems: [
                'bold', 'italic', 'underline', 'strikethrough',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'link', 'blockQuote',
                '|',
                'undo', 'redo'
            ]
        });
    }
});

// Generic CKEditor initialization function
function initializeCKEditor(element, config = {}) {
    const defaultConfig = {
        toolbar: {
            items: config.toolbarItems || [
                'bold', 'italic', 'underline', 'strikethrough',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'link', 'blockQuote',
                '|',
                'undo', 'redo'
            ]
        },
        language: 'vi',
        placeholder: config.placeholder || 'Nhập nội dung...',
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload'],
        heading: {
            options: [
                { model: 'paragraph', title: 'Đoạn văn', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h3', title: 'Tiêu đề 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h4', title: 'Tiêu đề 2', class: 'ck-heading_heading2' }
            ]
        }
    };

    ClassicEditor
        .create(element, defaultConfig)
        .then(editor => {
            console.log('CKEditor initialized successfully for:', element.id);

            // Add custom styling for the editor
            const editorElement = editor.ui.view.element;
            editorElement.style.borderRadius = '8px';
            editorElement.style.overflow = 'hidden';

            // Auto-resize functionality
            editor.model.document.on('change:data', () => {
                const data = editor.getData();
                if (data.length > 1000) {
                    editorElement.style.minHeight = '300px';
                } else {
                    editorElement.style.minHeight = '200px';
                }
            });

            // Store editor instance for later use
            element.ckeditorInstance = editor;
        })
        .catch(error => {
            console.error('CKEditor initialization error:', error);
            // Fallback to regular textarea if CKEditor fails
            element.style.minHeight = '200px';
            element.style.resize = 'vertical';
        });
}

// Function to get CKEditor content (for form submission)
function getCKEditorContent(elementId) {
    const element = document.querySelector('#' + elementId);
    if (element && element.ckeditorInstance) {
        return element.ckeditorInstance.getData();
    }
    return element ? element.value : '';
}

// Function to set CKEditor content
function setCKEditorContent(elementId, content) {
    const element = document.querySelector('#' + elementId);
    if (element && element.ckeditorInstance) {
        element.ckeditorInstance.setData(content);
    } else if (element) {
        element.value = content;
    }
}
