<?php
header("Content-Type: image/png");
$image = imagecreate(300, 150);

// Allocate colors
$yellow = imagecolorallocate($image, 255, 255, 0); // Yellow background
$black = imagecolorallocate($image, 0, 0, 0); // Black text

// Generate random sold count
$sold = rand(50, 200); 

// Add text to the image
imagestring($image, 5, 90, 60, "$sold Items Sold", $black);

// Output the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>