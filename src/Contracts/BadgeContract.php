<?php

    namespace Igrejanet\Badges\Contracts;

    use Illuminate\Http\Response;
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

        public function loadCSS(string $css);

        public function loadView(string $view = null);

        public function generate() : Response;

        public function toPdf() : Response;
    }