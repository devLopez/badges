<?php

namespace Igrejanet\Badges\Factories;

use Laminas\Barcode\Barcode;

class BarcodeFactory
{
    public static function generate(string $code): string
    {
        $config = [
            'fontSize' => 10,
            'marge'    => 10,
            'x'        => 43,
            'y'        => 45,
            'height'   => 10,
            'width'    => 1,
            'angle'    => 0,
            'color'    => '000000',
            'text'     => $code,
            'drawText' => false
        ];

        $renderer = Barcode::factory('code39', 'image', $config)->draw();

        $file = sys_get_temp_dir() . '/barcode.jpg';

        imagejpeg($renderer, $file, 100);

        $image = file_get_contents($file);
        $image = base64_encode($image);

        imagedestroy($renderer);
        unlink($file);

        return 'data:text/plain;base64,' . $image;
    }
}
