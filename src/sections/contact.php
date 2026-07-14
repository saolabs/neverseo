<?php
// sections/contact.php — Liên hệ (form gửi qua API m-ai.vcc.vn, xem main.js)
?>
<section id="contact" class="studio-section contact-section" aria-labelledby="contact-title">
    <div class="site-shell">
        <div class="contact-split">
            <div class="contact-info">
                <p class="section-label label-brand"><?= __('contact.label') ?></p>
                <h2 id="contact-title"><?= __('contact.title') ?></h2>
                <p class="contact-lead"><?= __('contact.lead') ?></p>

                <ul class="contact-list">
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-envelope-simple" aria-hidden="true"></i></span>
                        <span><strong><?= __('contact.list_email') ?></strong><a href="mailto:support@neverseo.com">support@neverseo.com</a></span>
                    </li>
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-phone-call" aria-hidden="true"></i></span>
                        <span><strong><?= __('contact.list_hotline') ?></strong><a href="tel:+84946786960">0946 786 960</a></span>
                    </li>
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-map-pin" aria-hidden="true"></i></span>
                        <span><strong><?= __('contact.list_address') ?></strong><?= __('contact.address_val') ?></span>
                    </li>
                    <li>
                        <span class="contact-ico"><i class="ph-duotone ph-clock-countdown" aria-hidden="true"></i></span>
                        <span><strong><?= __('contact.list_time') ?></strong><?= __('contact.time_val') ?></span>
                    </li>
                </ul>
            </div>

            <div class="contact-form-wrap">
                <form id="contactForm" class="contact-form" novalidate aria-label="Biểu mẫu liên hệ">
                    <div class="form-row">
                        <label class="form-field">
                            <span><?= __('contact.form_name') ?></span>
                            <input type="text" name="name" placeholder="<?= __('contact.form_name_ph') ?>" required>
                        </label>
                        <label class="form-field">
                            <span><?= __('contact.form_email') ?></span>
                            <input type="email" name="email" placeholder="ban@congty.com" required>
                        </label>
                    </div>
                    <label class="form-field">
                        <span><?= __('contact.form_company') ?></span>
                        <input type="text" name="company" placeholder="congty.com">
                    </label>
                    <label class="form-field">
                        <span><?= __('contact.form_message') ?></span>
                        <textarea name="message" rows="4" placeholder="<?= __('contact.form_message_ph') ?>" required></textarea>
                    </label>
                    <button type="submit" id="contactSubmit" class="button button-primary shadow-button">
                        <?= __('contact.form_submit') ?>
                        <i class="ph-bold ph-paper-plane-tilt" aria-hidden="true"></i>
                    </button>
                    <p id="contactError" class="form-error" role="alert" hidden></p>
                    <p class="form-note"><?= __('contact.form_note') ?><a href="privacy.html"><?= __('contact.form_note_link') ?></a><?= __('contact.form_note_suffix') ?></p>
                </form>

                <div id="contactSuccess" class="contact-success" hidden>
                    <div class="contact-success-icon"><i class="ph-fill ph-check-circle" aria-hidden="true"></i></div>
                    <h3><?= __('contact.success_title') ?></h3>
                    <p><?= __('contact.success_desc') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
