<?php
$files = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("c:/xampp/htdocs/Enterprise/resources/views/"));
foreach ($iterator as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), '.blade.php')) {
        $files[] = $file->getPathname();
    }
}

foreach($files as $file) {
    // Skip those we already manually tuned or don't want to break
    if (strpos($file, 'layouts') !== false || strpos($file, 'dashboard') !== false || strpos($file, 'clients') !== false || strpos($file, 'projects') !== false || strpos($file, 'metric-card') !== false) {
        continue;
    }
    $content = file_get_contents($file);
    
    // 1. Remove dark mode classes safely
    $content = preg_replace('/dark:[^\s"\'<>]+/', '', $content);
    
    // 2. Standardize Palette
    $content = str_replace(['#E2E8F0', '#1F2937', '#1E293B', '#262b33', '#0B1220', '#161a20'], '#E5E7EB', $content); // Borders and dark bgs
    $content = str_replace(['#0F172A', '#ffffff'], '#111827', $content); // Headers
    $content = str_replace(['#64748B', '#9aa4af', '#9CA3AF'], '#6B7280', $content); // Muted text
    $content = str_replace('#4F46E5', '#6366F1', $content); // Primary Indigo
    $content = str_replace('#4338CA', '#4F46E5', $content); // Primary Hover
    
    // Clean up extra spaces
    $content = preg_replace('/ +/', ' ', $content);
    $content = str_replace(' class=" "', '', $content);
    
    file_put_contents($file, $content);
}
echo "Theme scrub completed.\n";
