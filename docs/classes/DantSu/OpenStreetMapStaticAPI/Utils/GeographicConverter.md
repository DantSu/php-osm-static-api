
# GeographicConverter





* Full name: `\DantSu\OpenStreetMapStaticAPI\Utils\GeographicConverter`



## Methods

- *(static)* [earthRadiusAtLatitude](#earthradiusatlatitude) 
- *(static)* [metersToLatLng](#meterstolatlng) 
- *(static)* [latLngToMeters](#latlngtometers) 
- *(static)* [getCenter](#getcenter) 

### ::earthRadiusAtLatitude

Calculate the earth radius at the given latitude



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `lat` | **float** |  |


#### Return Value:

 **float** : 



---
### ::metersToLatLng

Convert distance and angle from a point to latitude and longitude
0 : top, 90 : right; 180 : bottom, 270 : left



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `from` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Starting coordinate |
| `distance` | **float** | Distance in meters |
| `angle` | **float** | Angle in degrees |


#### Return Value:

 **\DantSu\OpenStreetMapStaticAPI\LatLng** : 



---
### ::latLngToMeters

Get distance in meters between two points.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `from` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Starting coordinate |
| `end` | **\DantSu\OpenStreetMapStaticAPI\LatLng** | Ending coordinate |


#### Return Value:

 **float** : 



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


---
> Automatically generated from source code comments on 2023-07-30 using [phpDocumentor](http://www.phpdoc.org/)
