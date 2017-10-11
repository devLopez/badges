<?php

namespace Igrejanet\Badges;

use Zend\Barcode\Barcode;

/**
 * BarcodeFactory
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.1.0
 * @since   02/09/2017
 * @package Igrejanet\Badges
 */
class BarcodeFactory
{
    /**
     * @param   string  $code
     * @return  string
     */
    public static function generate($code) : string
    {
        $config = [
            'fontSize'	=> 10,
            'marge' 	=> 10,
            'x' 		=> 43,
            'y' 		=> 45,
            'height' 	=> 10,
            'width' 	=> 1,
            'angle' 	=> 0,
            'color' 	=> '000000',
            'text'		=> $code,
            'drawText'  => false
        ];

        $renderer = Barcode::factory('code39', 'image', $config)->draw();

        $file = __DIR__ . '/../resources/img/barcode.jpg';

        imagejpeg($renderer, $file, 100);

        // Recebe o conteúdo e o codifica em base 64
        $image = file_get_contents($file);
        $image = base64_encode($image);

        // Destroi a referencia da imagem e a própria em disco
        imagedestroy($renderer);
        unlink($file);

        return 'data:text/plain;base64,' . $image;
    }
}