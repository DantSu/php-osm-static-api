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
     * Convert longitude and zoom to horizontal OpenStreetMap tile number and pixel position.
     * @param float $lon Longitude
     * @param int $zoom Zoom
     * @return int[] OpenStreetMap tile id and pixel position of the given longitude and zoom
     */
    public static function lngToXTile(float $lon, int $zoom): array
    {
        $x = ($lon + 180) / 360 * \pow(2, $zoom);
        $tile = \floor($x);
        return [
            'id' => $tile,
            'position' => \round(256 * ($x - $tile))
        ];
    }

    /**
     * Convert latitude and zoom to vertical OpenStreetMap tile number and pixel position.
     * @param float $lat Latitude
     * @param int $zoom Zoom
     * @return int[] OpenStreetMap tile id and pixel position of the given latitude and zoom
     */
    public static function latToYTile(float $lat, int $zoom): array
    {
        $y = (1 - \log(\tan(\deg2rad($lat)) + 1 / \cos(\deg2rad($lat))) / M_PI) / 2 * \pow(2, $zoom);
        $tile = \floor($y);
        return [
            'id' => $tile,
            'position' => \round(256 * ($y - $tile))
        ];
    }

    /**
     * Convert horizontal OpenStreetMap tile number ad zoom to longitude.
     * @param int $id Horizontal OpenStreetMap tile id
     * @param int $position Horizontal pixel position on tile
     * @param int $zoom Zoom
     * @return float Longitude of the given OpenStreetMap tile id and zoom
     */
    public static function xTileToLng(int $id, int $position, int $zoom): float
    {
        return ($id + $position / 256) / \pow(2, $zoom) * 360 - 180;
    }

    /**
     * Convert vertical OpenStreetMap tile number and zoom to latitude.
     * @param int $id Vertical OpenStreetMap tile id
     * @param int $position Vertical pixel position on tile
     * @param int $zoom Zoom
     * @return float Latitude of the given OpenStreetMap tile id and zoom
     */
    public static function yTileToLat(int $id, int $position, int $zoom): float
    {
        return \rad2deg(\atan(\sinh(M_PI * (1 - 2 * ($id + $position / 256) / \pow(2, $zoom)))));
    }


    /**
     * Convert pixel position from top of the tile to latitude.
     * @param float $pxPosition y pixel position from top of the tile
     * @param int $tile Y tile id
     * @param int $zoom Zoom
     * @return float latitude
     */
    /*public static function tilePxToLat(float $pxPosition, int $tile, int $zoom): float
    {
        $tileLat = static::yTileToLat($tile, $zoom);
        return $tileLat - \abs(($tileLat - static::yTileToLat($tile + 1, $zoom)) * $pxPosition / 256);
    }*/

    /**
     * Convert pixel position from left of the tile to longitude.
     * @param float $pxPosition x pixel position from left of the tile
     * @param int $tile X tile id
     * @param int $zoom Zoom
     * @return float longitude
     */
    /*public static function tilePxToLng(float $pxPosition, int $tile, int $zoom): float
    {
        $tileLng = static::xTileToLng($tile, $zoom);
        return $tileLng + \abs(($tileLng - static::xTileToLng($tile + 1, $zoom)) * $pxPosition / 256);
    }*/

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

        $x = static::lngToXTile($centerMap->getLng(), $zoom);
        $y = static::latToYTile($centerMap->getLat(), $zoom);

        $startX = \floor($outputSize->getX() / 2 - $x['position']);
        $startY = \floor($outputSize->getY() / 2 - $y['position']);


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
            $x['id'] - \ceil($startX / 256),
            $y['id'] - \ceil($startY / 256)
        );
        $this->tileBottomRight = new XY(
            $x['id'] - 1 + \ceil($rightSize / 256),
            $y['id'] - 1 + \ceil($bottomSize / 256)
        );

        $this->latLngTopLeft = new LatLng(
            static::yTileToLat($this->tileTopLeft->getY(), $this->mapCropTopLeft->getY(), $zoom),
            static::xTileToLng($this->tileTopLeft->getX(), $this->mapCropTopLeft->getX(), $zoom)
        );
        $this->latLngTopRight = new LatLng(
            static::yTileToLat($this->tileTopLeft->getY(), $this->mapCropTopLeft->getY(), $zoom),
            static::xTileToLng($this->tileBottomRight->getX(), 256 - $this->mapCropBottomRight->getX(), $zoom)
        );
        $this->latLngBottomLeft = new LatLng(
            static::yTileToLat($this->tileBottomRight->getY(), 256 - $this->mapCropBottomRight->getY(), $zoom),
            static::xTileToLng($this->tileTopLeft->getX(), $this->mapCropTopLeft->getX(), $zoom)
        );
        $this->latLngBottomRight = new LatLng(
            static::yTileToLat($this->tileBottomRight->getY(), 256 - $this->mapCropBottomRight->getY(), $zoom),
            static::xTileToLng($this->tileBottomRight->getX(), 256 - $this->mapCropBottomRight->getX(), $zoom)
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
            ($x['id'] - $this->tileTopLeft->getX()) * 256 - $this->mapCropTopLeft->getX() + $x['position'],
            ($y['id'] - $this->tileTopLeft->getY()) * 256 - $this->mapCropTopLeft->getY() + $y['position']
        );
    }
}
