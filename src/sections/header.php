<?php
// sections/header.php

?>
<header class="site-header">
    <div class="site-shell">
        <div class="site-header-row">
            <a href="<?= $LANG === 'vi' ? '/vn/' : '/' ?>" class="site-logo" aria-label="NeverSEO trang chủ">
                <span class="site-logo-mark">
                    <i class="ph ph-graph" aria-hidden="true"></i>
                </span>
                <span><span class="logo-never">Never</span><span class="logo-seo">SEO</span></span>
            </a>

            <div class="site-header-collapse" id="site-menu">
                <div class="site-menu-head">
                    <span class="site-menu-title">Menu</span>
                    <button type="button" class="site-menu-close" aria-label="Đóng menu">
                        <i class="ph ph-x" aria-hidden="true"></i>
                    </button>
                </div>

                <nav class="site-nav" aria-label="Điều hướng chính">
                    <a href="<?= $url_prefix ?? '' ?>#solution"><?= __('nav.solution') ?></a>
                    <a href="<?= $url_prefix ?? '' ?>#workflow"><?= __('nav.workflow') ?></a>
                    <a href="<?= $url_prefix ?? '' ?>#features"><?= __('nav.features') ?></a>
                    <a href="<?= $url_prefix ?? '' ?>#pricing"><?= __('nav.pricing') ?></a>
                    <a href="<?= $url_prefix ?? '' ?>#faq"><?= __('nav.faq') ?></a>
                </nav>

                <div class="site-header-actions">
                    <a href="https://app.neverseo.com/login" class="site-login-link"><?= __('nav.login') ?></a>
                    <a href="https://app.neverseo.com/register" class="site-header-cta">
                        <?= __('nav.cta') ?>
                        <i class="ph-bold ph-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="site-mobile-menu">
                <button type="button" class="site-mobile-toggle" aria-label="Mở menu" aria-expanded="false" aria-controls="site-menu">
                    <i class="ph ph-list" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="site-menu-backdrop" hidden></div>
</header>
