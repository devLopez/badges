<?php

namespace Igrejanet\Badges\Providers;

use Igrejanet\Badges\Badge;
use Igrejanet\Badges\Contracts\BadgeContract;
use Igrejanet\Badges\Contracts\MembersContract;
use Igrejanet\Badges\Person\Members;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Knp\Snappy\Pdf;

/**
 * BadgesServiceProvider
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   02/09/2017
 * @package Igrejanet\Badges\Providers
 */
class BadgesServiceProvider extends ServiceProvider
{
    /**
     * @return  void
     */
    public function boot()
    {

    }

    /**
     * @return  void
     */
    public function register()
    {
        $this->app->bind(BadgeContract::class, function() {
            $binary = env('WKHTMLTOPDF_LOCATION');
            $pdf    = new Pdf($binary);

            return new Badge($pdf);
        });

        $this->app->bind(MembersContract::class, function() {
            $collection = new Collection();

            return new Members($collection);
        });
    }
}
