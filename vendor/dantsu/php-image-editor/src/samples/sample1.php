<?php

require_once '../Geometry2D.php';
require_once '../Image.php';

use \DantSu\PHPImageEditor\Image;

\header('Content-type: image/png');

$image = Image::newCanvas(500, 500)
    ->drawRectangle(0, 0, 500, 500, '#444')
    ->drawRectangle(0, 350, 500, 500, '#FF8800')
    ->writeText('I got the power !', __DIR__ . '/resources/font.ttf', 40, '#FFFFFF', Image::ALIGN_CENTER, 310)
    ->drawCircle(25, 100, 100, '#FF8800')
    ->drawCircle(25, 100, 95, '#000000FF')
    ->drawCircle(475, 100, 100, '#FF8800')
    ->drawCircle(475, 100, 95, '#000000FF');

for($i = 0; $i <= 360; $i+=30) {
    $image
        ->drawArrowWithAngle(250, 200, $i, 80, 2, '#FF8800')
        ->drawArrowWithAngle(250, 200, ($i + 15), 50, 2, '#FF8800');
}

$image
    ->crop(450, 300, Image::ALIGN_CENTER, Image::ALIGN_MIDDLE)
    ->displayPNG();

