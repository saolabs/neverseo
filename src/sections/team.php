<?php
// sections/team.php — Đội ngũ (avatar placeholder trong assets/img/team, thay ảnh thật sau)
$members = [
    ['slug' => 'le-ngoc-doan',        'name' => 'Lê Ngọc Doãn',        'role' => 'Founder & Kiến trúc sư sản phẩm', 'bio' => 'Đứng sau kiến trúc Gating & Prompt chaining của NeverSEO.'],
    ['slug' => 'pham-quang-linh',     'name' => 'Phạm Quang Linh',      'role' => 'Co-Founder & Marketing',          'bio' => 'Định hình chiến lược thương hiệu và tăng trưởng cho NeverSEO.'],
    ['slug' => 'dinh-thi-huyen-trang','name' => 'Đinh Thị Huyền Trang', 'role' => 'Cố vấn & Chuyên gia SEO',          'bio' => 'Cố vấn phương pháp Topical Authority và chuẩn chất lượng nội dung.'],
    ['slug' => 'le-thi-anh-van',      'name' => 'Lê Thị Anh Vân',       'role' => 'Chuyên gia SEO',                   'bio' => 'Triển khai audit, phân tích đối thủ và tối ưu on-page thực chiến.'],
];
?>
<section id="team" class="studio-section team-section" aria-labelledby="team-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand">Đội ngũ</p>
            <h2 id="team-title">Những con người đứng sau <span class="gradient-text">NeverSEO</span></h2>
            <p>Kết hợp chuyên môn SEO thực chiến và công nghệ AI để xây dựng công cụ mà chính chúng tôi muốn dùng.</p>
        </div>

        <div class="team-grid">
            <?php foreach ($members as $m): ?>
                <article class="team-card">
                    <img class="team-avatar" src="assets/img/team/<?php echo $m['slug']; ?>.png" alt="<?php echo htmlspecialchars($m['name']); ?>" width="400" height="400" loading="lazy">
                    <h3 class="team-name"><?php echo $m['name']; ?></h3>
                    <p class="team-role"><?php echo $m['role']; ?></p>
                    <p class="team-bio"><?php echo $m['bio']; ?></p>
                    <div class="team-socials" aria-label="Mạng xã hội">
                        <a href="#" aria-label="LinkedIn"><i class="ph-fill ph-linkedin-logo" aria-hidden="true"></i></a>
                        <a href="#" aria-label="Facebook"><i class="ph-fill ph-facebook-logo" aria-hidden="true"></i></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
