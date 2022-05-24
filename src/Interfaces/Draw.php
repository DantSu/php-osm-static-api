<?php

namespace DantSu\OpenStreetMapStaticAPI\Interfaces;


use DantSu\OpenStreetMapStaticAPI\MapData;
use DantSu\PHPImageEditor\Image;

interface Draw
{
    public function draw(Image $image, MapData $mapData);
}
