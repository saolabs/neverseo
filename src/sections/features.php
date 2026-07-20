<?php
// sections/features.php — Tính năng chi tiết + Tích hợp
// Icon theo thứ tự items trong locale; 3 mục cuối là kỹ thuật / off-page / thứ hạng.
$feature_icons = [
    'ph-magnifying-glass', 'ph-tree-structure', 'ph-calendar-check',
    'ph-quotes', 'ph-checks', 'ph-chart-donut',
    'ph-warning-circle', 'ph-graph', 'ph-crosshair',
];
$features = [];
foreach (__('features.items') as $i => $item) {
    $features[] = [
        'icon'  => $feature_icons[$i] ?? 'ph-check-circle',
        'title' => $item['title'],
        'desc'  => $item['desc'],
    ];
}

$integrations = [
    ['icon' => 'ph-google-logo',      'name' => 'Search Console'],
    ['icon' => 'ph-chart-bar',        'name' => 'Google Analytics'],
    ['icon' => 'ph-layout',           'name' => 'WordPress'],
    ['icon' => 'ph-brain',            'name' => 'OpenAI'],
    ['icon' => 'ph-sparkle',          'name' => 'Anthropic'],
    ['icon' => 'ph-robot',            'name' => 'Google Gemini'],
];
?>
<section id="features" class="studio-section features-section" aria-labelledby="features-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('features.label') ?></p>
            <h2 id="features-title"><?= __('features.title_start') ?><span class="gradient-text"><?= __('features.title_gradient') ?></span></h2>
            <p><?= __('features.desc') ?></p>
        </div>

        <div class="features-grid">
            <?php foreach ($features as $f): ?>
                <article class="feature-tile">
                    <div class="feature-tile-icon"><i class="ph-duotone <?php echo $f['icon']; ?>" aria-hidden="true"></i></div>
                    <h3><?php echo $f['title']; ?></h3>
                    <p><?php echo $f['desc']; ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="integrations">
            <p class="integrations-label"><?= __('features.integrations_label') ?></p>
            <div class="integrations-row">
                <?php foreach ($integrations as $i): ?>
                    <div class="integration-chip">
                        <i class="ph <?php echo $i['icon']; ?>" aria-hidden="true"></i>
                        <span><?php echo $i['name']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
