<?php
// sections/pricing.php — Bảng giá đồng bộ với ứng dụng NeverSEO
$plans = [
    [
        'name'    => __('pricing.plans.0.name'),
        'tagline' => __('pricing.plans.0.tagline'),
        'price'   => __('pricing.plans.0.price'),
        'unit'    => __('pricing.plans.0.unit'),
        'period'  => __('pricing.plans.0.period'),
        'cta'     => __('pricing.plans.0.cta'),
        'href'    => 'https://app.neverseo.com/signup',
        'popular' => false,
        'features'=> [
            __('pricing.plans.0.features.0'),
            __('pricing.plans.0.features.1'),
            __('pricing.plans.0.features.2'),
            __('pricing.plans.0.features.3'),
            __('pricing.plans.0.features.4'),
        ],
    ],
    [
        'name'    => __('pricing.plans.1.name'),
        'tagline' => __('pricing.plans.1.tagline'),
        'price'   => __('pricing.plans.1.price'),
        'unit'    => __('pricing.plans.1.unit'),
        'period'  => __('pricing.plans.1.period'),
        'cta'     => __('pricing.plans.1.cta'),
        'href'    => 'https://app.neverseo.com/signup',
        'popular' => false,
        'features'=> [
            __('pricing.plans.1.features.0'),
            __('pricing.plans.1.features.1'),
            __('pricing.plans.1.features.2'),
            __('pricing.plans.1.features.3'),
            __('pricing.plans.1.features.4'),
            __('pricing.plans.1.features.5'),
            __('pricing.plans.1.features.6'),
        ],
    ],
    [
        'name'    => __('pricing.plans.2.name'),
        'tagline' => __('pricing.plans.2.tagline'),
        'price'   => __('pricing.plans.2.price'),
        'unit'    => __('pricing.plans.2.unit'),
        'period'  => __('pricing.plans.2.period'),
        'cta'     => __('pricing.plans.2.cta'),
        'href'    => 'https://app.neverseo.com/signup',
        'popular' => true,
        'features'=> [
            __('pricing.plans.2.features.0'),
            __('pricing.plans.2.features.1'),
            __('pricing.plans.2.features.2'),
            __('pricing.plans.2.features.3'),
            __('pricing.plans.2.features.4'),
            __('pricing.plans.2.features.5'),
        ],
    ],
    [
        'name'    => __('pricing.plans.3.name'),
        'tagline' => __('pricing.plans.3.tagline'),
        'price'   => __('pricing.plans.3.price'),
        'unit'    => __('pricing.plans.3.unit'),
        'period'  => __('pricing.plans.3.period'),
        'cta'     => __('pricing.plans.3.cta'),
        'href'    => 'https://app.neverseo.com/signup',
        'popular' => false,
        'features'=> [
            __('pricing.plans.3.features.0'),
            __('pricing.plans.3.features.1'),
            __('pricing.plans.3.features.2'),
            __('pricing.plans.3.features.3'),
            __('pricing.plans.3.features.4'),
            __('pricing.plans.3.features.5'),
        ],
    ],
    [
        'name'    => __('pricing.plans.4.name'),
        'tagline' => __('pricing.plans.4.tagline'),
        'price'   => __('pricing.plans.4.price'),
        'unit'    => __('pricing.plans.4.unit'),
        'period'  => __('pricing.plans.4.period'),
        'cta'     => __('pricing.plans.4.cta'),
        'href'    => '#contact',
        'popular' => false,
        'features'=> [
            __('pricing.plans.4.features.0'),
            __('pricing.plans.4.features.1'),
            __('pricing.plans.4.features.2'),
            __('pricing.plans.4.features.3'),
            __('pricing.plans.4.features.4'),
        ],
    ],
];
?>
<section id="pricing" class="studio-section pricing-section" aria-labelledby="pricing-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('pricing.label') ?></p>
            <h2 id="pricing-title"><?= __('pricing.title_start') ?><span class="gradient-text"><?= __('pricing.title_gradient') ?></span></h2>
            <p><?= __('pricing.desc') ?></p>
        </div>

        <div class="pricing-slider" data-pricing-slider>
            <button class="pricing-nav pricing-nav-prev" type="button" aria-label="Gói trước" data-pricing-prev>
                <i class="ph-bold ph-caret-left" aria-hidden="true"></i>
            </button>

            <div class="pricing-grid" data-pricing-track>
                <?php foreach ($plans as $p): ?>
                    <article class="price-card<?php echo $p['popular'] ? ' is-popular' : ''; ?>">
                        <?php if ($p['popular']): ?><span class="price-badge"><?= __('pricing.popular_badge') ?></span><?php endif; ?>
                        <div class="price-head">
                            <h3><?php echo $p['name']; ?></h3>
                            <p class="price-tagline"><?php echo $p['tagline']; ?></p>
                        </div>
                        <div class="price-amount">
                            <span class="price-value" style="display: flex; align-items: flex-start; justify-content: center;">
                                <span style="position: relative;">
                                    <?php if ($LANG === 'en' && $p['unit'] !== ''): ?><span class="price-unit" style="position: absolute; right: 100%; margin-right: 4px; font-size: 24px; margin-top: 4px;"><?php echo $p['unit']; ?></span><?php endif; ?>
                                    <?php echo $p['price']; ?>
                                </span>
                                <?php if ($LANG === 'vi' && $p['unit'] !== ''): ?><span class="price-unit" style="font-size: 20px; margin-top: 4px;"><?php echo $p['unit']; ?></span><?php endif; ?>
                            </span>
                            <span class="price-period"><?php echo $p['period']; ?></span>
                        </div>
                        <a href="<?php echo $p['href']; ?>" class="button <?php echo $p['popular'] ? 'button-primary' : 'button-outline'; ?> price-cta">
                            <?php echo $p['cta']; ?>
                        </a>
                        <ul class="price-features">
                            <?php foreach ($p['features'] as $feat): ?>
                                <li><i class="ph-bold ph-check" aria-hidden="true"></i><?php echo $feat; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>

            <button class="pricing-nav pricing-nav-next" type="button" aria-label="Gói tiếp theo" data-pricing-next>
                <i class="ph-bold ph-caret-right" aria-hidden="true"></i>
            </button>
        </div>

        <p class="pricing-note"><?= __('pricing.note') ?></p>
    </div>
</section>
