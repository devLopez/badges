<?php

    namespace Igrejanet\Badges\Contracts;

    use Igrejanet\Badges\Person\Person;
    use Illuminate\Support\Collection;

    interface MembersContract
    {
        public function add(Person $person);

        public function retrieve(): Collection;
    }
