<?php

    namespace Igrejanet\Badges\Contracts;

    use Illuminate\Support\Collection;

    interface MembersContract
    {
        public function __construct(Collection $members);

        /**
         * @SuppressWarnings(PHPMD)
         */
        public function add(
            string $name,
            string $job,
            string $regNumber,
            ?string $photo = null,
            array $userInfo = [],
            bool $barcode = true
        );

        public function retrieve(): Collection;
    }
