<?php

    use Igrejanet\Badges\Person\Person;
    use PHPUnit\Framework\TestCase;

    class PersonTest extends TestCase
    {
        public function testPersonInstance()
        {
            $name = 'Matheus Lopes';
            $job = 'Analista de Sistemas';
            $regNumber = 8364;
            $photo = 'Matheus.jpg';
            $info = [
                'RG' => 'MG 12.111.111'
            ];

            $person = new Person($name, $job, $regNumber, $photo, $info, false);

            $this->assertInstanceOf(Person::class, $person);
            $this->assertEquals($name, $person->name);
            $this->assertClassHasAttribute('name', Person::class);
        }
    }