<?php

    namespace Igrejanet\Badges\Exceptions;

    use Exception;

    /**
     * EmptyMembersException
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.0.0
     * @since   20/08/2017
     * @package Igrejanet\Badges\Exceptions
     */
    class EmptyMembersException extends Exception
    {
        /**
         * @var string
         */
        protected $message = 'Nenhuma pessoa foi definida para geração dos crachás';
    }