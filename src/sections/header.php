<?php
// sections/header.php
$home_url = (isset($current_url) && $current_url) ? ($LANG === 'vi' ? '/vn/' : '/') : '';
?>
<div id="lang-banner" class="lang-banner" hidden>
    <div class="site-shell lang-banner-inner">
        <span id="lang-banner-text"></span>
        <button id="lang-banner-close" aria-label="Close"><i class="ph ph-x" aria-hidden="true"></i></button>
    </div>
</div>

<header class="site-header <?= isset($current_url) && $current_url ? 'site-header-solid ' . $current_url : '' ?>">
    <div class="site-shell">
        <div class="site-header-row">
            <a href="<?= !isset($current_url) || $current_url === '' ? '#hero-section' : $home_url ?>" class="site-logo" aria-label="NeverSEO trang chủ">
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
                    <a href="<?= $home_url ?>#solution"><?= __('nav.solution') ?></a>
                    <a href="<?= $home_url ?>#workflow"><?= __('nav.workflow') ?></a>
                    <a href="<?= $home_url ?>#features"><?= __('nav.features') ?></a>
                    <a href="<?= $home_url ?>#pricing"><?= __('nav.pricing') ?></a>
                    <a href="<?= $home_url ?>#faq"><?= __('nav.faq') ?></a>
                    <a href="<?= $home_url ?>#team"><?= __('nav.team') ?></a>
                    <a href="<?= $home_url ?>#contact"><?= __('nav.contact') ?></a>
                </nav>

                <div class="site-header-actions">
                    <a href="https://app.neverseo.com/login" class="site-login-link"><?= __('nav.login') ?></a>
                    <a href="https://app.neverseo.com/signup" class="site-header-cta">
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
