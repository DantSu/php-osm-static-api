
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
- *(static)* [getCenter](#getcenter) 
- *(static)* [getBoundingBoxFromPoints](#getboundingboxfrompoints) 
- *(static)* [getCenterAndZoomFromBoundingBox](#getcenterandzoomfromboundingbox) 
- [__construct](#-__construct) 
- [getLatLngTopLeft](#-getlatlngtopleft) 
- [getLatLngTopRight](#-getlatlngtopright) 
- [getLatLngBottomLeft](#-getlatlngbottomleft) 
- [getLatLngBottomRight](#-getlatlngbottomright) 
- [getOutputSize](#-getoutputsize) 
- [getZoom](#-getzoom) 
- [getTileSize](#-gettilesize) 
- [getTileTopLeft](#-gettiletopleft) 
- [getTileBottomRight](#-gettilebottomright) 
- [getMapCropTopLeft](#-getmapcroptopleft) 
- [getMapCropBottomRight](#-getmapcropbottomright) 
- [convertLatLngToPxPosition](#-convertlatlngtopxposition) 

### ::lngToXTile

Convert longitude and zoom to horizontal OpenStreetMap tile number and pixel position.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lon` | **float** | Longitude |
| `zoom` | **int** | Zoom |
| `tileSize` | **int** | Tile size |


#### Return Value:

 **int[]** : OpenStreetMap tile id and pixel position of the given longitude and zoom



---
### ::latToYTile

Convert latitude and zoom to vertical OpenStreetMap tile number and pixel position.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lat` | **float** | Latitude |
| `zoom` | **int** | Zoom |
| `tileSize` | **int** | Tile size |


#### Return Value:

 **int[]** : OpenStreetMap tile id and pixel position of the given latitude and zoom



---
### ::xTileToLng

Convert horizontal OpenStreetMap tile number ad zoom to longitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `id` | **int** | Horizontal OpenStreetMap tile id |
| `position` | **int** | Horizontal pixel position on tile |
| `zoom` | **int** | Zoom |
| `tileSize` | **int** | Tile size |


#### Return Value:

 **float** : Longitude of the given OpenStreetMap tile id and zoom



---
### ::yTileToLat

Convert vertical OpenStreetMap tile number and zoom to latitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `id` | **int** | Vertical OpenStreetMap tile id |
| `position` | **int** | Vertical pixel position on tile |
| `zoom` | **int** | Zoom |
| `tileSize` | **int** | Tile size |


#### Return Value:

 **float** : Latitude of the given OpenStreetMap tile id and zoom



---
### ::getCenter

Get center between two coordinates.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `point1` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Vertical OpenStreetMap tile id |
| `point2` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Vertical pixel position on tile |


#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : midpoint between the given coordinates



---
### ::getBoundingBoxFromPoints

Transform array of LatLng to bounding box



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `points` | **\DantSu\OpenStreetMapStaticAPI\LatLng[]** |  |


#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng[]** : 



---
### ::getCenterAndZoomFromBoundingBox

Get center and zoom from two points.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `topLeft` | **\DantSu\OpenStreetMapStaticAPI\LatLng** |  |
| `bottomRight` | **\DantSu\OpenStreetMapStaticAPI\LatLng** |  |
| `padding` | **int** |  |
| `imageWidth` | **int** |  |
| `imageHeight` | **int** |  |
| `tileSize` | **int** |  |


#### Return Value:

 **array** : center : LatLng, zoom : int



---
### ->__construct










#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `centerMap` | **\DantSu\OpenStreetMapStaticAPI\LatLng** |  |
| `zoom` | **int** |  |
| `outputSize` | **\DantSu\OpenStreetMapStaticAPI\XY** |  |
| `tileSize` | **int** |  |




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
### ->getTileSize

Get tile size









#### Return Value:

 **int** : tile size



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
> Automatically generated from source code comments on 2023-07-30 using [phpDocumentor](http://www.phpdoc.org/)
