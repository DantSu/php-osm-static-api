
# Polygon

DantSu\OpenStreetMapStaticAPI\Polygon draw polygon on the map.



* Full name: `\DantSu\OpenStreetMapStaticAPI\Polygon`
* This class implements: \DantSu\OpenStreetMapStaticAPI\Interfaces\Draw

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- [__construct](#-__construct) 
- [addPoint](#-addpoint) 
- [draw](#-draw) 

### ->__construct

Polygon constructor.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `strokeColor` | **string** | Hexadecimal string color |
| `strokeWeight` | **int** | pixel weight of the line |
| `fillColor` | **string** | Hexadecimal string color |




---
### ->addPoint

Add a latitude and longitude to the polygon








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `latLng` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude to add |


#### Return Value:

 **$this** : Fluent interface



---
### ->draw

Draw the polygon on the map image.








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


---
> Automatically generated from source code comments on 2022-05-24 using [phpDocumentor](http://www.phpdoc.org/)
