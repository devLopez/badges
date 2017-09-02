<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\BarcodeFactory;

/**
 * Person
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.1
 * @since   30/08/2017
 * @package Igrejanet\Badges\Person
 */
class Person
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $job;

    /**
     * @var int|null
     */
    public $regNumber;

    /**
     * @var null|string
     */
    public $photo;

    /**
     * @var array
     */
    public $userInfo;

    /**
     * @var
     */
    public $barCode = '';

    /**
     * @param   string $name
     * @param   string $job
     * @param   int|null $regNumber
     * @param   string|null $photo
     * @param   array $userInfo
     * @param   bool  $barcode
     */
    public function __construct($name, $job, $regNumber, $photo = null, array $userInfo = [], $barcode = true)
    {
        $this->name         = $name;
        $this->job          = $job;
        $this->regNumber    = $regNumber;
        $this->photo        = $photo;
        $this->userInfo     = $userInfo;

        if($barcode) {
            $this->barCode = BarcodeFactory::generate($regNumber);
        }
    }
}