<?php
// sections/hero.php
?>
<section class="hero-studio" aria-labelledby="hero-title">
    <div class="site-shell">
        <div class="hero-split-layout">
            
            <div class="hero-copy">
                <p class="hero-eyebrow"><?= __('hero.eyebrow') ?></p>
                <h1 id="hero-title"><?= __('hero.title_start') ?><span class="gradient-text"><?= __('hero.title_gradient') ?></span></h1>
                <p class="hero-lead">
                    <?= __('hero.lead') ?>
                </p>

                <div class="hero-actions" aria-label="Hành động chính">
                    <a href="https://app.neverseo.com/register" class="button button-primary shadow-button">
                        <?= __('hero.cta_start') ?>
                        <i class="ph-bold ph-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a href="#workflow" class="button button-secondary"><?= __('hero.cta_secondary') ?></a>
                </div>
                
                <div class="hero-proof-row">
                    <div class="proof-item">
                        <i class="ph-fill ph-check-circle"></i> <?= __('hero.proof_1') ?>
                    </div>
                    <div class="proof-item">
                        <i class="ph-fill ph-check-circle"></i> <?= __('hero.proof_2') ?>
                    </div>
                    <div class="proof-item">
                        <i class="ph-fill ph-check-circle"></i> <?= __('hero.proof_3') ?>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="dashboard-glow"></div>
                <img src="/assets/img/hero-dashboard.png" alt="Giao diện Dashboard Quản trị SEO" class="hero-dashboard-img">
            </div>

        </div>
    </div>
</section>
