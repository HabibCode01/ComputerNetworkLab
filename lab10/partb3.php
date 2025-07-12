<?php
header("Content-Type: image/png");

// Create image
$image = imagecreate(500, 150);

// Allocate colors
$light_gray = imagecolorallocate($image, 230, 230, 230); // Light gray background
$black = imagecolorallocate($image, 0, 0, 0); // Black text

// Get name from query parameter
$name = $_GET['name'] ?? 'User';

// Path to TrueType font
$font = __DIR__ . '/fonts/Roboto-Regular.ttf';

// Add text using TrueType font
imagettftext($image, 24, 0, 50, 80, $black, $font, "Hello, $name!");

// Output the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>