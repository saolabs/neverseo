<?php
// sections/team.php — Đội ngũ (avatar placeholder trong assets/img/team, thay ảnh thật sau)
$members = [
    ['slug' => 'le-ngoc-doan',        'name' => __('team.members.0.name'),        'role' => __('team.members.0.role'), 'bio' => __('team.members.0.bio')],
    ['slug' => 'pham-quang-linh',     'name' => __('team.members.1.name'),      'role' => __('team.members.1.role'),          'bio' => __('team.members.1.bio')],
    ['slug' => 'dinh-thi-huyen-trang','name' => __('team.members.2.name'), 'role' => __('team.members.2.role'),          'bio' => __('team.members.2.bio')],
    ['slug' => 'le-thi-anh-van',      'name' => __('team.members.3.name'),       'role' => __('team.members.3.role'),                   'bio' => __('team.members.3.bio')],
];
?>
<section id="team" class="studio-section team-section" aria-labelledby="team-title">
    <div class="site-shell">
        <div class="section-intro text-center">
            <p class="section-label label-brand"><?= __('team.label') ?></p>
            <h2 id="team-title"><?= __('team.title_start') ?><span class="gradient-text"><?= __('team.title_gradient') ?></span></h2>
            <p><?= __('team.desc') ?></p>
        </div>

        <div class="team-grid">
            <?php foreach ($members as $m): ?>
                <article class="team-card">
                    <img class="team-avatar" src="/assets/img/team/<?php echo $m['slug']; ?>.png" alt="<?php echo htmlspecialchars($m['name']); ?>" width="400" height="400" loading="lazy">
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
