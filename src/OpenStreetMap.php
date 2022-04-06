<?php

namespace DantSu\OpenStreetMapStaticAPI;

use DantSu\PHPImageEditor\Image;

/**
 * DantSu\OpenStreetMapStaticAPI\OpenStreetMap is a PHP library created for easily get static image from OpenStreetMap with markers and lines.
 *
 * @package DantSu\OpenStreetMapStaticAPI
 * @author Franck Alary
 * @access public
 * @see https://github.com/DantSu/php-osm-static-api Github page of this project
 */
class OpenStreetMap
{
    /**
     * @var MapData Bounding box of the map
     */
    protected $mapData;
    /**
     * @var Markers[] Array of Markers instances
     */
    protected $markers = [];
    /**
     * @var Line[] Array of Line instances
     */
    protected $lines = [];


    /**
     * OpenStreetMap constructor.
     * @param LatLng $centerMap Latitude and longitude of the map center
     * @param int $zoom Zoom
     * @param int $imageWidth Width of the generated map image
     * @param int $imageHeight Height of the generated map image
     */
    public function __construct(LatLng $centerMap, int $zoom, int $imageWidth, int $imageHeight)
    {
        $this->mapData = new MapData($centerMap, $zoom, new XY($imageWidth, $imageHeight));
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
     * @param Line $line An instance of Line
     * @return $this Fluent interface
     */
    public function addLine(Line $line)
    {
        $this->lines[] = $line;
        return $this;
    }

    /**
     * Get the bounding box of the map
     * @return MapData
     */
    public function getMapData(): MapData
    {
        return $this->mapData;
    }

    /**
     * Get only the map image.
     *
     * @see https://github.com/DantSu/php-image-editor See more about DantSu\PHPImageEditor\Image
     * @return Image An instance of DantSu\PHPImageEditor\Image
     */
    protected function getMapImage(): Image
    {
        $imgSize = $this->mapData->getOutputSize();
        $startX = $this->mapData->getMapCropTopLeft()->getX() * -1;
        $startY = $this->mapData->getMapCropTopLeft()->getY() * -1;
        $yTile = $this->mapData->getTileTopLeft()->getY();

        $image = Image::newCanvas($imgSize->getX(), $imgSize->getY());

        for ($y = $startY; $y < $imgSize->getY(); $y += 256) {
            $xTile = $this->mapData->getTileTopLeft()->getX();
            for ($x = $startX; $x < $imgSize->getX(); $x += 256) {
                $i = Image::fromCurl('https://tile.openstreetmap.org/' . $this->mapData->getZoom() . '/' . $xTile . '/' . $yTile . '.png');
                $image->pasteOn($i, $x, $y);
                ++$xTile;
            }
            ++$yTile;
        }

        return $image;
    }

    /**
     * get attribution text
     * @return string Attribution text
     */
    protected function getAttributionText()
    {
        return '© OpenStreetMap contributors';
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
                $this->getAttributionText(),
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

        foreach ($this->lines as $line) {
            $line->draw($image, $this->mapData);
        }

        foreach ($this->markers as $markers) {
            $markers->draw($image, $this->mapData);
        }

        return $this->drawAttribution($image);
    }
}
