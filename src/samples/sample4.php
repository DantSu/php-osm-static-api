<?php
require_once '../../vendor/autoload.php';

require_once '../MapData.php';
require_once '../LatLng.php';
require_once '../Polygon.php';
require_once '../Markers.php';
require_once '../OpenStreetMap.php';
require_once '../TileLayer.php';
require_once '../XY.php';

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\OpenStreetMapStaticAPI\LatLng;
use \DantSu\OpenStreetMapStaticAPI\Polygon;
use \DantSu\OpenStreetMapStaticAPI\Markers;
use \DantSu\OpenStreetMapStaticAPI\TileLayer;

\header('Content-type: image/png');

$tileLayer1 = (new TileLayer(
    'https://khms{s}.google.com/kh/v=925?x={x}&y={y}&z={z}',
    'Images ©2022 Maxar Technologies',
    '0123'
));

// https://stackoverflow.com/a/29712049
$tileLayer2 = (new TileLayer(
    'https://mts{s}.google.com/vt/lyrs=h&x={x}&y={y}&z={z}&apistyle=s.t%3A2|p.v%3Aoff',
    '©GoogleMaps',
    '0123'
))->setOpacity(0.8);

(new OpenStreetMap(new LatLng(44.351933, 2.568113), 17, 600, 400, $tileLayer1))
    ->addLayer($tileLayer2)
    ->addMarkers(
        (new Markers(__DIR__ . '/resources/marker.png'))
            ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
            ->addMarker(new LatLng(44.351933, 2.568113))
            ->addMarker(new LatLng(44.351510, 2.570020))
            ->addMarker(new LatLng(44.351873, 2.566250))
    )
    ->addDraw(
        (new Polygon('FF0000', 2, 'FF0000DD'))
            ->addPoint(new LatLng(44.351172, 2.571092))
            ->addPoint(new LatLng(44.352097, 2.570045))
            ->addPoint(new LatLng(44.352665, 2.568107))
            ->addPoint(new LatLng(44.352887, 2.566503))
            ->addPoint(new LatLng(44.352806, 2.565972))
            ->addPoint(new LatLng(44.351517, 2.565672))
    )
    ->getImage()
    ->displayPNG();
