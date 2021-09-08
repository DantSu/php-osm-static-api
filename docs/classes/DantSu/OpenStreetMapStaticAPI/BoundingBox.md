
# BoundingBox

DantSu\OpenStreetMapStaticAPI\BoundingBox define the bounding box of the static map.



* Full name: `\DantSu\OpenStreetMapStaticAPI\BoundingBox`

**See Also:**

* https://github.com/DantSu/php-osm-static-api - Github page of this project



## Methods

- [__construct](#-__construct) 
- [getBottomLeft](#-getbottomleft) 
- [getTopRight](#-gettopright) 
- [getOutputPxSize](#-getoutputpxsize) 
- [convertLatLngToPxPosition](#-convertlatlngtopxposition) 

### ->__construct

BoundingBox constructor.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `bottomLeft` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of bottom left image |
| `topRight` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Latitude and longitude of top right image |
| `outputPxSize` | **\DantSu\OpenStreetMapStaticAPI\XY** | Width and height of the image in pixel |




---
### ->getBottomLeft

Get latitude and longitude of bottom left image









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : Latitude and longitude of bottom left image



---
### ->getTopRight

Get latitude and longitude of top right image









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : Latitude and longitude of top right image



---
### ->getOutputPxSize

Get width and height of the image in pixel









#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\XY** : Width and height of the image in pixel



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
> Automatically generated from source code comments on 2021-09-08 using [phpDocumentor](http://www.phpdoc.org/)
