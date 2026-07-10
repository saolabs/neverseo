<?php
// privacy.php
$page_title = "Chính sách Bảo mật - NeverSEO";
$page_description = "Chính sách bảo mật thông tin và dữ liệu người dùng của hệ thống NeverSEO, bao gồm điều khoản tuân thủ API Dịch vụ Google.";
$page_path = "/privacy.html";

$sections_dir = __DIR__ . '/sections/';
?>
<?php include $sections_dir . 'head.php'; ?>
<?php include $sections_dir . 'header.php'; ?>

<main class="legal-page">
    <div class="legal-container">
        <div class="legal-header">
            <p class="section-label">Pháp lý / NeverSEO</p>
            <h1>Chính sách Bảo mật</h1>
            <p>Cập nhật lần cuối: 10/07/2026</p>
        </div>

        <article class="legal-card">
            <div>
                <p>Chào mừng bạn đến với NeverSEO. Chúng tôi cam kết bảo vệ quyền riêng tư và dữ liệu cá nhân của bạn. Chính sách này giải thích cách chúng tôi thu thập, sử dụng, và bảo vệ thông tin khi bạn sử dụng ứng dụng web của chúng tôi.</p>

                <h3>
                    <i class="ph-fill ph-info"></i>
                    1. Thông tin chúng tôi thu thập
                </h3>
                <p>Khi bạn tạo tài khoản hoặc sử dụng NeverSEO, chúng tôi có thể thu thập:</p>
                <ul>
                    <li><strong>Thông tin định danh:</strong> Tên, địa chỉ email, ảnh đại diện (khi đăng nhập qua Google OAuth).</li>
                    <li><strong>Dữ liệu sử dụng:</strong> Nhật ký hoạt động (logs), mức sử dụng Token AI.</li>
                    <li><strong>Dữ liệu do bạn cung cấp:</strong> Các chiến dịch SEO, danh sách từ khóa, bản nháp nội dung, mã API Key của các dịch vụ AI bên thứ ba (được mã hóa AES-256 an toàn trong cơ sở dữ liệu).</li>
                </ul>

                <h3>
                    <i class="ph-fill ph-google-logo"></i>
                    2. Tuân thủ Chính sách Dữ liệu API của Google
                </h3>
                <p>Việc NeverSEO sử dụng và chuyển giao thông tin nhận được từ các API của Google cho bất kỳ ứng dụng nào khác sẽ tuân thủ <strong><a href="https://developers.google.com/terms/api-services-user-data-policy" target="_blank" rel="noopener noreferrer">Chính sách Dữ liệu Người dùng của API Dịch vụ Google</a></strong>, bao gồm cả các yêu cầu về Sử dụng Có giới hạn (Limited Use).</p>
                <p>Cụ thể, khi bạn cấp quyền truy cập vào Google Search Console hoặc Google Analytics để phục vụ tính năng Audit và đo lường:</p>
                <ul>
                    <li>Chúng tôi <strong>chỉ sử dụng</strong> dữ liệu này để cung cấp hoặc cải thiện các tính năng cho người dùng (phân tích thứ hạng, lượt truy cập).</li>
                    <li>Chúng tôi <strong>không chia sẻ hoặc bán</strong> dữ liệu người dùng cho bên thứ ba vì mục đích quảng cáo hoặc bất kỳ mục đích nào khác không liên quan.</li>
                    <li>Chúng tôi <strong>không cho phép con người đọc</strong> dữ liệu này trừ khi có sự đồng ý rõ ràng từ bạn để hỗ trợ kỹ thuật hoặc vì mục đích bảo mật/tuân thủ pháp luật.</li>
                </ul>

                <h3>
                    <i class="ph-fill ph-shield-check"></i>
                    3. Lưu trữ và Bảo mật Dữ liệu
                </h3>
                <p>Hệ thống hỗ trợ nhiều tài khoản và mỗi nhóm làm việc (Organization) có không gian dữ liệu độc lập. Dữ liệu nhạy cảm (như API Key, Access Token) được lưu trữ an toàn bằng thuật toán mã hóa tiên tiến nhất (AES-256).</p>

                <h3>
                    <i class="ph-fill ph-user-gear"></i>
                    4. Quyền của bạn
                </h3>
                <p>Bạn có quyền truy cập, cập nhật, hoặc yêu cầu xóa toàn bộ dữ liệu cá nhân của mình khỏi hệ thống. Việc xóa tài khoản (Organization) sẽ xóa vĩnh viễn toàn bộ dữ liệu dự án, cấu hình và nội dung đi kèm.</p>

                <h3>
                    <i class="ph-fill ph-envelope-simple"></i>
                    5. Liên hệ
                </h3>
                <p>Nếu bạn có bất kỳ câu hỏi nào về Chính sách Bảo mật này, vui lòng liên hệ với chúng tôi qua email: <a href="mailto:support@neverseo.com">support@neverseo.com</a>.</p>
            </div>
        </article>
    </div>
</main>

<?php include $sections_dir . 'footer.php'; ?>
