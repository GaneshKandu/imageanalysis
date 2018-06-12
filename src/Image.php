<?php

/*
///////////////////////////////////////////////////
This tool compares the original image to a recompressed version. This can make manipulated regions stand out in various ways. For example they can be darker or brighter than similar regions which have not been manipulated.
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

namespace ImageAnalysis;

class Image{

	public function __construct($im){
		$this->location = $im;
		$temp = $this->getSize();
		switch($temp['mime']){
			case 'image/png':
				$this->image = imagecreatefrompng($im);
			break;
			case 'image/jpeg':
				$this->image = imagecreatefromjpeg($im);
			break;
			case 'image/gif':
				$this->image = imagecreatefromgif($im);
			break;
			case 'image/bmp':
				$this->image = imagecreatefromwbmp($im);
			break;
		}
	}
	
	public function getSize(){
		$info = array();
		$x = getimagesize($this->location);
		list($info['width'],$info['height'],$info['type'],$info['attr']) = $x;
		$info['bits'] = $x['bits'];
		$info['mime'] = $x['mime'];
		return $info;
	}
	
	public function getPixel($x, $y){
		$pixels = array();
		$color = imagecolorat($this->image, $x, $y);
		return $this->color2pixel($color);
	}
	
	public function color2pixel($color){
		$pixels['R'] = ($color >> 16) & 0xFF;
		$pixels['G'] = ($color >> 8) & 0xFF;
		$pixels['B'] = $color & 0xFF;
		return $pixels;
	}
	
	public function pixel2color($rgb){
		$pixels['R'] = $rgb['R']*65536;
		$pixels['G'] = $rgb['G']*256;
		$pixels['B'] = $rgb['B'];
		return $pixels['R'] + $pixels['G'] + $pixels['B'];
	}
	
}
