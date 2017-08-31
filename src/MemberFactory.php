<?php

    namespace Igrejanet\Badges;

    use Illuminate\Support\Collection;
    use Igrejanet\Badges\Person\Members;

    /**
     * MemberFactory
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.0.1
     * @since   20/08/2017
     * @package Igrejanet\Badges
     */
    class MemberFactory
    {
        /**
         * @return Members
         */
        public static function createMembers()
        {
            $collection = new Collection();

            return new Members($collection);
        }
    }