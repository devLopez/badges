<?php

    namespace Igrejanet\Badges\Contracts;

    use Illuminate\Support\Collection;

    interface MembersContract
    {
        public function __construct(Collection $members);

        public function add($name, $job, $regNumber, $photo = null, array $userInfo = [], $barcode = true);

        public function retrieve();
    }