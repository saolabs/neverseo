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

/* ------------------------------------------------------------------ helpers */
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
if (!is_dir($BUILD)) mkdir($BUILD, 0755, true);

foreach ($pages as $source => $output) {
    $source_file = $SRC . '/' . $source;
    $output_file = $BUILD . '/' . $output;

    if (!file_exists($source_file)) {
        echo "⚠️  Không tìm thấy {$source_file}\n";
        continue;
    }

    ob_start();
    include $source_file;
    $html = ob_get_clean();

    $bytes = file_put_contents($output_file, $html);
    if ($bytes === false) {
        echo "❌ Không thể ghi file {$output}\n";
    } else {
        $lines   = substr_count($html, "\n") + 1;
        $size_kb = round($bytes / 1024, 1);
        echo "✅ HTML   {$output} ({$lines} dòng, {$size_kb} KB)\n";
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
