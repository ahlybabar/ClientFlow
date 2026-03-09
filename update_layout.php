<?php
$file = "c:/xampp/htdocs/Enterprise/resources/views/layouts/app.blade.php";
$content = file_get_contents($file);

// 1. Remove all dark: classes
$content = preg_replace("/\s?dark:[a-zA-Z0-9\-\_\[\]\#\.\/]+/", "", $content);

// 2. Change sidebar from bg-white to bg-[#F1F5F9]
// Search for <aside ... bg-white
$content = preg_replace('/(<aside\s+class="[^"]*)bg-white([^"]*")/', '$1bg-[#F1F5F9]$2', $content);

// 3. Change all borders from #E2E8F0 to #E5E7EB
$content = str_replace('border-[#E2E8F0]', 'border-[#E5E7EB]', $content);

// 4. Update sidebar menu item hover and active states
// Active item: previously bg-[#EEF2FF] text-[#4F46E5] -> bg-white text-[#6366F1] shadow-sm
$content = str_replace("bg-[#EEF2FF] text-[#4F46E5]", "bg-white text-[#6366F1] shadow-sm", $content);
$content = str_replace("hover:bg-[#F1F5F9] hover:text-[#4F46E5]", "hover:bg-white hover:text-[#6366F1]", $content);
$content = str_replace("text-[#4F46E5]", "text-[#6366F1]", $content); // Active bar color or text
$content = str_replace("bg-[#4F46E5]", "bg-[#6366F1]", $content); // Replace all primary purple to new Indigo
$content = str_replace("hover:bg-[#4338CA]", "hover:bg-[#4F46E5]", $content); // Primary hover

// 5. Update Navbar background explicitly to #FFFFFF and text colors
$content = preg_replace('/(<header[^>]+bg-)white/', '${1}[#FFFFFF]', $content);
$content = preg_replace('/(<header[^>]+)border-b/', '$1border-b', $content); // Ensure border-b is there

// 6. Fix text colors to be #111827 for main, #6B7280 for muted
$content = str_replace('text-[#0F172A]', 'text-[#111827]', $content);
$content = str_replace('text-[#64748B]', 'text-[#6B7280]', $content);

file_put_contents($file, $content);
echo "Layout Updated.\n";
