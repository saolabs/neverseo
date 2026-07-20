<?php
// sections/geo.php — AI Search Visibility (GEO)
// Icon chỉ được chọn trong bộ Phosphor đã subset (xem partials/_icons.scss).
$geo_icons = [
    'ph-robot',
    'ph-sparkle',
    'ph-quotes',
    'ph-buildings',
    'ph-globe',
];

$geo_items   = __('geo.items');
$geo_engines = __('geo.engines');
?>
<section id="geo" class="studio-section geo-section" aria-labelledby="geo-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-geo"><?= __('geo.label') ?></p>
            <h2 id="geo-title"><?= __('geo.title_start') ?><span class="gradient-text"><?= __('geo.title_gradient') ?></span></h2>
            <p><?= __('geo.desc') ?></p>
        </div>

        <div class="geo-grid">
            <?php foreach ($geo_items as $i => $item): ?>
                <article class="geo-card<?= $i === 0 ? ' geo-card-lead' : '' ?>">
                    <div class="geo-card-icon">
                        <i class="ph-duotone <?= $geo_icons[$i] ?? 'ph-check-circle' ?>" aria-hidden="true"></i>
                    </div>
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['desc'] ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="geo-engines">
            <p class="geo-engines-label"><?= __('geo.engines_label') ?></p>
            <div class="geo-engines-row">
                <?php foreach ($geo_engines as $engine): ?>
                    <div class="geo-engine-chip">
                        <i class="ph-fill ph-check-circle" aria-hidden="true"></i>
                        <span><?= $engine ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
