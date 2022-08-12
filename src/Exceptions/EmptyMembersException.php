<?php

namespace Igrejanet\Badges\Exceptions;

use Exception;

class EmptyMembersException extends Exception
{
    protected $message = 'Nenhuma pessoa foi definida para geração dos crachás';
}
