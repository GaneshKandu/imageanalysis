
# Error Level Analysis

This tool compares the original image to a recompressed version. This can make manipulated regions stand out in various ways. For example they can be darker or brighter than similar regions which have not been manipulated.

## JPEG Quality

This should match the original quality of the image that has been edited.
## Error Scale

Makes the differences between the original and the recompressed image bigger

> best works with jpeg image

```php
<?php

include "vendor/autoload.php";

$ela = new ImageAnalysis\Image();

/*
	@desc This can make manipulated regions stand out in various ways.
		For example they can be darker or brighter than similar regions
		which have not been manipulated.
	@author ganesh kandu <kanduganesh@gmail.com>
	@param image location
	@param Quality
	@param Scale
	@return image resource
*/

$out = $ela->ELA('sample.jpg',80,10);

header('Content-Type: image/png');

imagejpeg($out);

imagedestroy($out);

```

inspired from [photo forensics](https://29a.ch/2015/08/16/forensically-photo-forensics-for-the-web)


# Main Developers

* **Ganesh Kandu** [Ganesh Kandu](https://github.com/GaneshKandu)
* **Contact** [kanduganesh@gmail.com](mailto:kanduganesh@gmail.com) :envelope: