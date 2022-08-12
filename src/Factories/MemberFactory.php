<?php

namespace Igrejanet\Badges\Factories;

use Igrejanet\Badges\Person\Members;
use Illuminate\Support\Collection;

class MemberFactory
{
    public static function createMembers(): Members
    {
        $collection = new Collection();

        return new Members($collection);
    }
}
