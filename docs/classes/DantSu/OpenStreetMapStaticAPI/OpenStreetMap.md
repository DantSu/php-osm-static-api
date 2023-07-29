
# OpenStreetMap

DantSu\OpenStreetMapStaticAPI\OpenStreetMap is a PHP library created for easily get static image from OpenStreetMap with markers, lines, polygons and circles.



* Full name: `\DantSu\OpenStreetMapStaticAPI\OpenStreetMap`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- *(static)* [createFromLatLngZoom](#createfromlatlngzoom) 
- *(static)* [createFromBoundingBox](#createfromboundingbox) 
- [__construct](#-__construct) 
- [addLayer](#-addlayer) 
- [addMarkers](#-addmarkers) 
- [addDraw](#-adddraw) 
- [getMapData](#-getmapdata) 
- [getImage](#-getimage) 

### ::createFromLatLngZoom

Create new instance of OpenStreetMap.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `centerMap` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the map center |
| `zoom` | **int** | Zoom |
| `imageWidth` | **int** | Width of the generated map image |
| `imageHeight` | **int** | Height of the generated map image |
| `tileLayer` | **\DantSu\OpenStreetMapStaticAPI\TileLayer** | Tile server configuration, defaults to OpenStreetMaps tile server |
| `tileSize` | **int** | Tile size in pixels |


#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\OpenStreetMap** : 



---
### ::createFromBoundingBox

Create new instance of OpenStreetMap.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `topLeft` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the map top left |
| `bottomRight` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the map bottom right |
| `padding` | **int** | Padding to add before top left and after bottom right position. |
| `imageWidth` | **int** | Width of the generated map image |
| `imageHeight` | **int** | Height of the generated map image |
| `tileLayer` | **\DantSu\OpenStreetMapStaticAPI\TileLayer** | Tile server configuration, defaults to OpenStreetMaps tile server |
| `tileSize` | **int** | Tile size in pixels |


#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\OpenStreetMap** : 



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
| `tileLayer` | **\DantSu\OpenStreetMapStaticAPI\TileLayer** | Tile server configuration, defaults to OpenStreetMaps tile server |
| `tileSize` | **int** | Tile size in pixels |




---
### ->addLayer

Add tile layer to the map








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `layer` | **\DantSu\OpenStreetMapStaticAPI\TileLayer** | An instance of TileLayer |


#### Return Value:

 **$this** : Fluent interface



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
### ->addDraw

Add a line on the map








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `draw` | **\DantSu\OpenStreetMapStaticAPI\Interfaces\Draw** | An instance of Line |


#### Return Value:

 **$this** : Fluent interface



---
### ->getMapData

Get data about the generated map (bounding box, size, OSM tile ids...)









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\MapData** : data about the generated map (bounding box, size, OSM tile ids...)


#### See Also:

* https://github.com/DantSu/php-osm-static-api/blob/master/docs/classes/DantSu/OpenStreetMapStaticAPI/MapData.md - See more about MapData

---
### ->getImage

Get the map image with markers and lines.









#### Return Value:

 **\DantSu\PHPImageEditor\Image** : An instance of DantSu\PHPImageEditor\Image


#### See Also:

* https://github.com/DantSu/php-image-editor - See more about DantSu\PHPImageEditor\Image

---


---
> Automatically generated from source code comments on 2023-07-30 using [phpDocumentor](http://www.phpdoc.org/)
