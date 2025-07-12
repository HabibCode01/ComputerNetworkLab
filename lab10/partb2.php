<?php
header("Content-Type: image/png");
$image = imagecreate(300, 300);

// Allocate colors
$white = imagecolorallocate($image, 255, 255, 255); // White background
$green = imagecolorallocate($image, 0, 128, 0); // Green circle
$purple = imagecolorallocate($image, 128, 0, 128); // Purple line

// Draw circle
imagefilledellipse($image, 150, 150, 200, 200, $green);

// Draw line
imageline($image, 50, 50, 250, 250, $purple);

// Output the image
imagepng($image);

// Free up memory
imagedestroy($image);
?>