
# Error Level Analysis

This tool compares the original image to a recompressed version. This can make manipulated regions stand out in various ways. For example they can be darker or brighter than similar regions which have not been manipulated.

## JPEG Quality

This should match the original quality of the image that has been edited.
## Error Scale

Makes the differences between the original and the recompressed image bigger

> best works with jpeg image

## Requirement

PHP 5.3+ and GD extension installed

## Get Started

### Installation

This library is designed to be installed via [Composer](https://getcomposer.org/doc/).

Add the dependency into your projects composer.json.
```
{
  "require": {
    "ganeshkandu/imageanalysis": "*"
  }
}
```

Download the composer.phar
``` bash
curl -sS https://getcomposer.org/installer | php
```

Install the library.
``` bash
php composer.phar install
```

#### or

> To add in in your dependencies

``` bash
php composer.phar require ganeshkandu/imageanalysis
```

# USAGE

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