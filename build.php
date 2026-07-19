<?php
/**
 * BUILD SCRIPT
 * Render src/*.php  ->  build/*.html (static)  và copy static assets (js, img).
 * CSS được compile riêng bởi `npm run build:css` (sass src/assets/scss -> build/assets/css).
 * Dùng `npm run build` để chạy trọn bộ (HTML + assets + CSS).
 */

$SRC   = __DIR__ . '/src';
$BUILD = __DIR__ . '/build';

// Domain gốc — dùng cho canonical/og trong head.php và cho sitemap.xml
$SITE_URL = 'https://neverseo.com';

// Kênh mạng xã hội chính thức — dùng cho footer, schema sameAs và llms.txt.
// Để '' nếu chưa có kênh: footer sẽ tự ẩn icon thay vì để link chết href="#".
$SOCIAL = [
    'LinkedIn' => ['url' => '',                                  'icon' => 'ph-linkedin-logo'],
    'Facebook' => ['url' => '',                                  'icon' => 'ph-facebook-logo'],
    'X'        => ['url' => '',                                  'icon' => 'ph-x-logo'],
    'YouTube'  => ['url' => 'https://www.youtube.com/@NeverSEO', 'icon' => 'ph-youtube-logo'],
];

// Trang nguồn (trong src/) -> file HTML đầu ra (trong build/)
$pages = [
    'index.php'   => 'index.html',
    'privacy.php' => 'privacy.html',
    'terms.php'   => 'terms.html',
];

// Các thư mục asset tĩnh được copy nguyên trạng src/assets -> build/assets.
// Font chỉ copy các bản WOFF2 đã subset, không đưa toàn bộ TTF nguồn vào build.
$asset_dirs = ['js', 'img'];
$font_files = [
    'phosphor-regular-subset.woff2',
    'phosphor-bold-subset.woff2',
    'phosphor-fill-subset.woff2',
    'phosphor-duotone-subset.woff2',
];

/* ------------------------------------------------------------------ helpers */
$LANG_CONFIG = ['en' => '', 'vi' => 'vn'];
global $LANG, $T, $CURRENT_PAGE;

function __($key) {
    global $T;
    $keys = explode('.', $key);
    $val = $T;
    foreach ($keys as $k) {
        if (!isset($val[$k])) return $key;
        $val = $val[$k];
    }
    return $val;
}

function get_lang_url($target_lang) {
    global $LANG, $CURRENT_PAGE, $LANG_CONFIG;
    $prefix = $LANG_CONFIG[$target_lang] !== '' ? '/' . $LANG_CONFIG[$target_lang] : '';
    // If it's index.php -> index.html, we just link to / or /en/
    if ($CURRENT_PAGE === 'index.php') {
        return $prefix === '' ? '/' : $prefix . '/';
    }
    // For privacy.php -> privacy.html
    $html_page = str_replace('.php', '.html', $CURRENT_PAGE);
    return $prefix . '/' . $html_page;
}
// Đường dẫn public của 1 trang đã build, ví dụ ('index.html', 'vn') -> '/vn/'
function page_path(string $output, string $lang_dir): string {
    $prefix = $lang_dir !== '' ? '/' . $lang_dir : '';
    if ($output === 'index.html') {
        return $prefix === '' ? '/' : $prefix . '/';
    }
    return $prefix . '/' . $output;
}

function rrmdir(string $dir): void {
    if (!is_dir($dir)) return;
    foreach (scandir($dir) as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = $dir . '/' . $item;
        is_dir($path) ? rrmdir($path) : unlink($path);
    }
    rmdir($dir);
}

function copy_dir(string $src, string $dst): int {
    if (!is_dir($src)) return 0;
    if (!is_dir($dst)) mkdir($dst, 0755, true);
    $count = 0;
    foreach (scandir($src) as $item) {
        if ($item === '.' || $item === '..' || $item === '.DS_Store') continue;
        $s = $src . '/' . $item;
        $d = $dst . '/' . $item;
        if (is_dir($s)) {
            $count += copy_dir($s, $d);
        } else {
            copy($s, $d);
            $count++;
        }
    }
    return $count;
}

/* --------------------------------------------------------- 1. render pages */
foreach ($LANG_CONFIG as $lang_code => $lang_dir) {
    $LANG = $lang_code;
    $locale_file = $SRC . '/locales/' . $LANG . '.json';
    $T = file_exists($locale_file) ? json_decode(file_get_contents($locale_file), true) : [];
    if (!$T) $T = [];

    $out_dir = $BUILD;
    if ($lang_dir !== '') {
        $out_dir .= '/' . $lang_dir;
    }
    if (!is_dir($out_dir)) mkdir($out_dir, 0755, true);

    foreach ($pages as $source => $output) {
        $source_file = $SRC . '/' . $source;
        $output_file = $out_dir . '/' . $output;
        $CURRENT_PAGE = $source;

        // Reset meta của trang trước: các include chạy chung global scope nên
        // $page_* dùng `??` sẽ rò rỉ sang trang kế tiếp (canonical/title sai).
        unset($page_path, $page_title, $page_description);

        if (!file_exists($source_file)) {
            echo "⚠️  Không tìm thấy {$source_file}\n";
            continue;
        }

        ob_start();
        include $source_file;
        $html = ob_get_clean();

        $bytes = file_put_contents($output_file, $html);
        if ($bytes === false) {
            echo "❌ Không thể ghi file {$output_file}\n";
        } else {
            $lines   = substr_count($html, "\n") + 1;
            $size_kb = round($bytes / 1024, 1);
            $rel_out = str_replace($BUILD . '/', '', $output_file);
            echo "✅ HTML   {$rel_out} ({$lines} dòng, {$size_kb} KB)\n";
        }
    }
}

// Generate a root redirect if root is not used for any language
$root_has_index = false;
foreach ($LANG_CONFIG as $dir) {
    if ($dir === '') $root_has_index = true;
}
if (!$root_has_index) {
    foreach ($pages as $source => $output) {
        $redirect_path = ($output === 'index.html') ? '' : $output;
        $redirect_html = '<!DOCTYPE html><html><head>
<script>
var lang = navigator.language || navigator.userLanguage || "";
if (lang.toLowerCase().startsWith("vi")) {
    window.location.replace("/' . $LANG_CONFIG['vi'] . '/' . $redirect_path . '");
} else {
    window.location.replace("/' . $LANG_CONFIG['en'] . '/' . $redirect_path . '");
}
</script>
<meta http-equiv="refresh" content="0; url=/' . $LANG_CONFIG['en'] . '/' . $redirect_path . '" />
</head><body></body></html>';
        file_put_contents($BUILD . '/' . $output, $redirect_html);
        echo "✅ HTML   {$output} (auto-redirect)\n";
    }
}

/* ---------------------------------------------- 2. copy static assets (js, img) */
foreach ($asset_dirs as $dir) {
    $src = $SRC   . '/assets/' . $dir;
    $dst = $BUILD . '/assets/' . $dir;
    rrmdir($dst);                 // xoá bản cũ (KHÔNG đụng build/assets/css)
    $n = copy_dir($src, $dst);
    echo "📦 ASSET  assets/{$dir}/ ({$n} file)\n";
}

/* -------------------------------------------------- 3. copy optimized fonts */
$font_src = $SRC . '/assets/fonts';
$font_dst = $BUILD . '/assets/fonts';
rrmdir($font_dst);
if (!is_dir($font_dst)) mkdir($font_dst, 0755, true);
$font_count = 0;
foreach ($font_files as $font) {
    if (copy($font_src . '/' . $font, $font_dst . '/' . $font)) {
        $font_count++;
    }
}
echo "📦 ASSET  assets/fonts/ ({$font_count} file)\n";

/* --------------------------------------------------- 4. sinh sitemap.xml */
// Mỗi trang có 1 <url> cho mỗi ngôn ngữ, kèm hreflang alternates (khớp head.php).
$xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
$xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

$url_count = 0;
foreach ($pages as $source => $output) {
    $source_file = $SRC . '/' . $source;
    if (!file_exists($source_file)) continue;

    $lastmod = date('Y-m-d', filemtime($source_file));

    // URL tuyệt đối của trang này ở từng ngôn ngữ
    $alternates = [];
    foreach ($LANG_CONFIG as $lang_code => $lang_dir) {
        $alternates[$lang_code] = $SITE_URL . page_path($output, $lang_dir);
    }

    foreach ($alternates as $loc) {
        $xml .= "    <url>\n";
        $xml .= "        <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
        $xml .= "        <lastmod>{$lastmod}</lastmod>\n";
        $xml .= "        <priority>" . ($output === 'index.html' ? '1.0' : '0.5') . "</priority>\n";
        foreach ($alternates as $lang_code => $alt) {
            $xml .= '        <xhtml:link rel="alternate" hreflang="' . $lang_code
                 . '" href="' . htmlspecialchars($alt, ENT_XML1) . "\"/>\n";
        }
        $xml .= '        <xhtml:link rel="alternate" hreflang="x-default" href="'
             . htmlspecialchars($alternates['en'], ENT_XML1) . "\"/>\n";
        $xml .= "    </url>\n";
        $url_count++;
    }
}
$xml .= "</urlset>\n";

file_put_contents($BUILD . '/sitemap.xml', $xml);
echo "🗺️  SEO    sitemap.xml ({$url_count} URL)\n";

/* ------------------------------------------------------ 5. sinh llms.txt */
// Bản tóm tắt site theo chuẩn llmstxt.org, cho LLM/AI crawler đọc.
// Nội dung lấy từ locale JSON nên tự đồng bộ khi sửa nội dung trang.
foreach ($LANG_CONFIG as $lang_code => $lang_dir) {
    $LANG = $lang_code;
    $locale_file = $SRC . '/locales/' . $LANG . '.json';
    $T = file_exists($locale_file) ? json_decode(file_get_contents($locale_file), true) : [];
    if (!$T) continue;

    $home = $SITE_URL . page_path('index.html', $lang_dir);

    $md  = "# NeverSEO\n\n";
    $md .= "> " . __('meta.description') . "\n\n";
    $md .= "- " . __('footer.brand_desc') . "\n";
    $md .= "- Email: " . __('contact.email_val') . "\n";
    $md .= "- Hotline: " . __('contact.hotline_val') . "\n";
    foreach ($SOCIAL as $social_name => $social) {
        if ($social['url'] === '') continue;
        $md .= "- {$social_name}: {$social['url']}\n";
    }
    $md .= "\n";

    $md .= "## " . __('nav.solution') . "\n\n";
    $md .= "- [" . __('solution.title') . "]({$home}#solution): " . __('solution.desc') . "\n";
    foreach ($T['solution']['pillars'] ?? [] as $pillar) {
        $md .= "- {$pillar['title']}: {$pillar['desc']}\n";
    }
    $md .= "\n";

    $md .= "## " . __('nav.features') . "\n\n";
    foreach ($T['features']['items'] ?? [] as $item) {
        $md .= "- [{$item['title']}]({$home}#features): {$item['desc']}\n";
    }
    $md .= "\n";

    $md .= "## " . __('nav.workflow') . "\n\n";
    foreach ($T['workflow']['steps'] ?? [] as $step) {
        $md .= "- [{$step['title']}]({$home}#workflow): {$step['desc']}\n";
    }
    $md .= "\n";

    $md .= "## " . __('nav.pricing') . "\n\n";
    foreach ($T['pricing']['plans'] ?? [] as $plan) {
        $price = trim($plan['price'] . $plan['unit'] . ' ' . $plan['period']);
        $md .= "- [{$plan['name']} — {$price}]({$home}#pricing): {$plan['tagline']}\n";
    }
    $md .= "- " . __('pricing.desc') . "\n\n";

    $md .= "## " . __('nav.faq') . "\n\n";
    foreach ($T['faq']['items'] ?? [] as $item) {
        $md .= "- [{$item['q']}]({$home}#faq): " . strip_tags($item['a']) . "\n";
    }
    $md .= "\n";

    $md .= "## " . __('footer.col_legal') . "\n\n";
    $md .= "- [" . __('footer.legal_privacy') . "]("
         . $SITE_URL . page_path('privacy.html', $lang_dir) . "): " . __('privacy.meta_desc') . "\n";
    $md .= "- [" . __('footer.legal_terms') . "]("
         . $SITE_URL . page_path('terms.html', $lang_dir) . "): " . __('terms.meta_desc') . "\n";

    $out_dir = $lang_dir !== '' ? $BUILD . '/' . $lang_dir : $BUILD;
    $rel     = ltrim(page_path('llms.txt', $lang_dir), '/');
    file_put_contents($out_dir . '/llms.txt', $md);
    echo "🤖 SEO    {$rel} (" . round(strlen($md) / 1024, 1) . " KB)\n";
}

/* ----------------------------------------------------- 6. sinh robots.txt */
// Cho phép toàn bộ crawler, kể cả AI crawler (liệt kê tường minh để sau này
// muốn chặn bot nào thì đổi Allow -> Disallow ngay tại dòng đó).
$ai_crawlers = [
    'GPTBot',           // OpenAI - crawl để train
    'OAI-SearchBot',    // OpenAI - ChatGPT Search
    'ChatGPT-User',     // OpenAI - user mở link trong ChatGPT
    'ClaudeBot',        // Anthropic - crawl
    'Claude-User',      // Anthropic - user mở link trong Claude
    'PerplexityBot',    // Perplexity
    'Google-Extended',  // Google - Gemini / AI Overviews
    'Applebot-Extended',// Apple Intelligence
    'CCBot',            // Common Crawl
    'Bytespider',       // ByteDance
];

$robots  = "# robots.txt — sinh tự động bởi build.php, đừng sửa tay trong build/\n";
$robots .= "User-agent: *\n";
$robots .= "Allow: /\n\n";
$robots .= "# AI crawler: cho phép, để nội dung NeverSEO được trích dẫn trong câu trả lời AI\n";
foreach ($ai_crawlers as $bot) {
    $robots .= "User-agent: {$bot}\n";
    $robots .= "Allow: /\n\n";
}
$robots .= "# Bản tóm tắt site cho LLM: {$SITE_URL}/llms.txt\n";
$robots .= "Sitemap: {$SITE_URL}/sitemap.xml\n";

file_put_contents($BUILD . '/robots.txt', $robots);
echo "🤖 SEO    robots.txt (" . count($ai_crawlers) . " AI crawler: allow)\n";

echo "🎉 Đã build HTML + assets vào: {$BUILD}\n";
echo "   (Chạy `npm run build:css` để compile CSS nếu chưa dùng `npm run build`.)\n";
