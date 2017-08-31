<?php

    namespace Igrejanet\Badges\Contracts;

    use Knp\Snappy\Pdf;
    use Igrejanet\Badges\Person\Company;

    interface BadgeContract
    {
        public function __construct(
            MembersContract $members,
            Company $company,
            Pdf $pdf,
            $orientation = 'landscape',
            $withBackPage = true
        );

        public function loadCSS($css);

        public function loadView($view = null);

        public function generate();

        public function toPdf();
    }