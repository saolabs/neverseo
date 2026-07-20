<?php
// sections/faq.php — Câu hỏi thường gặp (accordion + FAQPage JSON-LD)
// Lấy thẳng mảng từ locale để thêm/bớt câu hỏi chỉ cần sửa JSON.
$faqs = __('faq.items');
if (!is_array($faqs)) $faqs = [];
?>
<section id="faq" class="studio-section faq-section" aria-labelledby="faq-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('faq.label') ?></p>
            <h2 id="faq-title"><?= __('faq.title') ?></h2>
            <p><?= __('faq.desc_start') ?><a href="#contact" class="link-inline"><?= __('faq.desc_link') ?></a>.</p>
        </div>

        <div class="faq-list">
            <?php foreach ($faqs as $index => $faq): ?>
                <details class="faq-item"<?php echo $index === 0 ? ' open' : ''; ?>>
                    <summary class="faq-q">
                        <span><?php echo $faq['q']; ?></span>
                        <i class="ph-bold ph-plus faq-icon" aria-hidden="true"></i>
                    </summary>
                    <div class="faq-a"><p><?php echo $faq['a']; ?></p></div>
                </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script type="application/ld+json">
<?php
$faq_ld = [
    '@context' => 'https://schema.org',
    '@type'    => 'FAQPage',
    'mainEntity' => array_map(function ($f) {
        return [
            '@type' => 'Question',
            'name'  => $f['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
        ];
    }, $faqs),
];
echo json_encode($faq_ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
?>
</script>
