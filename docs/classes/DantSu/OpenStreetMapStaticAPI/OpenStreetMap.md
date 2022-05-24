
# OpenStreetMap

DantSu\OpenStreetMapStaticAPI\OpenStreetMap is a PHP library created for easily get static image from OpenStreetMap with markers, lines, polygons and circles.



* Full name: `\DantSu\OpenStreetMapStaticAPI\OpenStreetMap`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- [__construct](#-__construct) 
- [addMarkers](#-addmarkers) 
- [addDraw](#-adddraw) 
- [getMapData](#-getmapdata) 
- [getImage](#-getimage) 

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
> Automatically generated from source code comments on 2022-05-24 using [phpDocumentor](http://www.phpdoc.org/)
