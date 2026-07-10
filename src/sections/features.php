<?php
// sections/features.php — Tính năng chi tiết + Tích hợp
$features = [
    ['icon' => 'ph-magnifying-glass', 'title' => 'Audit 200+ tiêu chí',      'desc' => 'Quét toàn diện Technical, On-page, Off-page và Thương hiệu, chấm điểm sức khỏe website và đề xuất "Quick Win" ưu tiên theo tác động.'],
    ['icon' => 'ph-tree-structure',   'title' => 'Topical Map tự động',      'desc' => 'Gom cụm hàng nghìn từ khóa thành bản đồ chủ đề phân tầng Pillar – Cluster, đảm bảo phủ sóng ngữ nghĩa và thẩm quyền chủ đề (Topical Authority).'],
    ['icon' => 'ph-calendar-check',   'title' => 'Lịch nội dung thông minh', 'desc' => 'Sinh kế hoạch bài viết hằng tháng kèm dàn ý, internal link gợi ý và yêu cầu media — sẵn sàng giao cho writer chỉ trong một cú nhấp.'],
    ['icon' => 'ph-pen-nib-straight', 'title' => 'AI viết bài theo Brief',    'desc' => 'Writer AI bám sát outline, tự động dẫn chứng dữ liệu (Information Gain) và chèn media, cho ra bản nháp chất lượng thay vì nội dung sáo rỗng.'],
    ['icon' => 'ph-gauge',            'title' => 'Chấm điểm On-page real-time','desc' => 'Bộ tiêu chuẩn 0–100 kiểm tra cấu trúc semantic, mật độ thực thể và readability ngay khi soạn thảo, chuẩn hóa chất lượng đầu ra.'],
    ['icon' => 'ph-chart-donut',      'title' => 'Dashboard đo lường ROI',    'desc' => 'Đồng bộ thứ hạng, traffic và tiến độ sản xuất về một màn hình, giúp bạn nhìn toàn cảnh chiến dịch và báo cáo minh bạch cho khách hàng.'],
];

$integrations = [
    ['icon' => 'ph-google-logo',      'name' => 'Search Console'],
    ['icon' => 'ph-chart-bar',        'name' => 'Google Analytics'],
    ['icon' => 'ph-wordpress-logo',   'name' => 'WordPress'],
    ['icon' => 'ph-brain',            'name' => 'OpenAI'],
    ['icon' => 'ph-sparkle',          'name' => 'Anthropic'],
    ['icon' => 'ph-robot',            'name' => 'Google Gemini'],
];
?>
<section id="features" class="studio-section features-section" aria-labelledby="features-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand">Bộ tính năng</p>
            <h2 id="features-title">Mọi thứ một đội SEO cần, <span class="gradient-text">gói gọn trong một nơi</span></h2>
            <p>Từ khám bệnh website đến xuất bản nội dung — NeverSEO thay thế cả bộ công cụ rời rạc bằng một quy trình tự động, nhất quán và có thể đo lường.</p>
        </div>

        <div class="features-grid">
            <?php foreach ($features as $f): ?>
                <article class="feature-tile">
                    <div class="feature-tile-icon"><i class="ph-duotone <?php echo $f['icon']; ?>" aria-hidden="true"></i></div>
                    <h3><?php echo $f['title']; ?></h3>
                    <p><?php echo $f['desc']; ?></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="integrations">
            <p class="integrations-label">Kết nối liền mạch với hệ sinh thái của bạn</p>
            <div class="integrations-row">
                <?php foreach ($integrations as $i): ?>
                    <div class="integration-chip">
                        <i class="ph <?php echo $i['icon']; ?>" aria-hidden="true"></i>
                        <span><?php echo $i['name']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
