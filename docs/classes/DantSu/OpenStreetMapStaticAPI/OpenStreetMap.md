
# OpenStreetMap

DantSu\OpenStreetMapStaticAPI\OpenStreetMap is a PHP library created for easily get static image from OpenStreetMap with markers and lines.



* Full name: `\DantSu\OpenStreetMapStaticAPI\OpenStreetMap`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- *(static)* [lngToXTile](#lngtoxtile) 
- *(static)* [latToYTile](#lattoytile) 
- *(static)* [xTileToLng](#xtiletolng) 
- *(static)* [yTileToLat](#ytiletolat) 
- [__construct](#-__construct) 
- [addMarkers](#-addmarkers) 
- [addLine](#-addline) 
- [getBoundingBox](#-getboundingbox) 
- [getImage](#-getimage) 

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

Convert vertical OpenStreetMap tile number ad zoom to latitude.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `y` | **int** | Vertical OpenStreetMap tile id |
| `zoom` | **int** | Zoom |


#### Return Value:

 **float** : Latitude of the given OpenStreetMap tile id and zoom



---
### ->__construct

OpenStreetMap constructor.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `centerMap` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the map center |
| `zoom` | **int** | Zoom |
| `imageWidth` | **int** | Width of the generated map image |
| `imageHeight` | **int** | Height of the generated map image |




---
### ->addMarkers

Add markers on the map








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `markers` | **\DantSu\OpenStreetMapStaticAPI\Markers** | An instance of Markers |


#### Return Value:

 **$this** : Fluent interface



---
### ->addLine

Add a line on the map








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `line` | **\DantSu\OpenStreetMapStaticAPI\Line** | An instance of Line |


#### Return Value:

 **$this** : Fluent interface



---
### ->getBoundingBox

Get the bounding box of the map









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\BoundingBox** : 



---
### ->getImage

Get the map image with markers and lines.









#### Return Value:

 **\DantSu\PHPImageEditor\Image** : An instance of DantSu\PHPImageEditor\Image


#### See Also:

* https://github.com/DantSu/php-image-editor - See more about DantSu\PHPImageEditor\Image

---


---
> Automatically generated from source code comments on 2021-09-09 using [phpDocumentor](http://www.phpdoc.org/)
