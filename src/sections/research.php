<?php
// sections/research.php — Nền tảng chiến lược: nghiên cứu trước khi viết
// Icon chỉ được chọn trong bộ Phosphor đã subset (xem partials/_icons.scss).
$research_icons = [
    'ph-globe-hemisphere-west',
    'ph-user-circle',
    'ph-shield-check',
    'ph-crosshair',
    'ph-magnifying-glass',
    'ph-tree-structure',
];
$research_note_icons = ['ph-database', 'ph-graph'];

$research_items = __('research.items');
$research_notes = __('research.notes');
?>
<section id="research" class="studio-section research-section" aria-labelledby="research-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('research.label') ?></p>
            <h2 id="research-title"><?= __('research.title_start') ?><span class="gradient-text"><?= __('research.title_gradient') ?></span></h2>
            <p><?= __('research.desc') ?></p>
        </div>

        <div class="research-grid">
            <?php foreach ($research_items as $i => $item): ?>
                <article class="research-card">
                    <div class="research-card-icon">
                        <i class="ph-duotone <?= $research_icons[$i] ?? 'ph-check-circle' ?>" aria-hidden="true"></i>
                    </div>
                    <h3><?= $item['title'] ?></h3>
                    <p><?= $item['desc'] ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="research-notes">
            <?php foreach ($research_notes as $i => $note): ?>
                <div class="research-note">
                    <i class="ph-duotone <?= $research_note_icons[$i] ?? 'ph-info' ?>" aria-hidden="true"></i>
                    <div>
                        <h3><?= $note['title'] ?></h3>
                        <p><?= $note['desc'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
