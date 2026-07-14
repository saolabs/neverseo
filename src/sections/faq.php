<?php
// sections/faq.php — Câu hỏi thường gặp (accordion + FAQPage JSON-LD)
$faqs = [
    [
        'q' => 'NeverSEO có thay thế được nhân sự SEO không?',
        'a' => 'Không. NeverSEO là công cụ đắc lực giúp đội ngũ SEO làm việc hiệu quả hơn, nhanh hơn và ít sai sót hơn. Hệ thống tự động hóa quy trình phân tích và vận hành, còn tư duy chiến lược cuối cùng vẫn do con người quyết định.',
    ],
    [
        'q' => 'Tôi mới tìm hiểu về SEO thì có dùng được không?',
        'a' => 'Chắc chắn rồi. NeverSEO được thiết kế với giao diện thân thiện, dễ hiểu. Hệ thống sẽ hướng dẫn bạn từng bước cần làm, giống như có một chuyên gia SEO luôn bên cạnh hỗ trợ.',
    ],
    [
        'q' => 'Viết bài bằng AI có bị Google phạt không?',
        'a' => 'Google không phạt nội dung tạo bằng AI, họ chỉ phạt nội dung rác, kém chất lượng. NeverSEO sử dụng AI như một trợ lý để giúp bạn nghiên cứu và viết bài tốt hơn, cung cấp thông tin thực sự hữu ích cho người đọc.',
    ],
    [
        'q' => 'Dữ liệu của công ty tôi có được bảo mật không?',
        'a' => 'Có. Mỗi công ty (Organization) có không gian dữ liệu hoàn toàn độc lập. Các thông tin nhạy cảm được mã hóa cấp độ cao và tuyệt đối không chia sẻ cho bất kỳ bên thứ ba nào.',
    ],
    [
        'q' => 'Tôi có thể dùng tài khoản AI của riêng mình không?',
        'a' => 'Có. Ở gói Doanh nghiệp, bạn có thể kết nối tài khoản AI (API Key của OpenAI, Google...) để tự quản lý chi phí token và chủ động hơn khi sử dụng ở quy mô lớn.',
    ],
    [
        'q' => 'NeverSEO có cam kết từ khóa lên top không?',
        'a' => 'Bất kỳ cam kết lên top nào cũng thiếu thực tế, vì thuật toán Google thay đổi liên tục. NeverSEO giúp bạn xây dựng nền tảng SEO đúng chuẩn, tạo nội dung chất lượng để tăng trưởng lượng khách hàng bền vững và dài hạn.',
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
