<?php
// sections/head.php
$page_title       = $page_title ?? __('meta.title');
$page_description = $page_description ?? __('meta.description');

// SEO / social — trang gọi (index/privacy/terms) có thể override $page_path
$site_url      = 'https://neverseo.com';
$page_path     = $page_path ?? '/';
$canonical_url = rtrim($site_url, '/') . $page_path;
$og_image_path = $LANG === 'vi'
    ? '/assets/img/og-neverseo-vi.png'
    : '/assets/img/og-neverseo-en.png';
$og_image      = $site_url . $og_image_path;
$og_locale     = $LANG === 'vi' ? 'vi_VN' : 'en_US';
$og_alt_locale = $LANG === 'vi' ? 'en_US' : 'vi_VN';
?>
<!DOCTYPE html>
<html lang="<?= $LANG ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="author" content="SaoLabs">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0ea5e9">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- Hreflang Tags for International SEO -->
    <link rel="alternate" hreflang="en" href="<?php echo $site_url . get_lang_url('en'); ?>" />
    <link rel="alternate" hreflang="vi" href="<?php echo $site_url . get_lang_url('vi'); ?>" />
    <link rel="alternate" hreflang="x-default" href="<?php echo $site_url . get_lang_url('en'); ?>" />

    <title><?php echo htmlspecialchars($page_title); ?></title>

    <!-- Open Graph -->
    <meta property="og:site_name" content="NeverSEO"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>"/>
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>"/>
    <meta property="og:image" content="<?php echo htmlspecialchars($og_image); ?>"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($page_title); ?>"/>
    <meta property="og:locale" content="<?php echo $og_locale; ?>"/>
    <meta property="og:locale:alternate" content="<?php echo $og_alt_locale; ?>"/>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($og_image); ?>">

    <link rel="icon" href="/assets/img/favicon.svg" type="image/svg+xml">

    <!-- Google Fonts: Roboto biến thiên, hỗ trợ đầy đủ tiếng Việt. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= time() ?>">

    <!-- Structured data -->
    <?php
    $schema_offers = [];
    $plans = __('pricing.plans');
    if (is_array($plans)) {
        foreach ($plans as $p) {
            $numeric_price = preg_replace('/[^\d]/', '', $p['price']);
            if ($numeric_price === '') {
                continue; // Bỏ qua gói Custom/Flexible vì không có giá cố định
            }
            $schema_offers[] = [
                "@type" => "Offer",
                "name" => $p['name'],
                "price" => $numeric_price,
                "priceCurrency" => $LANG === 'vi' ? 'VND' : 'USD'
            ];
        }
    }
    ?>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "name": "NeverSEO",
          "url": "https://neverseo.com",
          "logo": "https://neverseo.com/assets/img/favicon.svg",
          "image": "https://neverseo.com/assets/img/og-neverseo-en.png",
          "parentOrganization": { "@type": "Organization", "name": "SaoLabs" }
        },
        {
          "@type": "WebSite",
          "name": "NeverSEO",
          "url": "https://neverseo.com",
          "inLanguage": "<?php echo $LANG === 'vi' ? 'vi-VN' : 'en-US'; ?>"
        },
        {
          "@type": "SoftwareApplication",
          "name": "NeverSEO",
          "url": "https://neverseo.com",
          "applicationCategory": "BusinessApplication",
          "operatingSystem": "Web",
          "description": "<?php echo htmlspecialchars($page_description); ?>",
          "offers": <?php echo json_encode($schema_offers, JSON_UNESCAPED_UNICODE); ?>
        }
      ]
    }
    </script>


    <!-- Analytics tải sau tương tác đầu tiên hoặc khi trang đã rảnh. -->
    <script>
    (function () {
      var loaded = false;
      function loadAnalytics() {
        if (loaded) return;
        loaded = true;
        window.dataLayer = window.dataLayer || [];
        window.gtag = function () { window.dataLayer.push(arguments); };
        window.gtag('js', new Date());
        window.gtag('config', 'G-Z0VRDME20D');
        var script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=G-Z0VRDME20D';
        document.head.appendChild(script);
      }

      ['pointerdown', 'keydown', 'touchstart', 'scroll'].forEach(function (eventName) {
        window.addEventListener(eventName, loadAnalytics, { once: true, passive: true });
      });
      window.addEventListener('load', function () {
        window.setTimeout(loadAnalytics, 5000);
      }, { once: true });
    }());
    </script>
</head>
<body class="studio-body">
