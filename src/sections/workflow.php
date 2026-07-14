<?php
// sections/workflow.php
?>
<section id="workflow" class="studio-section workflow-section" aria-labelledby="workflow-title">
    <div class="site-shell">
        <div class="section-intro text-center" style="max-width: 980px; margin: 0 auto 60px auto;">
            <p class="section-label label-brand">Quy trình làm việc</p>
            <h2 id="workflow-title">Quy trình 4 bước tinh gọn</h2>
            <p style="max-width: 720px; margin-left: auto; margin-right: auto;">
                Quy trình chuẩn hóa giúp bạn dễ dàng theo dõi toàn bộ chiến dịch SEO — từ bước phân tích hiện trạng cho đến khi xuất bản và đo lường kết quả.
            </p>
        </div>

        <div class="workflow-tabs-container">
            <!-- Left: Tab List -->
            <div class="workflow-tab-list">
                <button class="workflow-tab-item active" data-tab="step-1">
                    <span class="step-index">01</span>
                    <div class="tab-text">
                        <h3>1. Phân tích hiện trạng website</h3>
                        <p>Hệ thống tự động quét website để chỉ ra những lỗi cần khắc phục, đánh giá sức khỏe SEO và tìm kiếm cơ hội tăng trưởng nhanh.</p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-2">
                    <span class="step-index">02</span>
                    <div class="tab-text">
                        <h3>2. Xây dựng kế hoạch nội dung</h3>
                        <p>Thay vì tập trung vào từ khóa lẻ tẻ, hệ thống giúp nhóm các chủ đề liên quan để xây dựng kế hoạch nội dung toàn diện và mạch lạc.</p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-3">
                    <span class="step-index">03</span>
                    <div class="tab-text">
                        <h3>3. Lên dàn ý và viết bài với AI</h3>
                        <p>Tạo dàn ý chi tiết dựa trên dữ liệu tìm kiếm. Tích hợp AI để hỗ trợ soạn thảo nhanh chóng, đảm bảo chuẩn SEO và thân thiện với người đọc.</p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-4">
                    <span class="step-index">04</span>
                    <div class="tab-text">
                        <h3>4. Kiểm duyệt và đo lường</h3>
                        <p>Hệ thống chấm điểm SEO trước khi đăng bài. Sau đó theo dõi thứ hạng, lượng truy cập để liên tục đề xuất các bước tối ưu tiếp theo.</p>
                    </div>
                </button>
            </div>

            <!-- Right: Tab Content (Images) -->
            <div class="workflow-tab-panels">
                <div class="tab-panel active" id="step-1">
                    <div class="panel-visual">
                        <img src="assets/img/step-audit.png" alt="Audit & Technical SEO">
                    </div>
                </div>
                <div class="tab-panel" id="step-2">
                    <div class="panel-visual">
                        <img src="assets/img/step-strategy.png" alt="Chiến lược & Topical Map">
                    </div>
                </div>
                <div class="tab-panel" id="step-3">
                    <div class="panel-visual">
                        <img src="assets/img/step-plan.png" alt="Kế hoạch Content chi tiết">
                    </div>
                </div>
                <div class="tab-panel" id="step-4">
                    <div class="panel-visual">
                        <img src="assets/img/step-write.png" alt="AI Writing & Quality Control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.workflow-tab-item');
    const panels = document.querySelectorAll('.tab-panel');
    const container = document.querySelector('.workflow-tabs-container');
    
    let currentIndex = 0;
    let autoPlayInterval;
    const intervalTime = 4000; // 4 seconds

    function activateTab(index) {
        // Remove active from all tabs
        tabs.forEach(t => t.classList.remove('active'));
        // Remove active from all panels
        panels.forEach(p => p.classList.remove('active'));

        // Add active to targeted tab
        tabs[index].classList.add('active');
        
        // Add active to corresponding panel
        const targetId = tabs[index].getAttribute('data-tab');
        document.getElementById(targetId).classList.add('active');
        
        currentIndex = index;
    }

    function startAutoPlay() {
        // Only autoplay on desktop (wider than 991px)
        if (window.innerWidth > 991) {
            autoPlayInterval = setInterval(() => {
                let nextIndex = (currentIndex + 1) % tabs.length;
                activateTab(nextIndex);
            }, intervalTime);
        }
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    // Manual click handling
    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            activateTab(index);
        });
    });

    // Pause on hover
    if (container) {
        container.addEventListener('mouseenter', stopAutoPlay);
        container.addEventListener('mouseleave', startAutoPlay);
    }

    // Handle resize to restart/stop autoplay if crossing the breakpoint
    window.addEventListener('resize', () => {
        stopAutoPlay();
        startAutoPlay();
    });

    // Start initially
    startAutoPlay();
});
</script>
