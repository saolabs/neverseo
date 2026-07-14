<?php
// sections/logos.php — Dải tin dùng (social proof strip)
$logos = [
    ['icon' => 'ph-storefront',      'name' => 'ThuongHieuViet'],
    ['icon' => 'ph-buildings',       'name' => 'AnPhat Group'],
    ['icon' => 'ph-rocket-launch',   'name' => 'StartupX'],
    ['icon' => 'ph-shopping-cart',   'name' => 'MuaSamNhanh'],
    ['icon' => 'ph-globe-hemisphere-west', 'name' => 'GlobalMedia'],
    ['icon' => 'ph-graduation-cap',  'name' => 'EduPlus'],
];
?>
<section class="logos-strip" aria-label="Được tin dùng bởi">
    <div class="site-shell">
        <p class="logos-eyebrow">Đồng hành cùng hơn <strong>50+ doanh nghiệp &amp; dự án</strong> tại Việt Nam</p>
        <div class="logos-track">
            <?php foreach ($logos as $logo): ?>
                <div class="logo-chip">
                    <i class="ph <?php echo $logo['icon']; ?>" aria-hidden="true"></i>
                    <span><?php echo $logo['name']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
