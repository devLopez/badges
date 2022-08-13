<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Contracts\MembersContract;
use Illuminate\Support\Collection;

class Members implements MembersContract
{
    protected Collection $members;

    public function __construct()
    {
        $this->members = collect();
    }

    public function add(Person $person)
    {
        $this->members->push(
            $person
        );
    }

    public function retrieve(): Collection
    {
        return $this->members;
    }
}
