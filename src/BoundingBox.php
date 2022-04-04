<?php

namespace DantSu\OpenStreetMapStaticAPI;

/**
 * DantSu\OpenStreetMapStaticAPI\BoundingBox define the bounding box of the static map.
 *
 * @package DantSu\OpenStreetMapStaticAPI
 * @author Franck Alary
 * @access public
 * @see https://github.com/DantSu/php-osm-static-api Github page of this project
 */
class BoundingBox
{
    /**
     * @var LatLng Latitude and longitude of bottom left image
     */
    private $bottomLeft;
    /**
     * @var LatLng Latitude and longitude of top right image
     */
    private $topRight;
    /**
     * @var XY Width and height of the image in pixel
     */
    private $outputPxSize;
    /**
     * @var LatLng Latitude and longitude value for a pixel
     */
    private $coef;

    /**
     * BoundingBox constructor.
     * @param LatLng $bottomLeft Latitude and longitude of bottom left image
     * @param LatLng $topRight Latitude and longitude of top right image
     * @param XY $outputPxSize Width and height of the image in pixel
     */
    public function __construct(LatLng $bottomLeft, LatLng $topRight, XY $outputPxSize)
    {
        $this->bottomLeft = $bottomLeft;
        $this->topRight = $topRight;
        $this->outputPxSize = $outputPxSize;
        $this->coef = new LatLng(
            $this->outputPxSize->getY() / ($this->getTopRight()->getLat() - $this->getBottomLeft()->getLat()),
            $this->outputPxSize->getX() / ($this->getTopRight()->getLng() - $this->getBottomLeft()->getLng())
        );
    }

    /**
     * Get latitude and longitude of bottom left image
     * @return LatLng Latitude and longitude of bottom left image
     */
    public function getBottomLeft(): LatLng
    {
        return $this->bottomLeft;
    }

    /**
     * Get latitude and longitude of top right image
     * @return LatLng Latitude and longitude of top right image
     */
    public function getTopRight(): LatLng
    {
        return $this->topRight;
    }

    /**
     * Get width and height of the image in pixel
     * @return XY Width and height of the image in pixel
     */
    public function getOutputPxSize(): XY
    {
        return $this->outputPxSize;
    }

    /**
     * Convert a latitude and longitude to a XY pixel position in the image
     * @param LatLng $latLng Latitude and longitude to be converted
     * @return XY Pixel position of latitude and longitude in the image
     */
    public function convertLatLngToPxPosition(LatLng $latLng): XY
    {
        return new XY(
            \round(($latLng->getLng() - $this->getBottomLeft()->getLng()) * $this->coef->getLng()),
            $this->outputPxSize->getY() - \round(($latLng->getLat() - $this->getBottomLeft()->getLat()) * $this->coef->getLat())
        );
    }

}
