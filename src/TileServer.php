<?php

namespace DantSu\OpenStreetMapStaticAPI;

/**
 * DantSu\OpenStreetMapStaticAPI\TileServer define tile server url and related configuration
 *
 * @package DantSu\OpenStreetMapStaticAPI
 * @author Stephan Strate <hello@stephan.codes>
 * @access public
 * @see https://github.com/DantSu/php-osm-static-api Github page of this project
 */
class TileServer
{
    /**
     * @var string Tile server url, defaults to OpenStreetMap tile server
     */
    private $url;

    /**
     * @var string Tile server attribution according to license
     */
    private $attributionText;

    /**
     * @var string[] Tile server subdomains
     */
    private $subdomains;

    /**
     * TileServer constructor
     * @param string $url tile server url with placeholders (`x`, `y`, `z`, `r`, `s`)
     * @param string $attributionText tile server attribution text
     * @param string $subdomains tile server subdomains
     */
    public function __construct(string $url, string $attributionText, string $subdomains = 'abc')
    {
        $this->url = $url;
        $this->attributionText = $attributionText;
        $this->subdomains = str_split($subdomains);
    }

    /**
     * Get tile url for coordinates and zoom level
     * @param int $x x coordinate
     * @param int $y y coordinate
     * @param int $z zoom level
     * @return string tile url
     */
    public function getTileUrl(int $x, int $y, int $z): string
    {
        $patterns = ['r', 's', 'x', 'y', 'z'];
        $replacements = ['', $this->getSubdomain($x, $y), $x, $y, $z];
        return preg_replace(array_map(function ($character) { return "/\\$?\{$character}/"; }, $patterns), $replacements, $this->url);
    }

    /**
     * Select subdomain of tile server to prevent rate limiting on remote server
     * @param int $x x coordinate
     * @param int $y y coordinate
     * @return string selected subdomain
     * @see https://github.com/Leaflet/Leaflet/blob/main/src/layer/tile/TileLayer.js#L233 Leaflet implementation
     */
    protected function getSubdomain(int $x, int $y): string
    {
        $index = abs($x + $y) % sizeof($this->subdomains);
        return $this->subdomains[$index];
    }

    /**
     * Get attribution text
     * @return string Attribution text
     */
    public function getAttributionText(): string
    {
        return $this->attributionText;
    }

    /**
     * Default tile server. OpenStreetMaps with related attribution text
     * @return TileServer default tile server
     */
    public static function defaultTileServer(): TileServer
    {
        return new TileServer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', '© OpenStreetMap contributors');
    }
}
