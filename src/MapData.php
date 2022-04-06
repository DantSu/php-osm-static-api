<?php

namespace DantSu\OpenStreetMapStaticAPI;


/**
 * DantSu\OpenStreetMapStaticAPI\MapData convert latitude and longitude to image pixel position.
 *
 * @package DantSu\OpenStreetMapStaticAPI
 * @author Franck Alary
 * @access public
 * @see https://github.com/DantSu/php-osm-static-api Github page of this project
 */
class MapData
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
     * Convert latitude to pixel position from top of the tile.
     * @param float $lat latitude
     * @param int $zoom Zoom
     * @return float pixel position from top of the tile
     */
    public static function latToTilePx(float $lat, int $zoom): float
    {
        $y = static::latToYTile($lat, $zoom);
        $latTile = static::yTileToLat($y, $zoom);
        return ($latTile - $lat) * 256 / ($latTile - static::yTileToLat($y + 1, $zoom));
    }

    /**
     * Convert longitude to pixel position from left of the tile.
     * @param float $lng longitude
     * @param int $zoom Zoom
     * @return float pixel position from left of the tile
     */
    public static function lngToTilePx(float $lng, int $zoom): float
    {
        $x = static::lngToXTile($lng, $zoom);
        $lngTile = static::xTileToLng($x, $zoom);
        return ($lngTile - $lng) * 256 / ($lngTile - static::xTileToLng($x + 1, $zoom));
    }


    /**
     * Convert pixel position from top of the tile to latitude.
     * @param float $pxPosition y pixel position from top of the tile
     * @param int $tile Y tile id
     * @param int $zoom Zoom
     * @return float latitude
     */
    public static function tilePxToLat(float $pxPosition, int $tile, int $zoom): float
    {
        $tileLat = static::yTileToLat($tile, $zoom);
        return $tileLat - \abs(($tileLat - static::yTileToLat($tile + 1, $zoom)) * $pxPosition / 256);
    }

    /**
     * Convert pixel position from left of the tile to longitude.
     * @param float $pxPosition x pixel position from left of the tile
     * @param int $tile X tile id
     * @param int $zoom Zoom
     * @return float longitude
     */
    public static function tilePxToLng(float $pxPosition, int $tile, int $zoom): float
    {
        $tileLng = static::xTileToLng($tile, $zoom);
        return $tileLng + \abs(($tileLng - static::xTileToLng($tile + 1, $zoom)) * $pxPosition / 256);
    }

    /**
     * @var int zoom
     */
    private $zoom;
    /**
     * @var XY Width and height of the image in pixel
     */
    private $outputSize;
    /**
     * @var XY top left tile numbers
     */
    private $tileTopLeft;
    /**
     * @var XY bottom right tile numbers
     */
    private $tileBottomRight;
    /**
     * @var XY left and top pixels to crop to fit final image size
     */
    private $mapCropTopLeft;
    /**
     * @var XY bottom and right pixels to crop to fit final image size
     */
    private $mapCropBottomRight;
    /**
     * @var LatLng Latitude and longitude of top left image
     */
    private $latLngTopLeft;
    /**
     * @var LatLng Latitude and longitude of top right image
     */
    private $latLngTopRight;
    /**
     * @var LatLng Latitude and longitude of bottom left image
     */
    private $latLngBottomLeft;
    /**
     * @var LatLng Latitude and longitude of bottom right image
     */
    private $latLngBottomRight;

    public function __construct(LatLng $centerMap, int $zoom, XY $outputSize)
    {
        $this->zoom = $zoom;
        $this->outputSize = $outputSize;

        $startX = \floor($outputSize->getX() / 2 - static::lngToTilePx($centerMap->getLng(), $zoom));
        $startY = \floor($outputSize->getY() / 2 - static::latToTilePx($centerMap->getLat(), $zoom));

        $x = static::lngToXTile($centerMap->getLng(), $zoom);
        $y = static::latToYTile($centerMap->getLat(), $zoom);

        $rightSize = $outputSize->getX() - $startX;
        $bottomSize = $outputSize->getY() - $startY;

        $this->mapCropTopLeft = new XY(
            $startX < 0 ? \abs($startX) : ($startX % 256 == 0 ? 0 : 256 - $startX % 256),
            $startY < 0 ? \abs($startY) : ($startY % 256 == 0 ? 0 : 256 - $startY % 256)
        );
        $this->mapCropBottomRight = new XY(
            ($rightSize % 256 == 0 ? 0 : 256 - $rightSize % 256),
            ($bottomSize % 256 == 0 ? 0 : 256 - $bottomSize % 256)
        );
        $this->tileTopLeft = new XY(
            $x - \ceil($startX / 256),
            $y - \ceil($startY / 256)
        );
        $this->tileBottomRight = new XY(
            $x - 1 + \ceil($rightSize / 256),
            $y - 1 + \ceil($bottomSize / 256)
        );

        $this->latLngTopLeft = new LatLng(
            static::tilePxToLat($this->mapCropTopLeft->getY(), $this->tileTopLeft->getY(), $zoom),
            static::tilePxToLng($this->mapCropTopLeft->getX(), $this->tileTopLeft->getX(), $zoom)
        );
        $this->latLngTopRight = new LatLng(
            static::tilePxToLat($this->mapCropTopLeft->getY(), $this->tileTopLeft->getY(), $zoom),
            static::tilePxToLng($this->mapCropBottomRight->getX(), $this->tileBottomRight->getX(), $zoom)
        );
        $this->latLngBottomLeft = new LatLng(
            static::tilePxToLat($this->mapCropBottomRight->getY(), $this->tileBottomRight->getY(), $zoom),
            static::tilePxToLng($this->mapCropTopLeft->getX(), $this->tileTopLeft->getX(), $zoom)
        );
        $this->latLngBottomRight = new LatLng(
            static::tilePxToLat($this->mapCropBottomRight->getY(), $this->tileBottomRight->getY(), $zoom),
            static::tilePxToLng($this->mapCropBottomRight->getX(), $this->tileBottomRight->getX(), $zoom)
        );
    }



    /**
     * Get latitude and longitude of top left image
     * @return LatLng Latitude and longitude of top left image
     */
    public function getLatLngTopLeft(): LatLng
    {
        return $this->latLngTopLeft;
    }

    /**
     * Get latitude and longitude of top right image
     * @return LatLng Latitude and longitude of top right image
     */
    public function getLatLngTopRight(): LatLng
    {
        return $this->latLngTopRight;
    }

    /**
     * Get latitude and longitude of bottom left image
     * @return LatLng Latitude and longitude of bottom left image
     */
    public function getLatLngBottomLeft(): LatLng
    {
        return $this->latLngBottomLeft;
    }

    /**
     * Get latitude and longitude of bottom right image
     * @return LatLng Latitude and longitude of bottom right image
     */
    public function getLatLngBottomRight(): LatLng
    {
        return $this->latLngBottomRight;
    }

    /**
     * Get width and height of the image in pixel
     * @return XY Width and height of the image in pixel
     */
    public function getOutputSize(): XY
    {
        return $this->outputSize;
    }

    /**
     * Get the zoom
     * @return int zoom
     */
    public function getZoom(): int
    {
        return $this->zoom;
    }


    /**
     * Get top left tile numbers
     * @return XY top left tile numbers
     */
    public function getTileTopLeft(): XY
    {
        return $this->tileTopLeft;
    }

    /**
     * Get bottom right tile numbers
     * @return XY bottom right tile numbers
     */
    public function getTileBottomRight(): XY
    {
        return $this->tileBottomRight;
    }

    /**
     * Get top left crop pixels
     * @return XY top left crop pixels
     */
    public function getMapCropTopLeft(): XY
    {
        return $this->mapCropTopLeft;
    }

    /**
     * Get bottom right crop pixels
     * @return XY bottom right crop pixels
     */
    public function getMapCropBottomRight(): XY
    {
        return $this->mapCropBottomRight;
    }


    /**
     * Convert a latitude and longitude to a XY pixel position in the image
     * @param LatLng $latLng Latitude and longitude to be converted
     * @return XY Pixel position of latitude and longitude in the image
     */
    public function convertLatLngToPxPosition(LatLng $latLng): XY
    {
        $x = static::lngToXTile($latLng->getLng(), $this->zoom);
        $y = static::latToYTile($latLng->getLat(), $this->zoom);

        return new XY(
            ($x - $this->tileTopLeft->getX()) * 256 - $this->mapCropTopLeft->getX() + static::lngToTilePx($latLng->getLng(), $this->zoom),
            ($y - $this->tileTopLeft->getY()) * 256 - $this->mapCropTopLeft->getY() + static::latToTilePx($latLng->getLat(), $this->zoom)
        );
    }
}
