<?php

namespace Igrejanet\Badges\Person;

class Company
{
    public function __construct(
        public readonly string $logo,
        public readonly string $type,
        public readonly array $companyInfo,
        public readonly array $cardInfo
    ) {
    }
}
