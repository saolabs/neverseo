<?php
// sections/pricing.php — Bảng giá đồng bộ với ứng dụng NeverSEO
$plans = [
    [
        'name'    => 'Dùng thử',
        'tagline' => 'Trải nghiệm nhanh trước khi nâng cấp',
        'price'   => '0',
        'unit'    => 'đ',
        'period'  => '/ 7 ngày',
        'cta'     => 'Dùng thử 7 ngày',
        'href'    => 'https://app.neverseo.com/register',
        'popular' => false,
        'features'=> [
            '7 ngày trải nghiệm',
            '10 từ khóa',
            'Audit cơ bản & gợi ý Quick Win',
            'Chấm điểm On-page (0–100)',
            'Không cần thẻ tín dụng',
        ],
    ],
    [
        'name'    => 'Cơ bản',
        'tagline' => 'Cho 1 website cần sản xuất đều đặn',
        'price'   => '4.999.999',
        'unit'    => 'đ',
        'period'  => '/ tháng',
        'cta'     => 'Bắt đầu ngay',
        'href'    => 'https://app.neverseo.com/register',
        'popular' => false,
        'features'=> [
            '1 website',
            'Audit chuyên sâu 200+ tiêu chí (Technical + Off-page)',
            'Topical Map & phân cụm từ khóa',
            '30 bài viết AI / tháng',
            'Kế hoạch nội dung chi tiết + quản lý Media',
            'Đa AI: ChatGPT, Claude, Gemini, DeepSeek',
            'Dashboard đo lường ROI & Quick Win',
        ],
    ],
    [
        'name'    => 'Doanh nghiệp',
        'tagline' => 'Doanh nghiệp quản trị nhiều website',
        'price'   => '10.000.000',
        'unit'    => 'đ',
        'period'  => '/ tháng',
        'cta'     => 'Bắt đầu ngay',
        'href'    => 'https://app.neverseo.com/register',
        'popular' => true,
        'features'=> [
            '3 website',
            '100 bài viết AI / tháng',
            'Audit chuyên sâu 200+ tiêu chí (Technical + Off-page)',
            'Kế hoạch nội dung chi tiết + quản lý Media',
            'Dashboard đo lường ROI & Quick Win',
            'Đa AI: ChatGPT, Claude, Gemini, DeepSeek',
        ],
    ],
    [
        'name'    => 'Quy mô lớn',
        'tagline' => 'Cho agency & hệ thống nhiều website',
        'price'   => '25.000.000',
        'unit'    => 'đ',
        'period'  => '/ tháng',
        'cta'     => 'Liên hệ tư vấn',
        'href'    => '#contact',
        'popular' => false,
        'features'=> [
            '10 website',
            '500 bài viết AI / tháng',
            'Quản trị đa nhóm (Organization) & phân quyền',
            'BYOK — dùng API Key riêng của bạn',
            'Theo dõi chi phí Token chi tiết',
            'Hỗ trợ ưu tiên 1-1 & onboarding',
        ],
    ],
    [
        'name'    => 'Tùy chỉnh',
        'tagline' => 'Cho khách hàng có nhu cầu lớn hơn',
        'price'   => 'Linh động',
        'unit'    => '',
        'period'  => 'theo nhu cầu',
        'cta'     => 'Liên hệ tư vấn',
        'href'    => '#contact',
        'popular' => false,
        'features'=> [
            'Số lượng website theo nhu cầu',
            'Sản lượng bài viết theo kế hoạch',
            'Tư vấn triển khai riêng',
            'Tích hợp API/SSO theo yêu cầu',
            'SLA & hỗ trợ ưu tiên',
        ],
    ],
];
?>
<section id="pricing" class="studio-section pricing-section" aria-labelledby="pricing-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand">Bảng giá</p>
            <h2 id="pricing-title">Chọn gói phù hợp, <span class="gradient-text">nâng cấp bất cứ lúc nào</span></h2>
            <p>Dùng thử 7 ngày, không cần thẻ tín dụng. Trả theo tháng, hủy bất cứ lúc nào.</p>
        </div>

        <div class="pricing-slider" data-pricing-slider>
            <button class="pricing-nav pricing-nav-prev" type="button" aria-label="Gói trước" data-pricing-prev>
                <i class="ph-bold ph-caret-left" aria-hidden="true"></i>
            </button>

            <div class="pricing-grid" data-pricing-track>
                <?php foreach ($plans as $p): ?>
                    <article class="price-card<?php echo $p['popular'] ? ' is-popular' : ''; ?>">
                        <?php if ($p['popular']): ?><span class="price-badge">Phổ biến nhất</span><?php endif; ?>
                        <div class="price-head">
                            <h3><?php echo $p['name']; ?></h3>
                            <p class="price-tagline"><?php echo $p['tagline']; ?></p>
                        </div>
                        <div class="price-amount">
                            <span class="price-value"><?php echo $p['price']; ?><?php if ($p['unit'] !== ''): ?><span class="price-unit"><?php echo $p['unit']; ?></span><?php endif; ?></span>
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

        <p class="pricing-note">Tất cả gói đều bao gồm cập nhật tính năng mới và bảo mật dữ liệu mã hóa AES-256.</p>
    </div>
</section>
