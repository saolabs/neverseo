<?php
// privacy.php
$page_title = __('privacy.meta_title');
$page_description = __('privacy.meta_desc');
$page_path = get_lang_url($LANG);
$current_url = "privacy.html";


$sections_dir = __DIR__ . '/sections/';
?>
<?php include $sections_dir . 'head.php'; ?>
<?php include $sections_dir . 'header.php'; ?>

<main class="legal-page">
    <div class="legal-container">
        <div class="legal-header">
            <p class="section-label"><?= __('privacy.label') ?></p>
            <h1><?= __('privacy.title') ?></h1>
            <p><?= __('privacy.date') ?></p>
        </div>

        <article class="legal-card">
            <div>
                <p><?= __('privacy.intro') ?></p>

                <h3>
                    <i class="ph-fill ph-info"></i>
                    <?= __('privacy.h1') ?>
                </h3>
                <p><?= __('privacy.p1') ?></p>
                <ul>
                    <li><?= __('privacy.l1_1') ?></li>
                    <li><?= __('privacy.l1_2') ?></li>
                    <li><?= __('privacy.l1_3') ?></li>
                </ul>

                <h3>
                    <i class="ph-fill ph-google-logo"></i>
                    <?= __('privacy.h2') ?>
                </h3>
                <p><?= __('privacy.p2_1') ?></p>
                <p><?= __('privacy.p2_2') ?></p>
                <ul>
                    <li><?= __('privacy.l2_1') ?></li>
                    <li><?= __('privacy.l2_2') ?></li>
                    <li><?= __('privacy.l2_3') ?></li>
                </ul>

                <h3>
                    <i class="ph-fill ph-shield-check"></i>
                    <?= __('privacy.h3') ?>
                </h3>
                <p><?= __('privacy.p3') ?></p>

                <h3>
                    <i class="ph-fill ph-user-gear"></i>
                    <?= __('privacy.h4') ?>
                </h3>
                <p><?= __('privacy.p4') ?></p>

                <h3>
                    <i class="ph-fill ph-envelope-simple"></i>
                    <?= __('privacy.h5') ?>
                </h3>
                <p><?= __('privacy.p5') ?></p>
            </div>
        </article>
    </div>
</main>

<?php include $sections_dir . 'footer.php'; ?>
