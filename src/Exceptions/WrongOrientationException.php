<?php

    namespace Igrejanet\Badges\Exceptions;

    use Exception;

    /**
     * WrongOrientationException
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.0.0
     * @since   20/08/2017
     * @package Igrejanet\Badges\Exceptions
     */
    class WrongOrientationException extends Exception
    {
        /**
         * @var string
         */
        protected $message = 'A orientação definida para o cartão é inválida';
    }