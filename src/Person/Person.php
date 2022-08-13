<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Factories\BarcodeFactory;
use Igrejanet\Badges\Formatters\NameFormatter;

class Person
{
    public readonly string $shortName;

    public readonly ?string $barcode;

    /**
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        public readonly string $name,
        public readonly string $job,
        public readonly string $regNumber,
        public readonly ?string $photo = null,
        public readonly array $userInfo = [],
        $printBarcode = true
    ) {
        $this->shortName = NameFormatter::generateName($name);

        $this->barcode = $printBarcode
            ? BarcodeFactory::generate($regNumber)
            : null;
    }
}
