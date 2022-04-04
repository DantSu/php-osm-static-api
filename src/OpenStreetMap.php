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
     * Convert longitude and zoom to horizontal OpenStreetMap tile number.
     * @param float $lon Longitude
     * @param int $zoom Zoom
     * @return int OpenStreetMap tile id of the given longitude and zoom
     */
    public static function lngToXTile(float $lon, int $zoom): int
    {
        return \floor(($lon + 180) / 360 * \pow(2, $zoom));
    }

    /**
     * Convert latitude and zoom to vertical OpenStreetMap tile number.
     * @param float $lat Latitude
     * @param int $zoom Zoom
     * @return int OpenStreetMap tile id of the given latitude and zoom
     */
    public static function latToYTile(float $lat, int $zoom): int
    {
        return \floor((1 - \log(\tan(\deg2rad($lat)) + 1 / \cos(\deg2rad($lat))) / M_PI) / 2 * \pow(2, $zoom));
    }

    /**
     * Convert horizontal OpenStreetMap tile number ad zoom to longitude.
     * @param int $x Horizontal OpenStreetMap tile id
     * @param int $zoom Zoom
     * @return float Longitude of the given OpenStreetMap tile id and zoom
     */
    public static function xTileToLng(int $x, int $zoom): float
    {
        return $x / \pow(2, $zoom) * 360 - 180;
    }

    /**
     * Convert vertical OpenStreetMap tile number and zoom to latitude.
     * @param int $y Vertical OpenStreetMap tile id
     * @param int $zoom Zoom
     * @return float Latitude of the given OpenStreetMap tile id and zoom
     */
    public static function yTileToLat(int $y, int $zoom): float
    {
        return \rad2deg(\atan(\sinh(M_PI * (1 - 2 * $y / \pow(2, $zoom)))));
    }

    /**
     * @var int Zoom
     */
    protected $zoom;
    /**
     * @var BoundingBox Bounding box of the map
     */
    protected $boundingBox;
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
        $this->zoom = $zoom;
        $outputPxSize = new XY($imageWidth, $imageHeight);

        $x = static::lngToXTile($centerMap->getLng(), $zoom);
        $y = static::latToYTile($centerMap->getLat(), $zoom);

        $halfLngWidth = ((static::xTileToLng($x + 1, $zoom) - static::xTileToLng($x, $zoom)) / 256) * $outputPxSize->getX() / 2;
        $halfLatHeight = ((static::yTileToLat($y, $zoom) - static::yTileToLat($y + 1, $zoom)) / 256) * $outputPxSize->getY() / 2;

        $this->boundingBox = new BoundingBox(
            new LatLng($centerMap->getLat() - $halfLatHeight, $centerMap->getLng() - $halfLngWidth),
            new LatLng($centerMap->getLat() + $halfLatHeight, $centerMap->getLng() + $halfLngWidth),
            $outputPxSize
        );
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
     * @return BoundingBox
     */
    public function getBoundingBox(): BoundingBox
    {
        return $this->boundingBox;
    }

    /**
     * Get only the map image.
     *
     * @see https://github.com/DantSu/php-image-editor See more about DantSu\PHPImageEditor\Image
     * @return Image An instance of DantSu\PHPImageEditor\Image
     */
    protected function getMapImage(): Image
    {
        $bbox = $this->boundingBox;
        $yTile = static::latToYTile($bbox->getBottomLeft()->getLat(), $this->zoom);
        $xTile = static::lngToXTile($bbox->getBottomLeft()->getLng(), $this->zoom);
        $startPos = $bbox->convertLatLngToPxPosition(new LatLng(
            static::yTileToLat($yTile, $this->zoom),
            static::xTileToLng($xTile, $this->zoom)
        ));

        $image = Image::newCanvas($bbox->getOutputPxSize()->getX(), $bbox->getOutputPxSize()->getY());

        for ($y = $startPos->getY(); $y > -255; $y -= 256) {
            $tmpXTile = $xTile;
            for ($x = $startPos->getX(); $x < $bbox->getOutputPxSize()->getX(); $x += 256) {
                $i = Image::fromCurl('https://tile.openstreetmap.org/' . $this->zoom . '/' . $tmpXTile . '/' . $yTile . '.png');
                $image->pasteOn($i, $x, $y);
                ++$tmpXTile;
            }
            --$yTile;
        }

        return $image;
    }

    /**
     * get attribution text
     * @return string Attribution text
     */
    protected function getAttributionText() {
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
            $line->draw($image, $this->boundingBox);
        }

        foreach ($this->markers as $markers) {
            $markers->draw($image, $this->boundingBox);
        }

        return $this->drawAttribution($image);
    }
}
