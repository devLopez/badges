<?php

namespace Igrejanet\Badges\Providers;

use Igrejanet\Badges\Badge;
use Igrejanet\Badges\Contracts\BadgeContract;
use Igrejanet\Badges\Contracts\MembersContract;
use Igrejanet\Badges\Person\Members;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Knp\Snappy\Pdf;

class BadgesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->app->bind(BadgeContract::class, function () {
            $binary = env('WKHTMLTOPDF_LOCATION');
            $pdf    = new Pdf($binary);

            return new Badge($pdf);
        });

        $this->app->bind(MembersContract::class, function () {
            $collection = new Collection();

            return new Members($collection);
        });
    }
}
