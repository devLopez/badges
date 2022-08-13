<?php

use Igrejanet\Badges\Formatters\NameFormatter;

it('It should test ame generation', function ($name, $expected) {
    $value = NameFormatter::generateName($name);

    expect($value)->toBe($expected);
})->with([
    ['Matheus Lopes dos Santos', 'Matheus Lopes'],
    ['Matheus dos Santos', 'Matheus'],
]);
