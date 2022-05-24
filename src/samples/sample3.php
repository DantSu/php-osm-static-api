<?php
require_once '../../vendor/autoload.php';

require_once '../MapData.php';
require_once '../LatLng.php';
require_once '../Circle.php';
require_once '../Markers.php';
require_once '../OpenStreetMap.php';
require_once '../XY.php';

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\OpenStreetMapStaticAPI\LatLng;
use \DantSu\OpenStreetMapStaticAPI\Circle;
use \DantSu\OpenStreetMapStaticAPI\Markers;

\header('Content-type: image/png');
(new OpenStreetMap(new LatLng(44.351933, 2.568113), 17, 600, 400))
    ->addMarkers(
        (new Markers(__DIR__ . '/resources/marker.png'))
            ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
            ->addMarker(new LatLng(44.351933, 2.568113))
            ->addMarker(new LatLng(44.351510, 2.570020))
            ->addMarker(new LatLng(44.351873, 2.566250))
    )
    ->addDraw(
        (new Circle(
            new LatLng(44.351933, 2.568113),
            'FF0000',
            5,
            'FF0000CC'
        ))
            ->setEdgePoint(new LatLng(44.351510, 2.570020))
    )
    ->addDraw(
        (new Circle(
            new LatLng(44.351933, 2.568113),
            'FF0000',
            5,
            'FF0000CC'
        ))
            ->setRadius(40)
    )
    ->getImage()
    ->displayPNG();


