<?php
require_once '../../vendor/autoload.php';

require_once '../MapData.php';
require_once '../LatLng.php';
require_once '../Line.php';
require_once '../Markers.php';
require_once '../OpenStreetMap.php';
require_once '../XY.php';

use \DantSu\OpenStreetMapStaticAPI\OpenStreetMap;
use \DantSu\OpenStreetMapStaticAPI\LatLng;
use \DantSu\OpenStreetMapStaticAPI\Line;
use \DantSu\OpenStreetMapStaticAPI\Markers;

\header('Content-type: image/png');
(new OpenStreetMap(new LatLng(44.351933, 2.568113), 5, 1024, 1024))
    ->addMarkers(
        (new Markers(__DIR__ . '/resources/marker.png'))
            ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
            ->addMarker(new LatLng(44.351933, 2.568113))
    )
    ->addMarkers(
        (new Markers(__DIR__ . '/resources/marker2.png'))
            ->setAnchor(Markers::ANCHOR_CENTER, Markers::ANCHOR_BOTTOM)
            ->addMarker(new LatLng(48.858535, 2.294107))
            ->addMarker(new LatLng(52.516304, 13.378107))
            ->addMarker(new LatLng(40.415176, -3.707362))
            ->addMarker(new LatLng(51.500845, -0.124591))
            ->addMarker(new LatLng(41.890145, 12.492552))
            ->addMarker(new LatLng(36.809764, 10.134114))
            ->addMarker(new LatLng(31.621758, -7.981512))
            ->addMarker(new LatLng(47.500469, 19.054086))
            ->addMarker(new LatLng(28.119083, -15.438387))
            ->addMarker(new LatLng(57.704334, 11.963886))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(48.858535, 2.294107))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(52.516304, 13.378107))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(40.415176, -3.707362))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(51.500845, -0.124591))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(41.890145, 12.492552))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(36.809764, 10.134114))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(31.621758, -7.981512))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(47.500469, 19.054086))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(28.119083, -15.438387))
    )
    ->addDraw(
        (new Line('FF0000', 1))
            ->addPoint(new LatLng(44.351933, 2.568113))
            ->addPoint(new LatLng(57.704334, 11.963886))
    )
    ->fitToDraws(10)
    ->getImage()
    ->displayPNG();


