<?php

namespace Igrejanet\Badges\Person;

class Company
{
    public function __construct(
        protected string $logo,
        protected string $type,
        protected array $companyInfo,
        protected array $cardInfo
    ) {
    }
}
