
# TileLayer

DantSu\OpenStreetMapStaticAPI\TileLayer define tile server url and related configuration



* Full name: `\DantSu\OpenStreetMapStaticAPI\TileLayer`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- *(static)* [defaultTileLayer](#defaulttilelayer) 
- [__construct](#-__construct) 
- [setOpacity](#-setopacity) 
- [setMaxZoom](#-setmaxzoom) 
- [getMaxZoom](#-getmaxzoom) 
- [setMinZoom](#-setminzoom) 
- [getMinZoom](#-getminzoom) 
- [checkZoom](#-checkzoom) 
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
| `curlOptions` | **array** | Array of curl options |
| `failCurlOnError` | **bool** | If true, curl will throw an exception on error. |




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
### ->setMaxZoom

Set a max zoom value








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `maxZoom` | **int** |  |


#### Return Value:

 **$this** : Fluent interface



---
### ->getMaxZoom

Get max zoom value









#### Return Value:

 **int** : 



---
### ->setMinZoom

Set a min zoom value








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `minZoom` | **int** |  |


#### Return Value:

 **$this** : Fluent interface



---
### ->getMinZoom

Get min zoom value









#### Return Value:

 **int** : 



---
### ->checkZoom

Check if zoom value is between min zoom and max zoom








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `zoom` | **int** | Zoom value to be checked |


#### Return Value:

 **int** : 



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
| `tileSize` | **int** |  |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Image instance containing the tile



---


---
> Automatically generated from source code comments on 2023-07-30 using [phpDocumentor](http://www.phpdoc.org/)
