<?php
// sections/features.php — Tính năng chi tiết + Tích hợp
$features = [
    ['icon' => 'ph-magnifying-glass', 'title' => 'Nghiên cứu thị trường tự động', 'desc' => 'Phân tích dữ liệu từ Google để cho bạn biết khách hàng đang tìm kiếm điều gì và đối thủ đang làm gì.'],
    ['icon' => 'ph-tree-structure',   'title' => 'Quản lý chủ đề thông minh',         'desc' => 'Trực quan hóa cấu trúc website, giúp bạn dễ dàng theo dõi và bổ sung nội dung cho các chủ đề quan trọng.'],
    ['icon' => 'ph-calendar-check',   'title' => 'Lập kế hoạch nội dung',  'desc' => 'Lên lịch biên tập rõ ràng. Dễ dàng phân công công việc cho từng thành viên trong nhóm và theo dõi tiến độ.'],
    ['icon' => 'ph-quotes',           'title' => 'Tiêu chuẩn hóa bài viết',        'desc' => 'Cung cấp hướng dẫn viết bài cụ thể, dàn ý chi tiết, đảm bảo mọi người trong nhóm đều viết bài đúng chuẩn SEO.'],
    ['icon' => 'ph-checks',           'title' => 'Chấm điểm SEO tự động', 'desc' => 'Chỉ ra ngay những điểm cần sửa trước khi xuất bản: thiếu từ khóa, tiêu đề chưa tối ưu, nội dung chưa đủ sâu...'],
    ['icon' => 'ph-chart-donut',      'title' => 'Báo cáo hiệu quả minh bạch', 'desc' => 'Kết nối với Google Analytics và Search Console để biết chính xác bài viết nào đang mang lại nhiều khách hàng nhất.'],
];

$integrations = [
    ['icon' => 'ph-google-logo',      'name' => 'Search Console'],
    ['icon' => 'ph-chart-bar',        'name' => 'Google Analytics'],
    ['icon' => 'ph-layout',           'name' => 'WordPress'],
    ['icon' => 'ph-brain',            'name' => 'OpenAI'],
    ['icon' => 'ph-sparkle',          'name' => 'Anthropic'],
    ['icon' => 'ph-robot',            'name' => 'Google Gemini'],
];
?>
<section id="features" class="studio-section features-section" aria-labelledby="features-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand">Tính năng nổi bật</p>
            <h2 id="features-title">Tất cả các công cụ bạn cần, <span class="gradient-text">trong một nền tảng duy nhất.</span></h2>
            <p>Không cần dùng nhiều phần mềm phức tạp. NeverSEO cung cấp đầy đủ tính năng để bạn quản lý chiến dịch SEO từ A đến Z.</p>
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
