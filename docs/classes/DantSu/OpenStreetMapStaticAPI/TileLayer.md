
# TileLayer

DantSu\OpenStreetMapStaticAPI\TileLayer define tile server url and related configuration



* Full name: `\DantSu\OpenStreetMapStaticAPI\TileLayer`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- *(static)* [defaultTileLayer](#defaulttilelayer) 
- [__construct](#-__construct) 
- [setOpacity](#-setopacity) 
- [getTileUrl](#-gettileurl) 
- [getAttributionText](#-getattributiontext) 
- [getTile](#-gettile) 

### ::defaultTileLayer

Default tile server. OpenStreetMaps with related attribution text



* This method is **static**.





#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\TileLayer** : default tile server



---
### ->__construct

TileLayer constructor








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** | tile server url with placeholders (`x`, `y`, `z`, `r`, `s`) |
| `attributionText` | **string** | tile server attribution text |
| `subdomains` | **string** | tile server subdomains |




---
### ->setOpacity

Set opacity of the layer








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `opacity` | **float** | Opacity value (0 to 1) |


#### Return Value:

 **$this** : Fluent interface



---
### ->getTileUrl

Get tile url for coordinates and zoom level








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **int** | x coordinate |
| `y` | **int** | y coordinate |
| `z` | **int** | zoom level |


#### Return Value:

 **string** : tile url



---
### ->getAttributionText

Get attribution text









#### Return Value:

 **string** : Attribution text



---
### ->getTile

Get an image tile








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **float** |  |
| `y` | **float** |  |
| `z` | **int** |  |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Image instance containing the tile



---


---
> Automatically generated from source code comments on 2022-05-31 using [phpDocumentor](http://www.phpdoc.org/)
