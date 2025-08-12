// CKEditor Configuration for Admin Panel
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor if the element exists
    const descriptionElement = document.querySelector('#description');
    
    if (descriptionElement) {
        ClassicEditor
            .create(descriptionElement, {
                toolbar: {
                    items: [
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
                placeholder: 'Mô tả chi tiết về khóa học, nội dung, mục tiêu...',
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload'],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Đoạn văn', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h3', title: 'Tiêu đề 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h4', title: 'Tiêu đề 2', class: 'ck-heading_heading2' }
                    ]
                }
            })
            .then(editor => {
                console.log('CKEditor initialized successfully');
                
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
            })
            .catch(error => {
                console.error('CKEditor initialization error:', error);
                // Fallback to regular textarea if CKEditor fails
                descriptionElement.style.minHeight = '200px';
                descriptionElement.style.resize = 'vertical';
            });
    }
});

// Function to get CKEditor content (for form submission)
function getCKEditorContent() {
    const editor = document.querySelector('#description').ckeditorInstance;
    if (editor) {
        return editor.getData();
    }
    return document.querySelector('#description').value;
}

// Function to set CKEditor content
function setCKEditorContent(content) {
    const editor = document.querySelector('#description').ckeditorInstance;
    if (editor) {
        editor.setData(content);
    } else {
        document.querySelector('#description').value = content;
    }
}
