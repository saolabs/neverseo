<?php
// sections/solution.php — Hệ sinh thái NeverSEO (sơ đồ đặc vụ AI radial + 4 trụ cột)
$pillars = [
    ['icon' => 'ph-brain',  'title' => 'Công nghệ Autonomous AI', 'desc' => 'Tự động đọc tài liệu và phân tích đối thủ Top 10 để chiết xuất những góc nhìn mới lạ.'],
    ['icon' => 'ph-kanban', 'title' => 'Quản trị tập trung',      'desc' => 'Đồng bộ nghiên cứu từ khóa, Topical Map và xuất bản trong cùng một Dashboard.'],
    ['icon' => 'ph-cpu',    'title' => 'Phân bổ Model thông minh','desc' => 'Model cao cấp cho chiến lược, model phổ thông cho tác vụ lặp lại để tối ưu chi phí.'],
    ['icon' => 'ph-checks', 'title' => 'Kiểm duyệt tự động',      'desc' => 'Chấm điểm On-page (0–100); bài viết phải đạt chuẩn cấu trúc semantic mới được duyệt.'],
];

// 6 đặc vụ quanh tâm (430,340); cặp trên/dưới được giãn nhẹ để bố cục thoáng hơn
$hx = 430; $hy = 340; $W = 220; $H = 60;
$nodes = [
    ['x' => 265, 'y' => 89,  'label' => 'Audit',             'tw' => 48,  'color' => '#38bdf8'],
    ['x' => 595, 'y' => 89,  'label' => 'Kế hoạch nội dung', 'tw' => 143, 'color' => '#60a5fa'],
    ['x' => 140, 'y' => 340, 'label' => 'Chiến lược',        'tw' => 96,  'color' => '#818cf8'],
    ['x' => 720, 'y' => 340, 'label' => 'Viết bài',          'tw' => 74,  'color' => '#a78bfa'],
    ['x' => 265, 'y' => 591, 'label' => 'Từ khóa',           'tw' => 66,  'color' => '#22d3ee'],
    ['x' => 595, 'y' => 591, 'label' => 'Kiểm duyệt',        'tw' => 100, 'color' => '#67e8f9'],
];
?>
<section id="solution" class="studio-section solution-section" aria-labelledby="solution-title">
    <div class="site-shell">

        <div class="section-intro text-center" style="max-width: 820px; margin: 0 auto 56px auto;">
            <p class="section-label">Hệ sinh thái NeverSEO</p>
            <h2 id="solution-title">Sức mạnh của cả một đội ngũ SEO, thu gọn trong một nền tảng AI.</h2>
            <p>
                Thay vì các công cụ rời rạc, NeverSEO điều phối một đội ngũ <strong>“Đặc vụ AI”</strong> tự suy luận, phân tích dữ liệu và triển khai chiến dịch với tư duy của những chuyên gia thực thụ — tất cả quanh một bộ não trung tâm.
            </p>
        </div>

        <!-- Sơ đồ hệ sinh thái (SVG tự vẽ, các đặc vụ cách đều tâm, chip rộng bằng nhau) -->
        <div class="ecosystem-visual" role="img" aria-label="Sơ đồ hệ sinh thái: bộ não NeverSEO điều phối 6 đặc vụ AI gồm Audit, Chiến lược, Từ khóa, Kế hoạch nội dung, Viết bài và Kiểm duyệt.">
            <svg viewBox="0 0 860 680" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="eco-hub" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0" stop-color="#38bdf8"/>
                        <stop offset="1" stop-color="#6366f1"/>
                    </linearGradient>
                    <filter id="eco-shadow" x="-14%" y="-14%" width="128%" height="128%">
                        <feDropShadow dx="0" dy="6" stdDeviation="7" flood-color="#04121f" flood-opacity="0.34"/>
                    </filter>
                    <filter id="eco-glow" x="-60%" y="-60%" width="220%" height="220%">
                        <feGaussianBlur stdDeviation="26" result="b"/>
                        <feMerge><feMergeNode in="b"/><feMergeNode in="SourceGraphic"/></feMerge>
                    </filter>
                </defs>

                <!-- vòng quỹ đạo -->
                <circle cx="<?php echo $hx; ?>" cy="<?php echo $hy; ?>" r="290" fill="none" stroke="rgba(255,255,255,0.13)" stroke-width="1.5" stroke-dasharray="4 8"/>
                <circle cx="<?php echo $hx; ?>" cy="<?php echo $hy; ?>" r="196" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="1.5"/>

                <!-- đường nối tâm -> đặc vụ -->
                <g stroke="rgba(255,255,255,0.22)" stroke-width="1.5">
                    <?php foreach ($nodes as $n): ?>
                    <line x1="<?php echo $hx; ?>" y1="<?php echo $hy; ?>" x2="<?php echo $n['x']; ?>" y2="<?php echo $n['y']; ?>"/>
                    <?php endforeach; ?>
                </g>

                <!-- các đặc vụ (chip rộng bằng nhau, nội dung căn giữa) -->
                <g filter="url(#eco-shadow)" font-size="16.5" font-weight="600">
                    <?php foreach ($nodes as $n):
                        $rectX = $n['x'] - $W / 2;
                        $rectY = $n['y'] - $H / 2;
                        $gw = 16 + 10 + $n['tw'];         // bề rộng cụm dot + chữ
                        $gl = $n['x'] - $gw / 2;          // căn giữa cụm trong chip
                    ?>
                    <g>
                        <rect x="<?php echo $rectX; ?>" y="<?php echo $rectY; ?>" width="<?php echo $W; ?>" height="<?php echo $H; ?>" rx="<?php echo $H / 2; ?>" fill="#ffffff"/>
                        <circle cx="<?php echo $gl + 8; ?>" cy="<?php echo $n['y']; ?>" r="8" fill="<?php echo $n['color']; ?>"/>
                        <text x="<?php echo $gl + 26; ?>" y="<?php echo $n['y'] + 6; ?>" fill="#0b1220"><?php echo $n['label']; ?></text>
                    </g>
                    <?php endforeach; ?>
                </g>

                <!-- bộ não trung tâm -->
                <circle cx="<?php echo $hx; ?>" cy="<?php echo $hy; ?>" r="85" fill="url(#eco-hub)" filter="url(#eco-glow)" opacity="0.95"/>
                <circle cx="<?php echo $hx; ?>" cy="<?php echo $hy; ?>" r="85" fill="none" stroke="rgba(255,255,255,0.35)" stroke-width="1.5"/>
                <text x="<?php echo $hx; ?>" y="<?php echo $hy; ?>" text-anchor="middle" dominant-baseline="central" font-size="31" font-weight="800" letter-spacing="-0.5">
                    <tspan fill="#ffffff">Never</tspan><tspan fill="#a5f3fc">SEO</tspan>
                </text>
            </svg>
        </div>

        <!-- 4 trụ cột -->
        <div class="solution-pillars">
            <?php foreach ($pillars as $p): ?>
                <article class="pillar-card">
                    <div class="pillar-icon"><i class="ph-duotone <?php echo $p['icon']; ?>" aria-hidden="true"></i></div>
                    <h3><?php echo $p['title']; ?></h3>
                    <p><?php echo $p['desc']; ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
