<?php
// sections/contact.php — Liên hệ (form gửi qua API m-ai.vcc.vn, xem main.js)
?>
<section id="contact" class="studio-section contact-section" aria-labelledby="contact-title">
    <div class="site-shell">
        <div class="contact-split">
            <div class="contact-info">
                <p class="section-label label-brand">Liên hệ</p>
                <h2 id="contact-title">Cần tư vấn giải pháp cho đội ngũ của bạn?</h2>
                <p class="contact-lead">Để lại lời nhắn, đội ngũ NeverSEO sẽ phản hồi trong vòng 24 giờ làm việc. Hoặc bắt đầu ngay với tài khoản miễn phí.</p>

                <ul class="contact-list">
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-envelope-simple" aria-hidden="true"></i></span>
                        <span><strong>Email</strong><a href="mailto:support@neverseo.com">support@neverseo.com</a></span>
                    </li>
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-phone-call" aria-hidden="true"></i></span>
                        <span><strong>Hotline</strong><a href="tel:+84946786960">0946 786 960</a></span>
                    </li>
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-map-pin" aria-hidden="true"></i></span>
                        <span><strong>Địa chỉ</strong>172 đường Bà Trị, phường Thống Nhất, tỉnh Phú Thọ, Việt Nam</span>
                    </li>
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-clock-countdown" aria-hidden="true"></i></span>
                        <span><strong>Thời gian phản hồi</strong>Trong vòng 24 giờ làm việc</span>
                    </li>
                </ul>
            </div>

            <div class="contact-form-wrap">
                <form id="contactForm" class="contact-form" novalidate aria-label="Biểu mẫu liên hệ">
                    <div class="form-row">
                        <label class="form-field">
                            <span>Họ và tên</span>
                            <input type="text" name="name" placeholder="Nguyễn Văn A" required>
                        </label>
                        <label class="form-field">
                            <span>Email</span>
                            <input type="email" name="email" placeholder="ban@congty.com" required>
                        </label>
                    </div>
                    <label class="form-field">
                        <span>Công ty / Website</span>
                        <input type="text" name="company" placeholder="congty.com">
                    </label>
                    <label class="form-field">
                        <span>Nội dung</span>
                        <textarea name="message" rows="4" placeholder="Mình muốn tìm hiểu gói phù hợp cho agency..." required></textarea>
                    </label>
                    <button type="submit" id="contactSubmit" class="button button-primary shadow-button">
                        Gửi lời nhắn
                        <i class="ph-bold ph-paper-plane-tilt" aria-hidden="true"></i>
                    </button>
                    <p id="contactError" class="form-error" role="alert" hidden></p>
                    <p class="form-note">Bằng việc gửi, bạn đồng ý với <a href="privacy.html">Chính sách bảo mật</a> của chúng tôi.</p>
                </form>

                <div id="contactSuccess" class="contact-success" hidden>
                    <div class="contact-success-icon"><i class="ph-fill ph-check-circle" aria-hidden="true"></i></div>
                    <h3>Đã gửi thành công!</h3>
                    <p>Cảm ơn bạn đã liên hệ. Đội ngũ NeverSEO sẽ phản hồi trong vòng 24 giờ làm việc.</p>
                </div>
            </div>
        </div>
    </div>
</section>
