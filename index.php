<?php
// index.php
$page_title = "NeverSEO - SEO AI Agent cho hệ thống SEO Expert";
$page_description = "Quản lý chiến lược SEO và viết bài bằng AI: audit, chiến lược, kế hoạch nội dung, viết bài và QC trong một quy trình khép kín.";

$sections_dir = __DIR__ . '/sections/';
?>
<?php include $sections_dir . 'head.php'; ?>
<?php include $sections_dir . 'header.php'; ?>

<main class="studio-page">
    <?php include $sections_dir . 'hero.php'; ?>
    <?php include $sections_dir . 'problems.php'; ?>
    <?php include $sections_dir . 'workflow.php'; ?>
    <?php include $sections_dir . 'audience.php'; ?>
    <?php include $sections_dir . 'cta.php'; ?>
</main>

<?php include $sections_dir . 'footer.php'; ?>
