<?php
// sections/features.php — Tính năng chi tiết + Tích hợp
$features = [
    ['icon' => 'ph-magnifying-glass', 'title' => __('features.items.0.title'), 'desc' => __('features.items.0.desc')],
    ['icon' => 'ph-tree-structure',   'title' => __('features.items.1.title'), 'desc' => __('features.items.1.desc')],
    ['icon' => 'ph-calendar-check',   'title' => __('features.items.2.title'), 'desc' => __('features.items.2.desc')],
    ['icon' => 'ph-quotes',           'title' => __('features.items.3.title'), 'desc' => __('features.items.3.desc')],
    ['icon' => 'ph-checks',           'title' => __('features.items.4.title'), 'desc' => __('features.items.4.desc')],
    ['icon' => 'ph-chart-donut',      'title' => __('features.items.5.title'), 'desc' => __('features.items.5.desc')],
];

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
