<?php

    namespace Igrejanet\Badges\Contracts;

    use Knp\Snappy\Pdf;
    use Igrejanet\Badges\Person\Company;

    interface BadgeContract
    {
        public function __construct(Pdf $pdf);

        public function setMembers(MembersContract $members);

        public function setCompany(Company $company);

        public function setOrientation(string $orientation);

        public function withBackPage(bool $withBackPage);

        public function loadCSS($css);

        public function loadView($view = null);

        public function generate();

        public function toPdf();
    }