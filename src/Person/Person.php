<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Factories\BarcodeFactory;
use Igrejanet\Badges\Formatters\NameFormatter;

/**
 * Person
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.1.0
 * @since   07/09/2017
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
    public $shortName;

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
        $this->shortName    = (new NameFormatter)->generateName($name);
        $this->job          = $job;
        $this->regNumber    = $regNumber;
        $this->photo        = $photo;
        $this->userInfo     = $userInfo;

        if($barcode) {
            $this->barCode = BarcodeFactory::generate($regNumber);
        }
    }
}