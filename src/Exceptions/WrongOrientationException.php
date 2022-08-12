<?php

namespace Igrejanet\Badges\Exceptions;

use Exception;

class WrongOrientationException extends Exception
{
    protected $message = 'A orientação definida para o cartão é inválida';
}
