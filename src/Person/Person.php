<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Factories\BarcodeFactory;
use Igrejanet\Badges\Formatters\NameFormatter;

class Person
{
    public string $shortName;

    public string $barcode;

    /**
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        protected string $name,
        protected string $job,
        protected string $regNumber,
        protected ?string $photo = null,
        protected array $userInfo = [],
        $barcode = true
    ) {
        $this->shortName = NameFormatter::generateName($name);

        if ($barcode) {
            $this->barcode = BarcodeFactory::generate($regNumber);
        }
    }
}
