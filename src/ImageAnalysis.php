<?php

namespace ImageAnalysis;

class ImageAnalysis{
	
    public static function ELA($image, $quality = 80, $scale = 10){
        $image1 = new Image($image);
        $tempFile = tempnam(sys_get_temp_dir(), 'ELA');
        imagejpeg($image1->image , $tempFile, $quality);
        $image2 = new Image($tempFile);
        $info = $image1->getSize();
        $out = imagecreatetruecolor($info['width'], $info['height']);

        for($x = 0; $x < $info['width']; $x++){
            for($y = 0; $y < $info['height']; $y++){
                $pix1 = $image1->getPixel($x, $y);
                $pix2 = $image2->getPixel($x, $y);
                $pix1['R'] = abs($pix1['R'] - $pix2['R']);
                $pix1['G'] = abs($pix1['G'] - $pix2['G']);
                $pix1['B'] = abs($pix1['B'] - $pix2['B']);
                $pix1['R'] *= $scale;
                $pix1['G'] *= $scale;
                $pix1['B'] *= $scale;
                imagesetpixel($out, $x, $y, $image1->pixel2color($pix1));
            }
        }
        unlink($tempFile);
        return $out;
    }
}

