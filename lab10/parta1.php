<?php
header("Content-Type: image/png");
$image = imagecreate(400, 100);

// Allocate colors
$blue = imagecolorallocate($image, 0, 0, 255); // Blue background
$white = imagecolorallocate($image, 255, 255, 255); // White text

// Add text to the image
imagestring($image, 5, 100, 40, "Welcome to Our Shop!", $white);

// Output the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>