<?php

use Igrejanet\Badges\Formatters\NameFormatter;
use PHPUnit\Framework\TestCase;

class NameFormatterTest extends TestCase
{
    public function testInstance()
    {
        $formatter = new NameFormatter();

        $this->assertInstanceOf(NameFormatter::class, $formatter);
    }

    public function testNameGeneration()
    {
        $formatter = (new NameFormatter())->generateName('Matheus Lopes dos Santos');

        $this->assertEquals('Matheus Lopes', $formatter);
    }
}
