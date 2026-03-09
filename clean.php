<?php
$file = "c:/xampp/htdocs/Enterprise/resources/views/layouts/app.blade.php";
$content = file_get_contents($file);

// Clean up leftovers from bad regex :bg-[#xxx], :text-[#xxx], :border-[#xxx]
$content = preg_replace("/\:[a-z]+\-\[#[0-9a-fA-F]+\]/", "", $content);
// Also clean up hover:bg-white:bg-[#...], etc.
$content = preg_replace("/\s?:hover:[a-z]+\-\[#[0-9a-fA-F]+\]/", "", $content);

file_put_contents($file, $content);
echo "Cleaned app.blade.php\n";
