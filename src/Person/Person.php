<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Factories\BarcodeFactory;
use Igrejanet\Badges\Formatters\NameFormatter;

/**
 * Person
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.2.0
 * @since   03/03/2018
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
     * @param   string  $name
     * @param   string  $job
     * @param   string  $regNumber
     * @param   null|string  $photo
     * @param   array  $userInfo
     * @param   bool  $barcode
     * @throws  \Zend\Barcode\Exception\ExceptionInterface
     */
    public function __construct($name, $job, $regNumber, $photo = null, array $userInfo = [], $barcode = true)
    {
        $this->name         = $name;
        $this->shortName    = NameFormatter::generateName($name);
        $this->job          = $job;
        $this->regNumber    = $regNumber;
        $this->photo        = $photo;
        $this->userInfo     = $userInfo;

        if($barcode) {
            $this->barCode = BarcodeFactory::generate($regNumber);
        }
    }
}