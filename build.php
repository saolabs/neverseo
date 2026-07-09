<?php
/**
 * BUILD SCRIPT – Xuất các trang .php sang .html (static)
 */

$pages = [
    'index.php'   => 'index.html',
    'privacy.php' => 'privacy.html',
    'terms.php'   => 'terms.html',
];

foreach ($pages as $source => $output) {
    $source_file = __DIR__ . '/' . $source;
    $output_file = __DIR__ . '/' . $output;

    if (!file_exists($source_file)) {
        echo "⚠️ Cảnh báo: Không tìm thấy {$source_file}\n";
        continue;
    }

    ob_start();
    include $source_file;
    $html = ob_get_clean();

    $bytes = file_put_contents($output_file, $html);

    if ($bytes === false) {
        echo "❌ Lỗi: Không thể ghi file {$output}\n";
    } else {
        $lines = substr_count($html, "\n") + 1;
        $size_kb = round($bytes / 1024, 1);
        echo "✅ Đã xuất: {$output} ({$lines} dòng, {$size_kb} KB)\n";
    }
}
