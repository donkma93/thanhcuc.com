@extends('layouts.app')

@section('title', 'Kiểm Tra Trình Độ Online - Trung Tâm Tiếng Đức Thanh Cúc')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-4 text-white animate-fade-in-up">
                    KIỂM TRA TRÌNH ĐỘ ONLINE
                </h1>
                <p class="lead mb-4 text-white animate-fade-in-up animate-delay-1">
                    Đánh giá trình độ tiếng Đức hiện tại của bạn một cách nhanh chóng và chính xác
                </p>
                <div class="d-flex justify-content-center gap-3 animate-fade-in-up animate-delay-2">
                    <a href="#test-section" class="btn btn-light btn-lg btn-liquid">
                        <i class="fas fa-play me-2"></i>Bắt Đầu Kiểm Tra
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-user-tie me-2"></i>Tư Vấn Trực Tiếp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Test Info Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">THÔNG TIN BÀI KIỂM TRA</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Hiểu rõ về bài kiểm tra trước khi bắt đầu</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll">
                    <div class="card-body p-4">
                        <i class="fas fa-clock fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold mb-2">15 Phút</h5>
                        <p class="text-muted mb-0">Thời gian làm bài</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <i class="fas fa-question-circle fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold mb-2">30 Câu Hỏi</h5>
                        <p class="text-muted mb-0">Ngữ pháp & từ vựng</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <i class="fas fa-chart-line fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold mb-2">A1 - C2</h5>
                        <p class="text-muted mb-0">Đánh giá theo CEFR</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll animate-delay-3">
                    <div class="card-body p-4">
                        <i class="fas fa-certificate fa-3x text-info mb-3"></i>
                        <h5 class="fw-bold mb-2">Miễn Phí</h5>
                        <p class="text-muted mb-0">Kết quả ngay lập tức</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CEFR Levels -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">CÁC CẤP ĐỘ TIẾNG ĐỨC</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Khung tham chiếu châu Âu chung (CEFR)</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card level-card h-100 animate-on-scroll">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="mb-0">CẤP ĐỘ CƠ BẢN</h4>
                    </div>
                    <div class="card-body">
                        <div class="level-item mb-3">
                            <h5 class="fw-bold text-success">A1 - Khởi đầu</h5>
                            <p class="small text-muted mb-2">Hiểu và sử dụng các cụm từ quen thuộc hàng ngày</p>
                            <ul class="small text-muted">
                                <li>Giới thiệu bản thân</li>
                                <li>Hỏi thông tin cá nhân cơ bản</li>
                                <li>Giao tiếp đơn giản</li>
                            </ul>
                        </div>
                        <div class="level-item">
                            <h5 class="fw-bold text-success">A2 - Sơ cấp</h5>
                            <p class="small text-muted mb-2">Hiểu các câu và cụm từ thường dùng</p>
                            <ul class="small text-muted">
                                <li>Mua sắm, địa lý địa phương</li>
                                <li>Việc làm, gia đình</li>
                                <li>Giao tiếp trong tình huống quen thuộc</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card level-card h-100 animate-on-scroll animate-delay-1">
                    <div class="card-header bg-warning text-white text-center">
                        <h4 class="mb-0">CẤP ĐỘ TRUNG CẤP</h4>
                    </div>
                    <div class="card-body">
                        <div class="level-item mb-3">
                            <h5 class="fw-bold text-warning">B1 - Trung cấp</h5>
                            <p class="small text-muted mb-2">Hiểu những điểm chính của các chủ đề quen thuộc</p>
                            <ul class="small text-muted">
                                <li>Công việc, trường học, giải trí</li>
                                <li>Xử lý tình huống khi du lịch</li>
                                <li>Mô tả kinh nghiệm, sự kiện</li>
                            </ul>
                        </div>
                        <div class="level-item">
                            <h5 class="fw-bold text-warning">B2 - Trung cấp cao</h5>
                            <p class="small text-muted mb-2">Hiểu nội dung chính của văn bản phức tạp</p>
                            <ul class="small text-muted">
                                <li>Chủ đề cụ thể và trừu tượng</li>
                                <li>Thảo luận kỹ thuật trong lĩnh vực chuyên môn</li>
                                <li>Tương tác tự nhiên với người bản ngữ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card level-card h-100 animate-on-scroll animate-delay-2">
                    <div class="card-header bg-danger text-white text-center">
                        <h4 class="mb-0">CẤP ĐỘ CAO</h4>
                    </div>
                    <div class="card-body">
                        <div class="level-item mb-3">
                            <h5 class="fw-bold text-danger">C1 - Nâng cao</h5>
                            <p class="small text-muted mb-2">Hiểu nhiều loại văn bản dài và phức tạp</p>
                            <ul class="small text-muted">
                                <li>Nhận ra ý nghĩa ngụ ý</li>
                                <li>Diễn đạt lưu loát và tự nhiên</li>
                                <li>Sử dụng ngôn ngữ hiệu quả</li>
                            </ul>
                        </div>
                        <div class="level-item">
                            <h5 class="fw-bold text-danger">C2 - Thành thạo</h5>
                            <p class="small text-muted mb-2">Hiểu hầu như mọi thứ nghe hoặc đọc được</p>
                            <ul class="small text-muted">
                                <li>Tóm tắt thông tin từ nhiều nguồn</li>
                                <li>Diễn đạt chính xác sắc thái ý nghĩa</li>
                                <li>Giao tiếp như người bản ngữ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Online Test Section -->
<section class="py-5" id="test-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h3 class="fw-bold text-primary mb-3">
                                <i class="fas fa-clipboard-check me-2"></i>BÀI KIỂM TRA TRÌNH ĐỘ
                            </h3>
                            <p class="text-muted">Vui lòng điền thông tin để bắt đầu bài kiểm tra</p>
                        </div>
                        
                        <div id="test-form-section">
                            <form id="testForm" class="test-form">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="testName" class="form-label">Họ và tên *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" id="testName" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="testPhone" class="form-label">Số điện thoại *</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input type="tel" class="form-control" id="testPhone" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="testEmail" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="testEmail">
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="testExperience" class="form-label">Kinh nghiệm học tiếng Đức</label>
                                    <select class="form-select" id="testExperience">
                                        <option value="">Chọn mức độ</option>
                                        <option value="none">Chưa từng học</option>
                                        <option value="beginner">Mới bắt đầu (dưới 6 tháng)</option>
                                        <option value="elementary">Cơ bản (6 tháng - 1 năm)</option>
                                        <option value="intermediate">Trung cấp (1-2 năm)</option>
                                        <option value="advanced">Nâng cao (trên 2 năm)</option>
                                    </select>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg btn-liquid px-5">
                                        <i class="fas fa-play me-2"></i>BẮT ĐẦU KIỂM TRA
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <div id="test-questions-section" style="display: none;">
                            <div class="test-header mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0">Câu hỏi <span id="currentQuestion">1</span>/30</h4>
                                    <div class="timer">
                                        <i class="fas fa-clock text-warning me-2"></i>
                                        <span id="timeRemaining">15:00</span>
                                    </div>
                                </div>
                                <div class="progress mt-2">
                                    <div class="progress-bar" id="progressBar" style="width: 3.33%"></div>
                                </div>
                            </div>
                            
                            <div id="questionContainer">
                                <!-- Questions will be loaded here -->
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-outline-secondary me-3" id="prevBtn" disabled>
                                    <i class="fas fa-arrow-left me-2"></i>Câu trước
                                </button>
                                <button type="button" class="btn btn-primary" id="nextBtn">
                                    Câu tiếp <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                                <button type="button" class="btn btn-success" id="submitBtn" style="display: none;">
                                    <i class="fas fa-check me-2"></i>Hoàn thành
                                </button>
                            </div>
                        </div>
                        
                        <div id="test-result-section" style="display: none;">
                            <div class="text-center">
                                <div class="result-icon mb-4">
                                    <i class="fas fa-trophy fa-4x text-warning"></i>
                                </div>
                                <h3 class="fw-bold text-primary mb-3">KẾT QUẢ KIỂM TRA</h3>
                                <div class="result-level mb-4">
                                    <h2 class="display-4 fw-bold text-success" id="resultLevel">B1</h2>
                                    <p class="lead text-muted" id="resultDescription">Trung cấp</p>
                                </div>
                                <div class="result-details mb-4">
                                    <p class="text-muted">Điểm số: <strong id="resultScore">24/30</strong></p>
                                    <p class="text-muted">Tỷ lệ đúng: <strong id="resultPercentage">80%</strong></p>
                                </div>
                                <div class="result-recommendation">
                                    <h5 class="fw-bold mb-3">Khuyến nghị:</h5>
                                    <p id="resultRecommendation" class="text-muted mb-4">
                                        Bạn phù hợp với khóa học Trung cấp B1-B2. Hãy liên hệ để được tư vấn chi tiết về lộ trình học.
                                    </p>
                                </div>
                                <div class="result-actions">
                                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg me-3">
                                        <i class="fas fa-user-tie me-2"></i>Tư Vấn Lộ Trình
                                    </a>
                                    <button type="button" class="btn btn-outline-primary btn-lg" onclick="location.reload()">
                                        <i class="fas fa-redo me-2"></i>Làm Lại
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-primary mb-3 animate-on-scroll">SAU KHI KIỂM TRA</h2>
            <p class="lead text-muted animate-on-scroll animate-delay-1">Những gì bạn nhận được từ kết quả kiểm tra</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll">
                    <div class="card-body p-4">
                        <i class="fas fa-route fa-3x text-primary mb-3"></i>
                        <h5 class="fw-bold mb-3">Lộ Trình Cá Nhân</h5>
                        <p class="text-muted">Tư vấn lộ trình học phù hợp với trình độ hiện tại của bạn</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll animate-delay-1">
                    <div class="card-body p-4">
                        <i class="fas fa-book-open fa-3x text-success mb-3"></i>
                        <h5 class="fw-bold mb-3">Tài Liệu Học Tập</h5>
                        <p class="text-muted">Nhận tài liệu ôn tập phù hợp với cấp độ của bạn</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow-sm text-center animate-on-scroll animate-delay-2">
                    <div class="card-body p-4">
                        <i class="fas fa-percentage fa-3x text-warning mb-3"></i>
                        <h5 class="fw-bold mb-3">Ưu Đãi Đặc Biệt</h5>
                        <p class="text-muted">Giảm giá 15% khi đăng ký khóa học trong vòng 7 ngày</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .level-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .level-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .test-form .input-group-text {
        background: var(--primary-color);
        color: white;
        border: none;
    }
    
    .test-form .form-control,
    .test-form .form-select {
        border: 2px solid #e9ecef;
        border-left: none;
        transition: all 0.3s ease;
    }
    
    .test-form .form-control:focus,
    .test-form .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
    }
    
    .timer {
        font-size: 1.2rem;
        font-weight: bold;
    }
    
    .progress {
        height: 8px;
    }
    
    .result-icon {
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }
    
    .question-option {
        padding: 15px;
        margin: 10px 0;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .question-option:hover {
        border-color: var(--primary-color);
        background-color: rgba(52, 144, 220, 0.1);
    }
    
    .question-option.selected {
        border-color: var(--primary-color);
        background-color: rgba(52, 144, 220, 0.2);
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const testForm = document.getElementById('testForm');
    const testFormSection = document.getElementById('test-form-section');
    const testQuestionsSection = document.getElementById('test-questions-section');
    const testResultSection = document.getElementById('test-result-section');
    
    // Sample questions (in real implementation, these would come from backend)
    const questions = [
        {
            question: "Wie _____ Sie?",
            options: ["heißen", "heiße", "heißt", "heißen Sie"],
            correct: 0
        },
        {
            question: "Ich _____ aus Vietnam.",
            options: ["bin", "komme", "wohne", "lebe"],
            correct: 1
        },
        // Add more questions here...
    ];
    
    let currentQuestionIndex = 0;
    let answers = [];
    let timeLeft = 15 * 60; // 15 minutes in seconds
    let timer;
    
    testForm.addEventListener('submit', function(e) {
        e.preventDefault();
        startTest();
    });
    
    function startTest() {
        testFormSection.style.display = 'none';
        testQuestionsSection.style.display = 'block';
        
        startTimer();
        showQuestion(0);
    }
    
    function startTimer() {
        timer = setInterval(function() {
            timeLeft--;
            updateTimerDisplay();
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                finishTest();
            }
        }, 1000);
    }
    
    function updateTimerDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        document.getElementById('timeRemaining').textContent = 
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }
    
    function showQuestion(index) {
        // Implementation for showing questions
        // This would be more complex in real implementation
    }
    
    function finishTest() {
        clearInterval(timer);
        testQuestionsSection.style.display = 'none';
        testResultSection.style.display = 'block';
        
        // Calculate and show results
        calculateResults();
    }
    
    function calculateResults() {
        // Implementation for calculating results
        // This would involve scoring logic based on CEFR levels
    }
});
</script>
@endpush