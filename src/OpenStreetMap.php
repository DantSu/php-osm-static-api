<?php

namespace DantSu\OpenStreetMapStaticAPI;

use DantSu\OpenStreetMapStaticAPI\Interfaces\Draw;
use DantSu\PHPImageEditor\Image;

/**
 * DantSu\OpenStreetMapStaticAPI\OpenStreetMap is a PHP library created for easily get static image from OpenStreetMap with markers, lines, polygons and circles.
 *
 * @package DantSu\OpenStreetMapStaticAPI
 * @author Franck Alary
 * @access public
 * @see https://github.com/DantSu/php-osm-static-api Github page of this project
 */
class OpenStreetMap
{
    /**
     * @var MapData Data about the generated map (bounding box, size, OSM tile ids...)
     */
    protected $mapData;
    /**
     * @var TileLayer[] Array of TileLayer instances
     */
    protected $layers = [];
    /**
     * @var Markers[] Array of Markers instances
     */
    protected $markers = [];
    /**
     * @var Draw[] Array of Line instances
     */
    protected $draws = [];

    /**
     * OpenStreetMap constructor.
     * @param LatLng $centerMap Latitude and longitude of the map center
     * @param int $zoom Zoom
     * @param int $imageWidth Width of the generated map image
     * @param int $imageHeight Height of the generated map image
     * @param TileLayer $tileServer Tile server configuration, defaults to OpenStreetMaps tile server
     */
    public function __construct(LatLng $centerMap, int $zoom, int $imageWidth, int $imageHeight, TileLayer $tileServer = null)
    {
        $this->mapData = new MapData($centerMap, $zoom, new XY($imageWidth, $imageHeight));
        $this->layers = [$tileServer === null ? TileLayer::defaultTileLayer() : $tileServer];
    }

    /**
     * Add tile layer to the map
     * @param TileLayer $layer An instance of TileLayer
     * @return $this Fluent interface
     */
    public function addLayer(TileLayer $layer)
    {
        $this->layers[] = $layer;
        return $this;
    }

    /**
     * Add markers on the map
     * @param Markers $markers An instance of Markers
     * @return $this Fluent interface
     */
    public function addMarkers(Markers $markers)
    {
        $this->markers[] = $markers;
        return $this;
    }

    /**
     * Add a line on the map
     * @param Draw $draw An instance of Line
     * @return $this Fluent interface
     */
    public function addDraw(Draw $draw)
    {
        $this->draws[] = $draw;
        return $this;
    }

    /**
     * Get data about the generated map (bounding box, size, OSM tile ids...)
     * @see https://github.com/DantSu/php-osm-static-api/blob/master/docs/classes/DantSu/OpenStreetMapStaticAPI/MapData.md See more about MapData
     * @return MapData data about the generated map (bounding box, size, OSM tile ids...)
     */
    public function getMapData(): MapData
    {
        return $this->mapData;
    }

    /**
     * Get only the map image.
     * @see https://github.com/DantSu/php-image-editor See more about DantSu\PHPImageEditor\Image
     * @return Image An instance of DantSu\PHPImageEditor\Image
     */
    protected function getMapImage(): Image
    {
        $imgSize = $this->mapData->getOutputSize();
        $startX = $this->mapData->getMapCropTopLeft()->getX() * -1;
        $startY = $this->mapData->getMapCropTopLeft()->getY() * -1;

        $image = Image::newCanvas($imgSize->getX(), $imgSize->getY());

        foreach ($this->layers as $tileLayer) {
            $yTile = $this->mapData->getTileTopLeft()->getY();
            for ($y = $startY; $y < $imgSize->getY(); $y += 256) {
                $xTile = $this->mapData->getTileTopLeft()->getX();
                for ($x = $startX; $x < $imgSize->getX(); $x += 256) {
                    $image->pasteOn(
                        $tileLayer->getTile($xTile, $yTile, $this->mapData->getZoom()),
                        $x,
                        $y
                    );
                    ++$xTile;
                }
                ++$yTile;
            }
        }
        return $image;
    }

    /**
     * Draw OpenStreetMap attribution at the right bottom of the image
     * @param Image $image The image of the map
     * @return Image The image of the map with attribution
     */
    protected function drawAttribution(Image $image): Image
    {
        $margin = 5;
        $attribution = function (Image $image, $margin): array {
            return $image->writeTextAndGetBoundingBox(
                \implode(
                    ' - ',
                    \array_map(function ($layer) {
                        return $layer->getAttributionText();
                    }, $this->layers)
                ),
                __DIR__ . '/resources/font.ttf',
                10,
                '0078A8',
                $margin,
                $margin,
                Image::ALIGN_LEFT,
                Image::ALIGN_TOP
            );
        };

        $bbox = $attribution(Image::newCanvas(1, 1), $margin);
        $imageAttribution = Image::newCanvas($bbox['bottom-right']['x'] + $margin, $bbox['bottom-right']['y'] + $margin);
        $imageAttribution->drawRectangle(0, 0, $imageAttribution->getWidth(), $imageAttribution->getHeight(), 'FFFFFF33');
        $attribution($imageAttribution, $margin);

        return $image->pasteOn($imageAttribution, Image::ALIGN_RIGHT, Image::ALIGN_BOTTOM);
    }

    /**
     * Get the map image with markers and lines.
     *
     * @see https://github.com/DantSu/php-image-editor See more about DantSu\PHPImageEditor\Image
     * @return Image An instance of DantSu\PHPImageEditor\Image
     */
    public function getImage(): Image
    {
        $image = $this->getMapImage();

        foreach ($this->draws as $line) {
            $line->draw($image, $this->mapData);
        }

        foreach ($this->markers as $markers) {
            $markers->draw($image, $this->mapData);
        }

        return $this->drawAttribution($image);
    }
}
