<?php
// index.php
$page_title = "NeverSEO – Nền tảng quản trị SEO toàn diện cho doanh nghiệp";
$page_description = "Thay vì viết bài hàng loạt, NeverSEO giúp bạn lập kế hoạch SEO dựa trên dữ liệu thực tế, tạo nội dung chất lượng cao để thu hút khách hàng và tăng trưởng bền vững trên Google.";

$sections_dir = __DIR__ . '/sections/';
?>
<?php include $sections_dir . 'head.php'; ?>
<?php include $sections_dir . 'header.php'; ?>

<main class="studio-page">
    <?php include $sections_dir . 'hero.php'; ?>
    <?php include $sections_dir . 'logos.php'; ?>
    <?php include $sections_dir . 'problems.php'; ?>
    <?php include $sections_dir . 'solution.php'; ?>
    <?php include $sections_dir . 'workflow.php'; ?>
    <?php include $sections_dir . 'features.php'; ?>
    <?php include $sections_dir . 'testimonials.php'; ?>
    <?php include $sections_dir . 'pricing.php'; ?>
    <?php include $sections_dir . 'audience.php'; ?>
    <?php include $sections_dir . 'faq.php'; ?>
    <?php include $sections_dir . 'team.php'; ?>
    <?php include $sections_dir . 'contact.php'; ?>
    <?php include $sections_dir . 'cta.php'; ?>
</main>

<?php include $sections_dir . 'footer.php'; ?>
