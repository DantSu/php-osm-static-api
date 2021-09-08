<?php

require_once '../Geometry2D.php';
require_once '../Image.php';

use \DantSu\PHPImageEditor\Image;

\header('Content-type: image/png');

Image::fromPath(__DIR__ . '/resources/photo.jpg')
    ->downscaleAndCrop(1920, 1080, Image::ALIGN_CENTER, Image::ALIGN_BOTTOM)
    ->pasteOn(
        Image::fromPath(__DIR__ . '/resources/watermark.png')->downscaleProportion(300, 300),
        Image::ALIGN_RIGHT,
        Image::ALIGN_TOP
    )
    ->displayJPG(50);

