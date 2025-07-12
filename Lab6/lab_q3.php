<?php
function calculateArea($width, $height) {
    return $width * $height;
}
$width = 4;
$height = 2;
$area = calculateArea($width, $height);
echo "The area of a rectangle with width $width and height $height is $area";
?>