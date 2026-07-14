<?php
// sections/audience.php
?>
<section id="audience" class="studio-section audience-section" aria-labelledby="audience-title">
    <div class="site-shell">
        <div class="section-intro compact-intro">
            <p class="section-label"><?= __('audience.label') ?></p>
            <h2 id="audience-title"><?= __('audience.title') ?></h2>
        </div>

        <div class="audience-grid">
            <article class="audience-card card-manager">
                <div class="card-header">
                    <div class="audience-icon"><i class="ph-duotone ph-chart-line-up" aria-hidden="true"></i></div>
                    <span class="audience-badge"><?= __('audience.items.0.badge') ?></span>
                </div>
                <h3><?= __('audience.items.0.title') ?></h3>
                <p><?= __('audience.items.0.desc') ?></p>
            </article>

            <article class="audience-card card-seo">
                <div class="card-header">
                    <div class="audience-icon"><i class="ph-duotone ph-crosshair" aria-hidden="true"></i></div>
                    <span class="audience-badge"><?= __('audience.items.1.badge') ?></span>
                </div>
                <h3><?= __('audience.items.1.title') ?></h3>
                <p><?= __('audience.items.1.desc') ?></p>
            </article>

            <article class="audience-card card-writer">
                <div class="card-header">
                    <div class="audience-icon"><i class="ph-duotone ph-pen-nib" aria-hidden="true"></i></div>
                    <span class="audience-badge"><?= __('audience.items.2.badge') ?></span>
                </div>
                <h3><?= __('audience.items.2.title') ?></h3>
                <p><?= __('audience.items.2.desc') ?></p>
            </article>
        </div>
    </div>
</section>
