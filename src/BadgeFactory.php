<?php

    namespace Igrejanet\Badges;

    use Igrejanet\Badges\Badge\Badge;
    use Igrejanet\Badges\Contracts\MembersContract;
    use Igrejanet\Badges\Person\Company;
    use Knp\Snappy\Pdf;

    /**
     * BadgeFactory
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 1.1.0
     * @since   23/08/2017
     * @package Igrejanet\Badges
     */
    class BadgeFactory
    {
        /**
         * @param   MembersContract  $members
         * @param   Company  $company
         * @param   string  $orientation
         * @param   bool  $withBackPage
         * @return  Badge
         */
        public static function createBadge(
            MembersContract $members,
            Company $company,
            $orientation = 'landscape',
            $withBackPage = true
        ) : Badge {
            $pdf = new Pdf('/usr/local/bin/wkhtmltopdf');

            $pdf->setOptions([
                'margin-left' => 1,
                'margin-right' => 1,
                'margin-top' => 3,
                'margin-bottom' => 3
            ]);

            return new Badge($members, $company,$pdf, $orientation, $withBackPage);
        }
    }