<?php

    use Igrejanet\Badges\Factories\MemberFactory;
    use Igrejanet\Badges\Contracts\MembersContract;
    use Igrejanet\Badges\Person\Person;
    use PHPUnit\Framework\TestCase;

    class MembersTest extends TestCase
    {
        public function testInstance()
        {
            $members = MemberFactory::createMembers();

            $this->assertInstanceOf(MembersContract::class, $members);
        }

        public function testAddMembers()
        {
            $members = MemberFactory::createMembers();

            $members->add('Matheus', 'Analista', 8364, 'matheus.jpg', ['RG' => 'MG 11.111.111'], false);
            $members->add('Lopes', 'DBA', 8367, 'loeps.jpg', ['RG' => 'MG 14.131.121'], false);

            $filledMember = $members->retrieve()->first();

            $this->assertEquals('Matheus', $filledMember->name);
            $this->assertInstanceOf(Person::class, $filledMember);
        }
    }