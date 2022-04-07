
# Line

DantSu\OpenStreetMapStaticAPI\Line draw line on the map.



* Full name: `\DantSu\OpenStreetMapStaticAPI\Line`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- [__construct](#-__construct) 
- [addPoint](#-addpoint) 
- [draw](#-draw) 

### ->__construct

Line constructor.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `color` | **string** | Hexadecimal string color |
| `weight` | **int** | pixel weight of the line |




---
### ->addPoint

Add a latitude and longitude to the multi-points line








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `latLng` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude to add |


#### Return Value:

 **$this** : Fluent interface



---
### ->draw

Draw the line on the map image.








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
> Automatically generated from source code comments on 2022-04-07 using [phpDocumentor](http://www.phpdoc.org/)
