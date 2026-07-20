<?php
// sections/problems.php
// Icon chỉ được chọn trong bộ Phosphor đã subset (xem partials/_icons.scss).
$problem_icons = ['ph-map-trifold', 'ph-robot', 'ph-coins', 'ph-sparkle'];
$problem_items = __('problems.items');
?>
<section id="problem" class="studio-section problem-section" aria-labelledby="problem-title">
    <div class="site-shell">
        <div class="section-intro">
            <p class="section-label"><?= __('problems.label') ?></p>
            <h2 id="problem-title"><?= __('problems.title') ?></h2>
            <p>
                <?= __('problems.desc') ?>
            </p>
        </div>

        <div class="problem-grid">
            <?php foreach ($problem_items as $i => $item): ?>
                <article class="problem-card">
                    <i class="ph-duotone <?= $problem_icons[$i] ?? 'ph-warning-circle' ?>" aria-hidden="true"></i>
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['desc'] ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
