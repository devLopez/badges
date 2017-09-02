<?php

namespace Igrejanet\Badges;

use Illuminate\Support\Collection;
use Igrejanet\Badges\Person\Members;

/**
 * MemberFactory
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.1.0
 * @since   02/09/2017
 * @package Igrejanet\Badges
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