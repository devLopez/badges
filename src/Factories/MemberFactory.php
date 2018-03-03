<?php

namespace Igrejanet\Badges\Factories;

use Illuminate\Support\Collection;
use Igrejanet\Badges\Person\Members;

/**
 * MemberFactory
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 2.0.0
 * @since   03/03/2018
 * @package Igrejanet\Badges\Factories
 */
class MemberFactory
{
    /**
     * @return Members
     */
    public static function createMembers() : Members
    {
        $collection = new Collection();

        return new Members($collection);
    }
}