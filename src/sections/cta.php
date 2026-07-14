<?php
// sections/cta.php
?>
<section class="studio-cta" aria-labelledby="cta-title">
    <div class="site-shell">
        <div class="cta-panel">
            <div>
                <p class="section-label"><?= __('cta.label') ?></p>
                <h2 id="cta-title"><?= __('cta.title') ?></h2>
                <p><?= __('cta.desc') ?></p>
            </div>
            <div class="cta-actions">
                <a href="https://app.neverseo.com/register" class="button button-primary button-light">
                    <?= __('cta.btn_primary') ?>
                    <i class="ph-bold ph-arrow-right" aria-hidden="true"></i>
                </a>
                <a href="https://app.neverseo.com/login" class="button button-secondary button-on-dark"><?= __('cta.btn_secondary') ?></a>
            </div>
        </div>
    </div>
</section>
