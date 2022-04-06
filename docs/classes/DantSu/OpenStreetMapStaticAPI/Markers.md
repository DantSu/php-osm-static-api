
# Markers

DantSu\OpenStreetMapStaticAPI\Markers display markers on the map.



* Full name: `\DantSu\OpenStreetMapStaticAPI\Markers`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Constants

| Constant | Value |
|:---      |:---   |
|`\DantSu\OpenStreetMapStaticAPI\Markers::ANCHOR_LEFT`|&#039;left&#039;|
|`\DantSu\OpenStreetMapStaticAPI\Markers::ANCHOR_CENTER`|&#039;center&#039;|
|`\DantSu\OpenStreetMapStaticAPI\Markers::ANCHOR_RIGHT`|&#039;right&#039;|
|`\DantSu\OpenStreetMapStaticAPI\Markers::ANCHOR_TOP`|&#039;top&#039;|
|`\DantSu\OpenStreetMapStaticAPI\Markers::ANCHOR_MIDDLE`|&#039;middle&#039;|
|`\DantSu\OpenStreetMapStaticAPI\Markers::ANCHOR_BOTTOM`|&#039;bottom&#039;|

## Methods

- [__construct](#-__construct) 
- [addMarker](#-addmarker) 
- [setAnchor](#-setanchor) 
- [draw](#-draw) 

### ->__construct










#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `pathImage` | **mixed** |  |




---
### ->addMarker

Add a marker on the map.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `coordinate` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of the marker |


#### Return Value:

 **$this** : Fluent interface



---
### ->setAnchor

Define the anchor point of the image marker.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `horizontalAnchor` | **int&#124;string** | Horizontal anchor in pixel or you can use `Markers::ANCHOR_LEFT`, `Markers::ANCHOR_CENTER`, `Markers::ANCHOR_RIGHT` |
| `verticalAnchor` | **int&#124;string** | Vertical anchor in pixel or you can use `Markers::ANCHOR_TOP`, `Markers::ANCHOR_MIDDLE`, `Markers::ANCHOR_BOTTOM` |


#### Return Value:

 **$this** : Fluent interface



---
### ->draw

Draw markers on the image map.








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
> Automatically generated from source code comments on 2022-04-06 using [phpDocumentor](http://www.phpdoc.org/)
