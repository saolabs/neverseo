<?php
// sections/workflow.php — Quy trình 4 bước.
// Panel bên phải dựng bằng HTML/CSS thay vì ảnh: luôn đúng brand, không có chữ
// sai chính tả, và cho xem đúng thành phẩm thật của từng bước.
$wf_steps = __('workflow.steps');
$wf_trust = __('workflow.trust');

/** Pill trạng thái dùng chung cho panel chẩn đoán / kiểm duyệt / AI visibility.
 *  build.php include file này một lần cho mỗi ngôn ngữ nên phải chống khai báo lại. */
if (!function_exists('wf_state_icon')) {
    function wf_state_icon(string $state): string {
        return match ($state) {
            'ok'   => 'ph-check-circle',
            'warn' => 'ph-warning-circle',
            default => 'ph-shield-warning',
        };
    }
}
?>
<section id="workflow" class="studio-section workflow-section" aria-labelledby="workflow-title">
    <div class="site-shell">
        <div class="section-intro text-center" style="max-width: 980px; margin: 0 auto 60px auto;">
            <p class="section-label label-brand"><?= __('workflow.label') ?></p>
            <h2 id="workflow-title"><?= __('workflow.title') ?></h2>
            <p style="max-width: 760px; margin-left: auto; margin-right: auto;">
                <?= __('workflow.desc') ?>
            </p>
        </div>

        <div class="workflow-tabs-container">
            <!-- Trái: danh sách bước -->
            <div class="workflow-tab-list">
                <?php foreach ($wf_steps as $i => $step): ?>
                    <button class="workflow-tab-item<?= $i === 0 ? ' active' : '' ?>"
                            type="button"
                            id="wf-tab-<?= $i ?>"
                            data-tab="wf-panel-<?= $i ?>"
                            aria-controls="wf-panel-<?= $i ?>"
                            <?= $i === 0 ? 'aria-current="true"' : '' ?>>
                        <span class="step-index"><?= str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                        <div class="tab-text">
                            <h3><?= $step['title'] ?></h3>
                            <p><?= $step['desc'] ?></p>
                        </div>
                    </button>
                <?php endforeach; ?>

                <!-- Quy trình là vòng lặp, không phải đường thẳng kết thúc ở bước 4 -->
                <p class="workflow-loop">
                    <i class="ph-bold ph-arrows-clockwise" aria-hidden="true"></i>
                    <?= __('workflow.loop_note') ?>
                </p>
            </div>

            <!-- Phải: panel thành phẩm của bước đang chọn -->
            <div class="workflow-tab-panels">
                <?php foreach ($wf_steps as $i => $step): $p = $step['panel']; ?>
                    <div class="tab-panel<?= $i === 0 ? ' active' : '' ?>"
                         id="wf-panel-<?= $i ?>"
                         role="region"
                         aria-labelledby="wf-tab-<?= $i ?>"
                         <?= $i === 0 ? '' : 'aria-hidden="true"' ?>>
                        <div class="mock">
                            <div class="mock-head">
                                <span class="mock-dot" aria-hidden="true"></span>
                                <span class="mock-title"><?= $p['title'] ?></span>
                                <span class="mock-sample"><?= __('workflow.sample_label') ?></span>
                            </div>
                            <p class="mock-caption"><?= $p['caption'] ?></p>

                            <?php if ($i === 0): // Chẩn đoán nền tảng ?>
                                <div class="mock-badges">
                                    <?php foreach ($p['badges'] as $b): ?>
                                        <span class="mock-badge"><em><?= $b['k'] ?></em><?= $b['v'] ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <ul class="mock-rows">
                                    <?php foreach ($p['rows'] as $r): ?>
                                        <li class="mock-row">
                                            <span class="mock-row-label"><?= $r['label'] ?></span>
                                            <span class="mock-pill is-<?= $r['state'] ?>">
                                                <i class="ph-fill <?= wf_state_icon($r['state']) ?>" aria-hidden="true"></i>
                                                <?= $r['value'] ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            <?php elseif ($i === 1): // Chân dung khách hàng + ý định ẩn ?>
                                <p class="mock-persona"><i class="ph-duotone ph-user-circle" aria-hidden="true"></i><?= $p['persona'] ?></p>
                                <p class="mock-subhead"><?= $p['intent_label'] ?></p>
                                <ul class="mock-rows mock-rows-stack">
                                    <?php foreach ($p['rows'] as $r): ?>
                                        <li class="mock-row-stack">
                                            <span class="mock-row-key"><?= $r['label'] ?></span>
                                            <span class="mock-row-val"><?= $r['value'] ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            <?php elseif ($i === 2): // Bản đồ chủ đề + kế hoạch tháng ?>
                                <div class="mock-tree">
                                    <span class="mock-tree-root"><i class="ph-duotone ph-tree-structure" aria-hidden="true"></i><?= $p['tree_root'] ?></span>
                                    <ul>
                                        <?php foreach ($p['tree'] as $t): ?>
                                            <li>
                                                <span class="mock-tree-name"><?= $t['name'] ?></span>
                                                <span class="mock-tag"><?= $t['branch'] ?></span>
                                                <span class="mock-tree-count"><?= $t['count'] ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <p class="mock-subhead"><?= $p['plan_label'] ?></p>
                                <ul class="mock-rows">
                                    <?php foreach ($p['rows'] as $r): ?>
                                        <li class="mock-row">
                                            <span class="mock-code"><?= $r['code'] ?></span>
                                            <span class="mock-row-label"><?= $r['title'] ?></span>
                                            <span class="mock-tag mock-tag-quiet"><?= $r['funnel'] ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                            <?php else: // Kiểm duyệt + đo lường ?>
                                <div class="mock-score-head">
                                    <span class="mock-score-big"><?= $p['score'] ?></span>
                                    <span class="mock-score-label"><?= $p['score_label'] ?></span>
                                    <span class="mock-gate"><i class="ph-fill ph-shield-warning" aria-hidden="true"></i><?= $p['gate'] ?></span>
                                </div>
                                <ul class="mock-rows">
                                    <?php foreach ($p['rows'] as $r): ?>
                                        <li class="mock-row">
                                            <span class="mock-row-label"><?= $r['label'] ?></span>
                                            <span class="mock-pill is-<?= $r['state'] ?>">
                                                <i class="ph-fill <?= wf_state_icon($r['state']) ?>" aria-hidden="true"></i>
                                                <?= $r['value'] ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <p class="mock-subhead"><?= $p['ai_label'] ?></p>
                                <ul class="mock-rows">
                                    <?php foreach ($p['engines'] as $e): ?>
                                        <li class="mock-row">
                                            <span class="mock-row-label"><?= $e['name'] ?></span>
                                            <span class="mock-pill is-<?= $e['state'] ?>">
                                                <i class="ph-fill <?= wf_state_icon($e['state']) ?>" aria-hidden="true"></i>
                                                <?= $e['value'] ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Tiêu chuẩn chất lượng trước khi xuất bản -->
        <div class="workflow-trust">
            <h3 class="workflow-trust-title"><?= $wf_trust['title'] ?></h3>
            <div class="workflow-trust-grid">
                <?php foreach ($wf_trust['items'] as $item): ?>
                    <div class="workflow-trust-item">
                        <i class="ph-fill ph-check-circle" aria-hidden="true"></i>
                        <div>
                            <h4><?= $item['title'] ?></h4>
                            <p><?= $item['desc'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const tabs = Array.from(document.querySelectorAll('.workflow-tab-item'));
    const panels = Array.from(document.querySelectorAll('.workflow-tab-panels .tab-panel'));
    const container = document.querySelector('.workflow-tabs-container');
    if (!tabs.length || !container) return;

    const INTERVAL = 6000;
    let currentIndex = 0;
    let autoPlayId = null;
    let userTookOver = false;

    function activateTab(index) {
        tabs.forEach((t, i) => {
            const on = i === index;
            t.classList.toggle('active', on);
            if (on) { t.setAttribute('aria-current', 'true'); }
            else { t.removeAttribute('aria-current'); }
        });
        panels.forEach((p, i) => {
            const on = i === index;
            p.classList.toggle('active', on);
            if (on) { p.removeAttribute('aria-hidden'); }
            else { p.setAttribute('aria-hidden', 'true'); }
        });
        currentIndex = index;
    }

    function startAutoPlay() {
        // Chỉ tự chạy trên desktop và khi người dùng chưa tự bấm chọn bước.
        if (userTookOver || window.innerWidth <= 991) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
        stopAutoPlay();
        autoPlayId = setInterval(() => activateTab((currentIndex + 1) % tabs.length), INTERVAL);
    }

    function stopAutoPlay() {
        if (autoPlayId !== null) { clearInterval(autoPlayId); autoPlayId = null; }
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            userTookOver = true;   // đã chọn tay thì không tự nhảy nữa
            stopAutoPlay();
            activateTab(index);
        });
        // Điều hướng bằng phím mũi tên cho danh sách bước theo chiều dọc
        tab.addEventListener('keydown', (e) => {
            if (e.key !== 'ArrowDown' && e.key !== 'ArrowUp') return;
            e.preventDefault();
            userTookOver = true;
            stopAutoPlay();
            const next = e.key === 'ArrowDown'
                ? (index + 1) % tabs.length
                : (index - 1 + tabs.length) % tabs.length;
            activateTab(next);
            tabs[next].focus();
        });
    });

    container.addEventListener('mouseenter', stopAutoPlay);
    container.addEventListener('mouseleave', startAutoPlay);
    window.addEventListener('resize', () => { stopAutoPlay(); startAutoPlay(); });

    startAutoPlay();
});
</script>
