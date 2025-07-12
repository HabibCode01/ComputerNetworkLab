<?php
header("Content-Type: image/png");
$image = imagecreate(300, 150);

// Allocate colors
$white = imagecolorallocate($image, 255, 255, 255); // White background
$red = imagecolorallocate($image, 255, 0, 0); // Red rectangle
$black = imagecolorallocate($image, 0, 0, 0); // Black text

// Draw rectangle
imagefilledrectangle($image, 50, 50, 250, 100, $red);

// Add text to the rectangle
imagestring($image, 5, 130, 70, "Sale!", $black);

// Output the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>