<?php
// sections/head.php
$page_title       = $page_title ?? 'NeverSEO – Nền tảng quản trị SEO toàn diện cho doanh nghiệp';
$page_description = $page_description ?? 'Giải pháp quản lý và triển khai SEO tinh gọn. Giúp chủ doanh nghiệp và đội ngũ marketing làm SEO bài bản, hiệu quả và dễ đo lường.';

// SEO / social — trang gọi (index/privacy/terms) có thể override $page_path, $og_image
$site_url      = 'https://neverseo.com';
$page_path     = $page_path ?? '/';
$canonical_url = rtrim($site_url, '/') . $page_path;
$og_image      = $og_image ?? $site_url . '/assets/img/hero-dashboard.png';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="author" content="SaoLabs">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0ea5e9">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Open Graph -->
    <meta property="og:site_name" content="NeverSEO"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>"/>
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>"/>
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>"/>
    <meta property="og:locale" content="vi_VN"/>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">

    <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">

    <!-- Google Fonts: Roboto (biến thiên, đủ mọi weight 100–900, hỗ trợ tiếng Việt) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">

    <!-- Structured data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "name": "NeverSEO",
          "url": "https://neverseo.com",
          "logo": "https://neverseo.com/assets/img/favicon.svg",
          "parentOrganization": { "@type": "Organization", "name": "SaoLabs" }
        },
        {
          "@type": "WebSite",
          "name": "NeverSEO",
          "url": "https://neverseo.com",
          "inLanguage": "vi-VN"
        },
        {
          "@type": "SoftwareApplication",
          "name": "NeverSEO",
          "applicationCategory": "BusinessApplication",
          "operatingSystem": "Web",
          "description": "NeverSEO giúp doanh nghiệp xây dựng chiến lược SEO bài bản từ dữ liệu thực tế, tạo nội dung chất lượng cao và phát triển thương hiệu bền vững trên công cụ tìm kiếm.",
          "offers": { "@type": "Offer", "price": "0", "priceCurrency": "VND" }
        }
      ]
    }
    </script>
</head>
<body class="studio-body">
