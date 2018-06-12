<?php

namespace ImageAnalysis\Tests;

use ImageAnalysis\ImageAnalysis;
use PHPUnit\Framework\TestCase;

class ImageAnalysisTest extends TestCase{

    public function testELA(){
        $out = ImageAnalysis::ELA(__DIR__ . '/fixtures/sample.jpg', 80, 10);

        $this->assertInternalType('resource', $out);
    }
}
