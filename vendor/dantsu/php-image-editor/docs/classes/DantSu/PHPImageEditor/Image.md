
# Image

DantSu\PHPImageEditor\Image is PHP library to easily edit image with GD extension. Resize, crop, merge, draw, and many more options !



* Full name: `\DantSu\PHPImageEditor\Image`

**See Also:**

* https://github.com/DantSu/php-image-editor - Github page of this project



## Constants

| Constant | Value |
|:---      |:---   |
|`\DantSu\PHPImageEditor\Image::ALIGN_LEFT`|&#039;left&#039;|
|`\DantSu\PHPImageEditor\Image::ALIGN_CENTER`|&#039;center&#039;|
|`\DantSu\PHPImageEditor\Image::ALIGN_RIGHT`|&#039;right&#039;|
|`\DantSu\PHPImageEditor\Image::ALIGN_TOP`|&#039;top&#039;|
|`\DantSu\PHPImageEditor\Image::ALIGN_MIDDLE`|&#039;middle&#039;|
|`\DantSu\PHPImageEditor\Image::ALIGN_BOTTOM`|&#039;bottom&#039;|

## Methods

- [getWidth](#-getwidth) 
- [getHeight](#-getheight) 
- [getType](#-gettype) 
- [getImage](#-getimage) 
- [isImageDefined](#-isimagedefined) 
- *(static)* [newCanvas](#newcanvas) 
- [resetCanvas](#-resetcanvas) 
- *(static)* [fromPath](#frompath) 
- [path](#-path) 
- *(static)* [fromForm](#fromform) 
- [form](#-form) 
- *(static)* [fromData](#fromdata) 
- [data](#-data) 
- *(static)* [fromBase64](#frombase64) 
- [base64](#-base64) 
- *(static)* [fromCurl](#fromcurl) 
- [curl](#-curl) 
- [destroy](#-destroy) 
- [rotate](#-rotate) 
- [resizeProportion](#-resizeproportion) 
- [downscaleProportion](#-downscaleproportion) 
- [resize](#-resize) 
- [downscaleAndCrop](#-downscaleandcrop) 
- [crop](#-crop) 
- [pasteOn](#-pasteon) 
- [alphaMask](#-alphamask) 
- [grayscale](#-grayscale) 
- [writeText](#-writetext) 
- [writeTextAndGetBoundingBox](#-writetextandgetboundingbox) 
- [drawRectangle](#-drawrectangle) 
- [drawLine](#-drawline) 
- [drawLineWithAngle](#-drawlinewithangle) 
- [drawArrowWithAngle](#-drawarrowwithangle) 
- [drawArrow](#-drawarrow) 
- [drawCircle](#-drawcircle) 
- [savePNG](#-savepng) 
- [saveJPG](#-savejpg) 
- [saveGIF](#-savegif) 
- [displayPNG](#-displaypng) 
- [displayJPG](#-displayjpg) 
- [displayGIF](#-displaygif) 
- [getDataPNG](#-getdatapng) 
- [getDataJPG](#-getdatajpg) 
- [getDataGIF](#-getdatagif) 
- [getBase64PNG](#-getbase64png) 
- [getBase64JPG](#-getbase64jpg) 
- [getBase64GIF](#-getbase64gif) 
- [getBase64SourcePNG](#-getbase64sourcepng) 
- [getBase64SourceJPG](#-getbase64sourcejpg) 
- [getBase64SourceGIF](#-getbase64sourcegif) 

### ->getWidth

Return the image width









#### Return Value:

 **int** : Image width



---
### ->getHeight

Return the image height









#### Return Value:

 **int** : Image height



---
### ->getType

Return the image type
Image type : 1 GIF; 2 JPG; 3 PNG









#### Return Value:

 **int** : Image type



---
### ->getImage

Return image resource









#### Return Value:

 **resource|\GdImage** : Image resource



---
### ->isImageDefined

Return true if image is initialized









#### Return Value:

 **bool** : Is image initialized



---
### ::newCanvas

(Static method) Create a new image with transparent background



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `width` | **int** | Pixel width of the image |
| `height` | **int** | Pixel height of the image |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Return Image instance



---
### ->resetCanvas

Create a new image with transparent background








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `width` | **int** | Pixel width of the image |
| `height` | **int** | Pixel height of the image |


#### Return Value:

 **$this** : Fluent interface



---
### ::fromPath

(Static method) Open image from local path or URL.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to the image file |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Return Image instance



---
### ->path

Open image from local path or URL.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to the image file |


#### Return Value:

 **$this** : Fluent interface



---
### ::fromForm

(Static method) Open an uploaded image from html form (using $file["tmp_name"]).



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **array** | File array from html form |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Return Image instance



---
### ->form

Open an uploaded image from html form (using $file["tmp_name"]).








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `file` | **array** | File array from html form |


#### Return Value:

 **$this** : Fluent interface



---
### ::fromData

(Static method) Create an Image instance from image raw data.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **string** | Raw data of the image |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Return Image instance



---
### ->data

Create an Image instance from image raw data.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `data` | **string** | Raw data of the image |


#### Return Value:

 **$this** : Fluent interface



---
### ::fromBase64

(Static method) Create an Image instance from base64 image data.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `base64` | **string** | Base64 data of the image |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Return Image instance



---
### ->base64

Create an Image instance from base64 image data.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `base64` | **string** | Base64 data of the image |


#### Return Value:

 **$this** : Fluent interface



---
### ::fromCurl

(Static method) Open image from URL with cURL.



* This method is **static**.




#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** | Url of the image file |


#### Return Value:

 **\DantSu\PHPImageEditor\Image** : Return Image instance



---
### ->curl

Open image from URL with cURL.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `url` | **string** | Url of the image file |


#### Return Value:

 **$this** : Fluent interface



---
### ->destroy

Destroy image









#### Return Value:

 **$this** : Fluent interface



---
### ->rotate

Rotate counterclockwise the image








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `angle` | **int** | Angle in degrees |


#### Return Value:

 **$this** : Fluent interface



---
### ->resizeProportion

Resize the image keeping the proportions.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `width` | **int** | Max width |
| `height` | **int** | Max height |


#### Return Value:

 **$this** : Fluent interface



---
### ->downscaleProportion

Downscale the image keeping the proportions.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `maxWidth` | **int** | Max width |
| `maxHeight` | **int** | Max height |


#### Return Value:

 **$this** : Fluent interface



---
### ->resize

Resize the image.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `width` | **int** | Target width |
| `height` | **int** | Target height |


#### Return Value:

 **$this** : Fluent interface



---
### ->downscaleAndCrop

Downscale the image keeping the proportions then crop to fit to $width and $height params.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `width` | **int** | Max width |
| `height` | **int** | Max height |
| `posX` | **int&#124;string** | Left crop position in pixel. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `posY` | **int&#124;string** | Top crop position in pixel. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |


#### Return Value:

 **$this** : Fluent interface



---
### ->crop

Crop to fit to $width and $height params.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `width` | **int** | Target width |
| `height` | **int** | Target height |
| `posX` | **int&#124;string** | Left crop position in pixel. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `posY` | **int&#124;string** | Top crop position in pixel. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |


#### Return Value:

 **$this** : Fluent interface



---
### ->pasteOn

Paste the image at $posX and $posY position (You can use `Image::ALIGN_...`).








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `image` | **\DantSu\PHPImageEditor\Image** | Image instance to be paste on |
| `posX` | **int&#124;string** | Left position in pixel. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `posY` | **int&#124;string** | Top position in pixel. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |


#### Return Value:

 **$this** : Fluent interface



---
### ->alphaMask

Use a grayscale image (`$mask`) to apply transparency to the image.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `mask` | **\DantSu\PHPImageEditor\Image** | Image instance of the grayscale alpha mask |


#### Return Value:

 **$this** : Fluent interface



---
### ->grayscale

Apply a grayscale filter on the image.









#### Return Value:

 **$this** : Fluent interface



---
### ->writeText

Write text on the image.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | Text to be added on the image |
| `fontPath` | **string** | Path to the TTF file |
| `fontSize` | **int** | Font size |
| `color` | **string** | Hexadecimal string color |
| `posX` | **int&#124;string** | Left position in pixel. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `posY` | **int&#124;string** | Top position in pixel. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |
| `anchorX` | **int&#124;string** | Horizontal anchor of the text. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `anchorY` | **int&#124;string** | Vertical anchor of the text. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |
| `rotation` | **int** | Counterclockwise text rotation in degrees |


#### Return Value:

 **$this** : Fluent interface



---
### ->writeTextAndGetBoundingBox

Write text on the image and get the bounding box of the text in the image.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `string` | **string** | Text to be added on the image |
| `fontPath` | **string** | Path to the TTF file |
| `fontSize` | **int** | Font size |
| `color` | **string** | Hexadecimal string color |
| `posX` | **int&#124;string** | Left position in pixel. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `posY` | **int&#124;string** | Top position in pixel. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |
| `anchorX` | **int&#124;string** | Horizontal anchor of the text. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `anchorY` | **int&#124;string** | Vertical anchor of the text. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |
| `rotation` | **int** | Counterclockwise text rotation in degrees |


#### Return Value:

 **array** : Pixels positions of the



---
### ->drawRectangle

Draw a rectangle.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `left` | **int** | Left position in pixel |
| `top` | **int** | Top position in pixel |
| `right` | **int** | Right position in pixel |
| `bottom` | **int** | Bottom position in pixel |
| `color` | **string** | Hexadecimal string color |


#### Return Value:

 **$this** : Fluent interface



---
### ->drawLine

Draw a Line from `$originX, $originY` to `$dstX, $dstY`.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `originX` | **int** | Horizontal start position in pixel |
| `originY` | **int** | Vertical start position in pixel |
| `dstX` | **int** | Horizontal destination in pixel |
| `dstY` | **int** | Vertical destination in pixel |
| `weight` | **int** | Line weight in pixel |
| `color` | **string** | Hexadecimal string color |


#### Return Value:

 **$this** : Fluent interface



---
### ->drawLineWithAngle

Draw a line using angle and length.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `originX` | **int** | Horizontal start position in pixel |
| `originY` | **int** | Vertical start position in pixel |
| `angle` | **int** | Counterclockwise angle in degrees |
| `length` | **int** | Line length in pixel |
| `weight` | **int** | Line weight in pixel |
| `color` | **string** | Hexadecimal string color |


#### Return Value:

 **$this** : Fluent interface



---
### ->drawArrowWithAngle

Draw an arrow with angle and length.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `originX` | **int** | Horizontal start position in pixel |
| `originY` | **int** | Vertical start position in pixel |
| `angle` | **int** | Counterclockwise angle in degrees |
| `length` | **int** | Line length in pixel |
| `weight` | **int** | Line weight in pixel |
| `color` | **string** | Hexadecimal string color |


#### Return Value:

 **$this** : Fluent interface



---
### ->drawArrow

Draw and arrow from `$originX, $originY` to `$dstX, $dstY`.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `originX` | **int** | Horizontal start position in pixel |
| `originY` | **int** | Vertical start position in pixel |
| `dstX` | **int** | Horizontal destination in pixel |
| `dstY` | **int** | Vertical destination in pixel |
| `weight` | **int** | Line weight in pixel |
| `color` | **string** | Hexadecimal string color |


#### Return Value:

 **$this** : Fluent interface



---
### ->drawCircle

Draw a circle.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `posX` | **int** | Left position of the circle in pixel |
| `posY` | **int** | Top position of the circle in pixel |
| `diameter` | **int** | Circle diameter in pixel |
| `color` | **string** | Hexadecimal string color |
| `anchorX` | **string** | Horizontal anchor of the text. You can use `Image::ALIGN_LEFT`, `Image::ALIGN_CENTER`, `Image::ALIGN_RIGHT` |
| `anchorY` | **string** | Vertical anchor of the text. You can use `Image::ALIGN_TOP`, `Image::ALIGN_MIDDLE`, `Image::ALIGN_BOTTOM` |


#### Return Value:

 **$this** : Fluent interface



---
### ->savePNG

Save the image to PNG file.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to the PNG image file |


#### Return Value:

 **bool** : return true if success



---
### ->saveJPG

Save the image to JPG file.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to the JPG image file |
| `quality` | **int** | JPG quality : 0 to 100 |


#### Return Value:

 **bool** : return true if success



---
### ->saveGIF

Save the image to GIF file.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `path` | **string** | Path to the GIF image file |


#### Return Value:

 **bool** : return true if success



---
### ->displayPNG

Display in PNG format.









#### Return Value:

 **mixed** : 



---
### ->displayJPG

Display in JPG format.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `quality` | **int** | JPG quality : 0 to 100 |


#### Return Value:

 **mixed** : 



---
### ->displayGIF

Display in GIF format.









#### Return Value:

 **mixed** : 



---
### ->getDataPNG

Get image PNG raw data









#### Return Value:

 **string** : Data



---
### ->getDataJPG

Get image JPG raw data








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `quality` | **int** | JPG quality : 0 to 100 |


#### Return Value:

 **string** : Data



---
### ->getDataGIF

Get image GIF raw data









#### Return Value:

 **string** : Data



---
### ->getBase64PNG

Get image PNG base64 data









#### Return Value:

 **string** : Data



---
### ->getBase64JPG

Get image JPG base64 data








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `quality` | **int** | JPG quality : 0 to 100 |


#### Return Value:

 **string** : Data



---
### ->getBase64GIF

Get image GIF base64 data









#### Return Value:

 **string** : Data



---
### ->getBase64SourcePNG

Get image PNG base64 data for <img src=""> tag.









#### Return Value:

 **string** : Data



---
### ->getBase64SourceJPG

Get image JPG base64 data for <img src=""> tag.








#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| `quality` | **int** | JPG quality : 0 to 100 |


#### Return Value:

 **string** : Data



---
### ->getBase64SourceGIF

Get image GIF base64 data for <img src=""> tag.









#### Return Value:

 **string** : Data



---


---
> Automatically generated from source code comments on 2021-09-08 using [phpDocumentor](http://www.phpdoc.org/)
