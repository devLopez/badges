<?php

namespace Igrejanet\Badges\Factories;

use Zend\Barcode\Barcode;

/**
 * BarcodeFactory
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 2.0.0
 * @since   03/03/2018
 * @package Igrejanet\Badges\Factories
 */
class BarcodeFactory
{
    /**
     * @param   string  $code
     * @return  string
     * @throws  \Zend\Barcode\Exception\ExceptionInterface
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

        $file = __DIR__ . '/../../resources/img/barcode.jpg';

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