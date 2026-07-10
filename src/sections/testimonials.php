<?php
// sections/testimonials.php — Stats band (premium dark) + Đánh giá khách hàng
$stats = [
    ['num' => '10.000+', 'label' => 'Bài viết chuẩn SEO đã sản xuất'],
    ['num' => '85%',     'label' => 'Thời gian tiết kiệm cho mỗi chiến dịch'],
    ['num' => '500+',    'label' => 'Website đang được quản trị'],
    ['num' => '4.8/5',   'label' => 'Điểm hài lòng của người dùng'],
];

$testimonials = [
    [
        'quote' => 'Trước đây team mình mất cả tuần để lên Topical Map và content plan. Với NeverSEO, việc đó rút xuống còn vài giờ mà chất lượng còn sâu hơn. Đây là công cụ thay đổi cách agency mình vận hành.',
        'name'  => 'Nguyễn Cao Lam',
        'role'  => 'Giám đốc, Công ty Vận tải Hoàng Trung · hoangtrungexpress.com',
        'initial' => 'CL',
        'tone'  => 'a',
    ],
    [
        'quote' => 'Điểm mình thích nhất là hệ thống Gating. Bài nào chưa đạt điểm On-page thì không cho xuất bản, nhờ vậy chất lượng luôn đồng đều dù có nhiều writer cùng làm.',
        'name'  => 'Khỏng Trọng Tú',
        'role'  => 'Chuỗi Nha khoa Việt Bỉ · nhakhoavietbi.vn, nhakhoavietbi.com, vietbidental.com',
        'initial' => 'TT',
        'tone'  => 'b',
    ],
    [
        'quote' => 'Là chủ doanh nghiệp không rành kỹ thuật, mình vẫn nắm được toàn cảnh chiến lược và tiến độ SEO qua dashboard. Chi phí giảm rõ rệt so với thuê ngoài mà kiểm soát lại tốt hơn.',
        'name'  => 'Lê Thu Hà',
        'role'  => 'CEO, Thương hiệu mỹ phẩm AnPhat',
        'initial' => 'TH',
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
            <p class="section-label label-brand">Khách hàng nói gì</p>
            <h2 id="testimonials-title">Được các agency &amp; doanh nghiệp <span class="gradient-text">tin tưởng giao phó</span></h2>
            <p>Những đội ngũ đang tăng trưởng cùng NeverSEO mỗi ngày.</p>
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
