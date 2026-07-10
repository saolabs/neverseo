<?php
// sections/faq.php — Câu hỏi thường gặp (accordion + FAQPage JSON-LD)
$faqs = [
    [
        'q' => 'NeverSEO khác gì so với việc dùng ChatGPT để viết bài?',
        'a' => 'ChatGPT chỉ giải quyết khâu viết. NeverSEO là quy trình khép kín: từ audit website, xây Topical Map, lập kế hoạch nội dung đến viết bài và chấm điểm chất lượng. Nội dung được bám sát chiến lược và dữ liệu thực tế thay vì viết rời rạc, sáo rỗng.',
    ],
    [
        'q' => 'Tôi không rành kỹ thuật SEO thì có dùng được không?',
        'a' => 'Hoàn toàn được. Hệ thống tự động đề xuất việc cần làm theo thứ tự ưu tiên và hướng dẫn bạn từng bước. Chủ doanh nghiệp có thể nắm toàn cảnh chiến lược và tiến độ qua dashboard mà không cần can thiệp sâu vào kỹ thuật.',
    ],
    [
        'q' => 'Dữ liệu và API Key của tôi có được bảo mật không?',
        'a' => 'Có. Mỗi nhóm làm việc (Organization) có không gian dữ liệu độc lập. Các thông tin nhạy cảm như API Key, Access Token được mã hóa bằng thuật toán AES-256 và không bao giờ bị chia sẻ cho bên thứ ba.',
    ],
    [
        'q' => 'BYOK (Bring Your Own Key) hoạt động thế nào?',
        'a' => 'Ở gói Doanh nghiệp, bạn có thể nhập API Key riêng của OpenAI, Anthropic hoặc Google. Khi đó chi phí token AI sẽ tính trực tiếp trên tài khoản nhà cung cấp của bạn, giúp tối ưu chi phí ở quy mô lớn.',
    ],
    [
        'q' => 'NeverSEO có cam kết lên top Google không?',
        'a' => 'Không đơn vị nào nên cam kết thứ hạng, vì thứ hạng phụ thuộc nhiều yếu tố (độ uy tín tên miền, backlink, biến động thuật toán). NeverSEO đảm bảo quy trình và chất lượng nội dung chuẩn SEO — nền tảng vững chắc để bạn cải thiện thứ hạng bền vững.',
    ],
    [
        'q' => 'Tôi có thể hủy hoặc đổi gói bất cứ lúc nào không?',
        'a' => 'Được. Bạn có thể nâng cấp, hạ cấp hoặc hủy gói bất cứ lúc nào ngay trong phần cài đặt tài khoản, không ràng buộc hợp đồng dài hạn.',
    ],
];
?>
<section id="faq" class="studio-section faq-section" aria-labelledby="faq-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand">Giải đáp</p>
            <h2 id="faq-title">Câu hỏi thường gặp</h2>
            <p>Chưa tìm thấy câu trả lời? <a href="#contact" class="link-inline">Liên hệ đội ngũ của chúng tôi</a>.</p>
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
