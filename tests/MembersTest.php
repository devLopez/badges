<?php

use Igrejanet\Badges\Contracts\MembersContract;
use Igrejanet\Badges\Person\Members;
use Igrejanet\Badges\Person\Person;
use Illuminate\Support\Collection;

it('should test instance', function () {
    $members = new Members();

    expect($members)
        ->toBeInstanceOf(MembersContract::class)
        ->and($members->retrieve())
        ->toBeInstanceOf(Collection::class);
});

it('should add person on members', function ($nome, $cargo, $registro, $foto, $info) {
    $person = new Person($nome, $cargo, $registro, $foto, $info, false);

    $members = new Members();
    $members->add($person);

    expect($members->retrieve())
        ->toBeInstanceOf(Collection::class)
        ->and($members->retrieve()->first())
        ->toBeInstanceOf(Person::class)
        ->and($members->retrieve()->first()->name)
        ->toBe($nome);
})->with([
    ['Matheus', 'Analista', 8364, 'matheus.jpg', ['RG' => 'MG 11.111.111']],
    ['Lopes', 'DBA', 8367, 'loeps.jpg', ['RG' => 'MG 14.131.121']],
]);
