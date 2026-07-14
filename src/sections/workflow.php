<?php
// sections/workflow.php
?>
<section id="workflow" class="studio-section workflow-section" aria-labelledby="workflow-title">
    <div class="site-shell">
        <div class="section-intro text-center" style="max-width: 980px; margin: 0 auto 60px auto;">
            <p class="section-label label-brand"><?= __('workflow.label') ?></p>
            <h2 id="workflow-title"><?= __('workflow.title') ?></h2>
            <p style="max-width: 720px; margin-left: auto; margin-right: auto;">
                <?= __('workflow.desc') ?>
            </p>
        </div>

        <div class="workflow-tabs-container">
            <!-- Left: Tab List -->
            <div class="workflow-tab-list">
                <button class="workflow-tab-item active" data-tab="step-1">
                    <span class="step-index">01</span>
                    <div class="tab-text">
                        <h3><?= __('workflow.steps.0.title') ?></h3>
                        <p><?= __('workflow.steps.0.desc') ?></p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-2">
                    <span class="step-index">02</span>
                    <div class="tab-text">
                        <h3><?= __('workflow.steps.1.title') ?></h3>
                        <p><?= __('workflow.steps.1.desc') ?></p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-3">
                    <span class="step-index">03</span>
                    <div class="tab-text">
                        <h3><?= __('workflow.steps.2.title') ?></h3>
                        <p><?= __('workflow.steps.2.desc') ?></p>
                    </div>
                </button>
                <button class="workflow-tab-item" data-tab="step-4">
                    <span class="step-index">04</span>
                    <div class="tab-text">
                        <h3><?= __('workflow.steps.3.title') ?></h3>
                        <p><?= __('workflow.steps.3.desc') ?></p>
                    </div>
                </button>
            </div>

            <!-- Right: Tab Content (Images) -->
            <div class="workflow-tab-panels">
                <div class="tab-panel active" id="step-1">
                    <div class="panel-visual">
                        <img src="/assets/img/step-audit.png" alt="<?= __('workflow.alt_images.0') ?>">
                    </div>
                </div>
                <div class="tab-panel" id="step-2">
                    <div class="panel-visual">
                        <img src="/assets/img/step-strategy.png" alt="<?= __('workflow.alt_images.1') ?>">
                    </div>
                </div>
                <div class="tab-panel" id="step-3">
                    <div class="panel-visual">
                        <img src="/assets/img/step-plan.png" alt="<?= __('workflow.alt_images.2') ?>">
                    </div>
                </div>
                <div class="tab-panel" id="step-4">
                    <div class="panel-visual">
                        <img src="/assets/img/step-write.png" alt="<?= __('workflow.alt_images.3') ?>">
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
