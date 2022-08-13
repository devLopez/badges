<?php

use Igrejanet\Badges\Person\Person;

it('should test person instance', function () {
    $name      = 'Matheus Lopes Santos';
    $job       = 'Analista de Sistemas';
    $regNumber = 8364;
    $photo     = 'Matheus.jpg';
    $info      = [
        'RG' => 'MG 12.111.111',
    ];

    $person = new Person($name, $job, $regNumber, $photo, $info, false);

    expect($person)
        ->toBeInstanceOf(Person::class)
        ->and($person->name)->toBe($name)
        ->and($person->shortName)->toBe('Matheus Lopes')
        ->and($person->barcode)->toBeNull();
});
