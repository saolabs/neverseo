<?php
// sections/testimonials.php — Stats band (premium dark) + Đánh giá khách hàng
$stats = [
    ['num' => '50+',  'label' => 'Website đã được triển khai'],
    ['num' => '800+', 'label' => 'Bài viết được xuất bản hàng tháng'],
    ['num' => '70%',  'label' => 'Thời gian tiết kiệm khâu lập kế hoạch'],
    ['num' => '100%', 'label' => 'Tuân thủ chặt chẽ tiêu chuẩn SEO'],
];

$testimonials = [
    [
        'quote' => 'Trước đây team mình mất cả tuần để lên Topical Map và content plan. Với NeverSEO, việc đó rút xuống còn vài giờ mà chất lượng còn sâu hơn. Đây là công cụ thay đổi hoàn toàn cách team mình làm SEO.',
        'name'  => 'Nguyễn Cao Lam',
        'role'  => 'Giám đốc Marketing, Công ty Vận tải Hoàng Trung',
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
        'name'  => 'Đậu Khắc Tùng',
        'role'  => 'HỘ KINH DOANH ĐẬU KHẮC TÙNG 1980 · miworld.vn cùng các web trong hệ sinh thái MiWorld',
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
            <p class="section-label label-brand">Phản hồi từ đối tác</p>
            <h2 id="testimonials-title">Được kiểm chứng bởi <span class="gradient-text">những dự án đầu tiên</span></h2>
            <p>Những người đầu tiên trải nghiệm và tối ưu hóa quy trình SEO cùng NeverSEO.</p>
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
