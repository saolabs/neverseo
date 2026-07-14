<?php
// sections/testimonials.php — Stats band (premium dark) + Đánh giá khách hàng
$stats = [
    ['num' => '50+',  'label' => __('testimonials.stats.0.label')],
    ['num' => '800+', 'label' => __('testimonials.stats.1.label')],
    ['num' => '70%',  'label' => __('testimonials.stats.2.label')],
    ['num' => '100%', 'label' => __('testimonials.stats.3.label')],
];

$testimonials = [
    [
        'quote' => __('testimonials.items.0.quote'),
        'name'  => __('testimonials.items.0.name'),
        'role'  => __('testimonials.items.0.role'),
        'initial' => 'CL',
        'tone'  => 'a',
    ],
    [
        'quote' => __('testimonials.items.1.quote'),
        'name'  => __('testimonials.items.1.name'),
        'role'  => __('testimonials.items.1.role'),
        'initial' => 'TT',
        'tone'  => 'b',
    ],
    [
        'quote' => __('testimonials.items.2.quote'),
        'name'  => __('testimonials.items.2.name'),
        'role'  => __('testimonials.items.2.role'),
        'initial' => 'KT',
        'tone'  => 'c',
    ],
];
?>
<section class="stats-band" aria-label="Số liệu nổi bật">
    <div class="site-shell">
        <div class="stats-grid">
            <?php foreach ($stats as $s): ?>
                <div class="stat-block">
                    <div class="stat-num"><?php echo $s['num']; ?></div>
                    <div class="stat-label"><?php echo $s['label']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="testimonials" class="studio-section testimonials-section" aria-labelledby="testimonials-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('testimonials.label') ?></p>
            <h2 id="testimonials-title"><?= __('testimonials.title_start') ?><span class="gradient-text"><?= __('testimonials.title_gradient') ?></span></h2>
            <p><?= __('testimonials.desc') ?></p>
        </div>

        <div class="testi-grid">
            <?php foreach ($testimonials as $t): ?>
                <figure class="testi-card">
                    <div class="testi-stars" aria-label="5 trên 5 sao">
                        <?php for ($i = 0; $i < 5; $i++): ?><i class="ph-fill ph-star" aria-hidden="true"></i><?php endfor; ?>
                    </div>
                    <blockquote class="testi-quote">“<?php echo $t['quote']; ?>”</blockquote>
                    <figcaption class="testi-person">
                        <span class="testi-avatar tone-<?php echo $t['tone']; ?>"><?php echo $t['initial']; ?></span>
                        <span class="testi-meta">
                            <strong><?php echo $t['name']; ?></strong>
                            <span><?php echo $t['role']; ?></span>
                        </span>
                    </figcaption>
                </figure>
            <?php endforeach; ?>
        </div>
    </div>
</section>
