<?php
// sections/footer.php
?>
<footer class="site-footer">
    <div class="site-shell">
        <div class="footer-top">
            <div class="footer-top-copy">
                <h3><?= __('footer.newsletter_title') ?></h3>
                <p><?= __('footer.newsletter_desc') ?></p>
            </div>
            <form class="footer-subscribe-form" action="#" method="post" aria-label="Đăng ký bản tin"
                  data-msg-sending="<?= __('footer.msg_sending') ?>"
                  data-msg-success="<?= __('footer.msg_success') ?>"
                  data-err-server="<?= __('footer.err_server') ?>">
                <input type="email" name="email" placeholder="<?= __('footer.newsletter_ph') ?>" aria-label="Email" required>
                <button type="submit"><?= __('footer.newsletter_btn') ?> <i class="ph-bold ph-arrow-right" aria-hidden="true"></i></button>
            </form>
        </div>

        <div class="site-footer-grid">
            <div class="site-footer-brand">
                <a href="<?= $LANG === 'vi' ? '/vn/' : '/' ?>" class="site-logo" aria-label="NeverSEO trang chủ">
                    <span class="site-logo-mark">
                        <i class="ph ph-graph" aria-hidden="true"></i>
                    </span>
                    <span><span class="logo-never">Never</span><span class="logo-seo">SEO</span></span>
                </a>
                <p>
                    <?= __('footer.brand_desc') ?>
                </p>
                <div class="site-footer-socials" aria-label="Mạng xã hội">
<?php foreach (($GLOBALS['SOCIAL'] ?? []) as $social_name => $social):
    if ($social['url'] === '') continue; ?>
                    <a href="<?= htmlspecialchars($social['url']) ?>" aria-label="<?= htmlspecialchars($social_name) ?>" target="_blank" rel="noopener"><i class="ph-fill <?= $social['icon'] ?>" aria-hidden="true"></i></a>
<?php endforeach; ?>
                </div>
            </div>

            <div class="site-footer-col">
                <h3><?= __('footer.col_product') ?></h3>
                <ul>
                    <li><a href="index.html#features"><?= __('footer.prod_features') ?></a></li>
                    <li><a href="index.html#workflow"><?= __('footer.prod_workflow') ?></a></li>
                    <li><a href="index.html#pricing"><?= __('footer.prod_pricing') ?></a></li>
                    <li><a href="index.html#audience"><?= __('footer.prod_audience') ?></a></li>
                </ul>
            </div>

            <div class="site-footer-col">
                <h3><?= __('footer.col_company') ?></h3>
                <ul>
                    <li><a href="index.html#solution"><?= __('footer.comp_about') ?></a></li>
                    <li><a href="index.html#team"><?= __('footer.comp_team') ?></a></li>
                    <li><a href="index.html#testimonials"><?= __('footer.comp_testimonials') ?></a></li>
                    <li><a href="index.html#faq"><?= __('footer.comp_faq') ?></a></li>
                </ul>
            </div>

            <div class="site-footer-col">
                <h3><?= __('footer.col_legal') ?></h3>
                <ul>
                    <li><a href="privacy.html"><?= __('footer.legal_privacy') ?></a></li>
                    <li><a href="terms.html"><?= __('footer.legal_terms') ?></a></li>
                    <li><a href="index.html#contact"><?= __('footer.legal_contact') ?></a></li>
                    <li><a href="mailto:support@neverseo.com">support@neverseo.com</a></li>
                    <li><a href="tel:+84946786960">0946 786 960</a></li>
                </ul>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="footer-bottom-made">
                <p><?= __('footer.bottom_made') ?></p>
            </div>
            
            <div class="footer-bottom-copy">
                <p><?= str_replace('{year}', date('Y'), __('footer.bottom_copy')) ?></p>
            </div>
            
            <div class="footer-lang-switcher">
                <a href="<?= get_lang_url('vi') ?>" style="display: flex; align-items: center; gap: 6px; text-decoration: none; font-size: 14px; font-weight: <?= $LANG === 'vi' ? '500' : '400' ?>; transition: color 0.3s ease; color: <?= $LANG === 'vi' ? '#fff' : 'rgba(255,255,255,0.5)' ?>;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='<?= $LANG === 'vi' ? '#fff' : 'rgba(255,255,255,0.5)' ?>'">
                    <img src="/assets/img/flag-vi.svg" alt="VN" style="width: 18px; height: 13px; border-radius: 2px; object-fit: cover; opacity: <?= $LANG === 'vi' ? '1' : '0.6' ?>;">
                    VN
                </a>
                <span style="color: rgba(255,255,255,0.2);">|</span>
                <a href="<?= get_lang_url('en') ?>" style="display: flex; align-items: center; gap: 6px; text-decoration: none; font-size: 14px; font-weight: <?= $LANG === 'en' ? '500' : '400' ?>; transition: color 0.3s ease; color: <?= $LANG === 'en' ? '#fff' : 'rgba(255,255,255,0.5)' ?>;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='<?= $LANG === 'en' ? '#fff' : 'rgba(255,255,255,0.5)' ?>'">
                    <img src="/assets/img/flag-en.svg" alt="EN" style="width: 18px; height: 13px; border-radius: 2px; object-fit: cover; opacity: <?= $LANG === 'en' ? '1' : '0.6' ?>;">
                    EN
                </a>
            </div>
        </div>
    </div>
</footer>
<script src="/assets/js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>
