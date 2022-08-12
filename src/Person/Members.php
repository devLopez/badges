<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Contracts\MembersContract;
use Illuminate\Support\Collection;

class Members implements MembersContract
{
    public function __construct(protected Collection $members)
    {
    }

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
    ) {
        $this->members->push(
            new Person($name, $job, $regNumber, $photo, $userInfo, $barcode)
        );
    }

    public function retrieve(): Collection
    {
        return $this->members;
    }
}
