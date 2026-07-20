<?php
// sections/ops.php — Lớp vận hành: đa dự án, phân quyền, xuất bản, báo cáo.
// Đây là phần "quản trị" trong "nền tảng quản trị SEO", tách khỏi phần chuyên môn.
// Icon chỉ được chọn trong bộ Phosphor đã subset (xem partials/_icons.scss).
$ops_icons = [
    'ph-buildings',
    'ph-user-gear',
    'ph-checks',
    'ph-paper-plane-tilt',
    'ph-clock-countdown',
    'ph-chart-bar',
];

$ops_items = __('ops.items');
?>
<section id="ops" class="studio-section ops-section" aria-labelledby="ops-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('ops.label') ?></p>
            <h2 id="ops-title"><?= __('ops.title_start') ?><span class="gradient-text"><?= __('ops.title_gradient') ?></span></h2>
            <p><?= __('ops.desc') ?></p>
        </div>

        <div class="ops-grid">
            <?php foreach ($ops_items as $i => $item): ?>
                <article class="ops-card">
                    <div class="ops-card-icon">
                        <i class="ph-duotone <?= $ops_icons[$i] ?? 'ph-check-circle' ?>" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h3><?= $item['title'] ?></h3>
                        <p><?= $item['desc'] ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
