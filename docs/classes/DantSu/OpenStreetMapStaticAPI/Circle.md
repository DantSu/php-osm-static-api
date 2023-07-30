
# Circle

DantSu\OpenStreetMapStaticAPI\Circle draw circle on the map.



* Full name: `\DantSu\OpenStreetMapStaticAPI\Circle`
* This class implements: \DantSu\OpenStreetMapStaticAPI\Interfaces\Draw

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- [__construct](#-__construct) 
- [setEdgePoint](#-setedgepoint) 
- [setRadius](#-setradius) 
- [draw](#-draw) 
- [getBoundingBox](#-getboundingbox) 

### ->__construct

Circle constructor.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `center` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the circle center |
| `strokeColor` | **string** | Hexadecimal string color |
| `strokeWeight` | **int** | pixel weight of the line |
| `fillColor` | **string** | Hexadecimal string color |




---
### ->setEdgePoint

Set a latitude and longitude to define the radius of the circle.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `edge` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the edge point of a circle |


#### Return Value:

 **$this** : Fluent interface



---
### ->setRadius

Set the radius of the circle in meters.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `radius` | **float** | radius of a circle in meters |


#### Return Value:

 **$this** : Fluent interface



---
### ->draw

Draw the circle on the map image.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `image` | **\DantSu\PHPImageEditor\Image** | The map image (An instance of DantSu\PHPImageEditor\Image) |
| `mapData` | **\DantSu\OpenStreetMapStaticAPI\MapData** | Bounding box of the map |


#### Return Value:

 **$this** : Fluent interface


#### See Also:

* https://github.com/DantSu/php-image-editor - See more about DantSu\PHPImageEditor\Image

---
### ->getBoundingBox

Get bounding box of the shape









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng[]** : 



---


---
> Automatically generated from source code comments on 2023-07-30 using [phpDocumentor](http://www.phpdoc.org/)
