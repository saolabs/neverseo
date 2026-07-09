<?php
// sections/head.php
$page_title = $page_title ?? 'NeverSEO - Giám đốc SEO Ảo của bạn';
$page_description = $page_description ?? 'Hệ thống Quản trị SEO khép kín dành cho Chủ doanh nghiệp, SEO-ers, và Đội ngũ Content.';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="author" content="SaoLabs">

    <meta property="og:site_name" content="NeverSEO"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>"/>
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>"/>
    <meta property="og:type" content="website"/>

    <title><?php echo htmlspecialchars($page_title); ?></title>

    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>
<body class="studio-body">
