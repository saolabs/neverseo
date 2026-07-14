<?php
// terms.php
$page_title = __('terms.meta_title');
$page_description = __('terms.meta_desc');
$page_path = get_lang_url($LANG);
$current_url = "terms.html";

$sections_dir = __DIR__ . '/sections/';
?>
<?php include $sections_dir . 'head.php'; ?>
<?php include $sections_dir . 'header.php'; ?>

<main class="legal-page">
    <div class="legal-container">
        <div class="legal-header">
            <p class="section-label"><?= __('terms.label') ?></p>
            <h1><?= __('terms.title') ?></h1>
            <p><?= __('terms.date') ?></p>
        </div>

        <article class="legal-card">
            <div>
                <p><?= __('terms.intro') ?></p>

                <h3>
                    <i class="ph-fill ph-rocket-launch"></i>
                    <?= __('terms.h1') ?>
                </h3>
                <p><?= __('terms.p1') ?></p>

                <h3>
                    <i class="ph-fill ph-user-circle"></i>
                    <?= __('terms.h2') ?>
                </h3>
                <ul>
                    <li><?= __('terms.l2_1') ?></li>
                    <li><?= __('terms.l2_2') ?></li>
                    <li><?= __('terms.l2_3') ?></li>
                </ul>

                <h3>
                    <i class="ph-fill ph-copyright"></i>
                    <?= __('terms.h3') ?>
                </h3>
                <p><?= __('terms.p3') ?></p>

                <h3>
                    <i class="ph-fill ph-warning-circle"></i>
                    <?= __('terms.h4') ?>
                </h3>
                <p><?= __('terms.p4') ?></p>
                <ul>
                    <li><?= __('terms.l4_1') ?></li>
                    <li><?= __('terms.l4_2') ?></li>
                    <li><?= __('terms.l4_3') ?></li>
                </ul>

                <h3>
                    <i class="ph-fill ph-shield-warning"></i>
                    <?= __('terms.h5') ?>
                </h3>
                <p><?= __('terms.p5') ?></p>

                <h3>
                    <i class="ph-fill ph-arrows-clockwise"></i>
                    <?= __('terms.h6') ?>
                </h3>
                <p><?= __('terms.p6') ?></p>
            </div>
        </article>
    </div>
</main>

<?php include $sections_dir . 'footer.php'; ?>
