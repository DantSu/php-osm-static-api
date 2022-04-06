
# MapData

DantSu\OpenStreetMapStaticAPI\MapData convert latitude and longitude to image pixel position.



* Full name: `\DantSu\OpenStreetMapStaticAPI\MapData`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- *(static)* [lngToXTile](#lngtoxtile) 
- *(static)* [latToYTile](#lattoytile) 
- *(static)* [xTileToLng](#xtiletolng) 
- *(static)* [yTileToLat](#ytiletolat) 
- *(static)* [latToTilePx](#lattotilepx) 
- *(static)* [lngToTilePx](#lngtotilepx) 
- *(static)* [tilePxToLat](#tilepxtolat) 
- *(static)* [tilePxToLng](#tilepxtolng) 
- [__construct](#-__construct) 
- [getLatLngTopLeft](#-getlatlngtopleft) 
- [getLatLngTopRight](#-getlatlngtopright) 
- [getLatLngBottomLeft](#-getlatlngbottomleft) 
- [getLatLngBottomRight](#-getlatlngbottomright) 
- [getOutputSize](#-getoutputsize) 
- [getZoom](#-getzoom) 
- [getTileTopLeft](#-gettiletopleft) 
- [getTileBottomRight](#-gettilebottomright) 
- [getMapCropTopLeft](#-getmapcroptopleft) 
- [getMapCropBottomRight](#-getmapcropbottomright) 
- [convertLatLngToPxPosition](#-convertlatlngtopxposition) 

### ::lngToXTile

Convert longitude and zoom to horizontal OpenStreetMap tile number.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lon` | **float** | Longitude |
| `zoom` | **int** | Zoom |


#### Return Value:

 **int** : OpenStreetMap tile id of the given longitude and zoom



---
### ::latToYTile

Convert latitude and zoom to vertical OpenStreetMap tile number.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lat` | **float** | Latitude |
| `zoom` | **int** | Zoom |


#### Return Value:

 **int** : OpenStreetMap tile id of the given latitude and zoom



---
### ::xTileToLng

Convert horizontal OpenStreetMap tile number ad zoom to longitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `x` | **int** | Horizontal OpenStreetMap tile id |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : Longitude of the given OpenStreetMap tile id and zoom



---
### ::yTileToLat

Convert vertical OpenStreetMap tile number and zoom to latitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `y` | **int** | Vertical OpenStreetMap tile id |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : Latitude of the given OpenStreetMap tile id and zoom



---
### ::latToTilePx

Convert latitude to pixel position from top of the tile.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lat` | **float** | latitude |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : pixel position from top of the tile



---
### ::lngToTilePx

Convert longitude to pixel position from left of the tile.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lng` | **float** | longitude |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : pixel position from left of the tile



---
### ::tilePxToLat

Convert pixel position from top of the tile to latitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `pxPosition` | **float** | y pixel position from top of the tile |
| `tile` | **int** | Y tile id |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : latitude



---
### ::tilePxToLng

Convert pixel position from left of the tile to longitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `pxPosition` | **float** | x pixel position from left of the tile |
| `tile` | **int** | X tile id |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : longitude



---
### ->__construct










#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `centerMap` | **\DantSu\OpenStreetMapStaticAPI\LatLng** |  |
| `zoom` | **int** |  |
| `outputSize` | **\DantSu\OpenStreetMapStaticAPI\XY** |  |




---
### ->getLatLngTopLeft

Get latitude and longitude of top left image









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : Latitude and longitude of top left image



---
### ->getLatLngTopRight

Get latitude and longitude of top right image









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : Latitude and longitude of top right image



---
### ->getLatLngBottomLeft

Get latitude and longitude of bottom left image









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : Latitude and longitude of bottom left image



---
### ->getLatLngBottomRight

Get latitude and longitude of bottom right image









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : Latitude and longitude of bottom right image



---
### ->getOutputSize

Get width and height of the image in pixel









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : Width and height of the image in pixel



---
### ->getZoom

Get the zoom









#### Return Value:

 **int** : zoom



---
### ->getTileTopLeft

Get top left tile numbers









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : top left tile numbers



---
### ->getTileBottomRight

Get bottom right tile numbers









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : bottom right tile numbers



---
### ->getMapCropTopLeft

Get top left crop pixels









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : top left crop pixels



---
### ->getMapCropBottomRight

Get bottom right crop pixels









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : bottom right crop pixels



---
### ->convertLatLngToPxPosition

Convert a latitude and longitude to a XY pixel position in the image








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `latLng` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude to be converted |


#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : Pixel position of latitude and longitude in the image



---


---
> Automatically generated from source code comments on 2022-04-06 using [phpDocumentor](http://www.phpdoc.org/)
