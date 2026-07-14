<?php
// sections/problems.php
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
            <article class="problem-card">
                <i class="ph-duotone ph-map-trifold" aria-hidden="true"></i>
                <h3><?= __('problems.items.0.title') ?></h3>
                <p><?= __('problems.items.0.desc') ?></p>
            </article>

            <article class="problem-card">
                <i class="ph-duotone ph-coins" aria-hidden="true"></i>
                <h3><?= __('problems.items.1.title') ?></h3>
                <p><?= __('problems.items.1.desc') ?></p>
            </article>

            <article class="problem-card">
                <i class="ph-duotone ph-chart-line-up" aria-hidden="true"></i>
                <h3><?= __('problems.items.2.title') ?></h3>
                <p><?= __('problems.items.2.desc') ?></p>
            </article>
        </div>
    </div>
</section>
