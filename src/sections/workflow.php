<?php
// sections/workflow.php
?>
<section id="workflow" class="studio-section workflow-section" aria-labelledby="workflow-title">
    <div class="site-shell">
        <div class="section-intro text-center" style="max-width: 980px; margin: 0 auto 60px auto;">
            <p class="section-label label-brand">Quy trình Khép kín</p>
            <h2 id="workflow-title">Hệ thống "Gating" 4 bước</h2>
            <p>
                Với quy trình tự động hóa khép kín 4 bước từ Khám bệnh (Audit) đến Soạn thảo nội dung, hệ thống giúp bạn chuẩn hóa toàn bộ luồng công việc phức tạp của một Agency SEO chuyên nghiệp, đảm bảo mọi chiến dịch luôn đi đúng hướng và đạt hiệu quả tối đa.
            </p>
        </div>

        <div class="workflow-tabs-container">
            <!-- Left: Tab List -->
            <div class="workflow-tab-list">
                <button class="workflow-tab-item active" data-tab="step-1">
                    <span class="step-index">01</span>
                    <div class="tab-text">
                        <h3>Khám bệnh website (Audit)</h3>
                        <p>Tự động phát hiện lỗ hổng Thương hiệu, Technical, Off-page và đề xuất "Quick Win".</p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-2">
                    <span class="step-index">02</span>
                    <div class="tab-text">
                        <h3>Lập Chiến lược & Bản đồ</h3>
                        <p>Phân tích bối cảnh, gom cụm từ khóa và xây dựng Topical Map chuyên sâu.</p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-3">
                    <span class="step-index">03</span>
                    <div class="tab-text">
                        <h3>Lên Kế hoạch nội dung hằng tháng</h3>
                        <p>Sinh lịch bài tự động với Dàn ý, Internal Link và yêu cầu Media chi tiết.</p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-4">
                    <span class="step-index">04</span>
                    <div class="tab-text">
                        <h3>Soạn thảo Thông minh</h3>
                        <p>AI viết bài 1-click dựa trên Outline. Chấm điểm On-page (0-100) real-time.</p>
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
