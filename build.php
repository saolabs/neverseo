<?php
/**
 * BUILD SCRIPT
 * Render src/*.php  ->  build/*.html (static)  và copy static assets (js, img).
 * CSS được compile riêng bởi `npm run build:css` (sass src/assets/scss -> build/assets/css).
 * Dùng `npm run build` để chạy trọn bộ (HTML + assets + CSS).
 */

$SRC   = __DIR__ . '/src';
$BUILD = __DIR__ . '/build';

// Trang nguồn (trong src/) -> file HTML đầu ra (trong build/)
$pages = [
    'index.php'   => 'index.html',
    'privacy.php' => 'privacy.html',
    'terms.php'   => 'terms.html',
];

// Các thư mục asset tĩnh được copy nguyên trạng src/assets -> build/assets
// (css KHÔNG nằm ở đây vì được sass sinh ra ở bước build:css)
$asset_dirs = ['js', 'img'];

$asset_dirs = ['js', 'img'];

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

echo "🎉 Đã build HTML + assets vào: {$BUILD}\n";
echo "   (Chạy `npm run build:css` để compile CSS nếu chưa dùng `npm run build`.)\n";
