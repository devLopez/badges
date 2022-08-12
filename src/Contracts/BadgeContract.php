<?php

namespace Igrejanet\Badges\Contracts;

use Igrejanet\Badges\Person\Company;
use Illuminate\Http\Response;
use Knp\Snappy\Pdf;

interface BadgeContract
{
    public function __construct(Pdf $pdf);

    public function setMembers(MembersContract $members);

    public function setCompany(Company $company);

    public function setOrientation(string $orientation);

    public function withBackPage(bool $withBackPage);

    public function loadCSS(string $css);

    public function loadView(string $view = null);

    public function generate(): Response;

    public function toPdf(): Response;
}
