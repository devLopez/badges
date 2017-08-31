<?php

    namespace Igrejanet\Badges\Person;

    use Igrejanet\Badges\BarcodeFactory;

    /**
     * Person
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.0.0
     * @since   17/08/2017
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
        public $barCode;

        /**
         * @param   string  $name
         * @param   string  $job
         * @param   int|null  $regNumber
         * @param   string|null  $photo
         * @param   array  $userInfo
         */
        public function __construct($name, $job, int $regNumber, $photo = null, array $userInfo = [])
        {
            $this->name         = $name;
            $this->job          = $job;
            $this->regNumber    = $regNumber;
            $this->photo        = $photo;
            $this->userInfo     = $userInfo;

            $this->barCode = BarcodeFactory::generate($regNumber);
        }
    }