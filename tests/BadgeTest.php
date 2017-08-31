<?php

    use Igrejanet\Badges\Badge\Badge;
    use Igrejanet\Badges\BadgeFactory;
    use Igrejanet\Badges\Contracts\BadgeContract;
    use Igrejanet\Badges\MemberFactory;
    use Igrejanet\Badges\Person\Company;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;

    class BadgeTest extends TestCase
    {
        public function testInstanceOfBadges()
        {
            $members = $this->getMembers();
            $company = $this->getCompany();

            $badge = BadgeFactory::createBadge($members, $company);
            $response = $badge->generate();

            $this->assertInstanceOf(Badge::class, $badge);
            $this->assertInstanceOf(BadgeContract::class, $badge);
            $this->assertInstanceOf(Response::class, $response);

        }

        private function getMembers()
        {
            $members = MemberFactory::createMembers();

            $members->add('Matheus', 'Analista', 8364, 'matheus.jpg', ['RG' => 'MG 11.111.111']);
            $members->add('Lopes', 'DBA', 8367, 'loeps.jpg', ['RG' => 'MG 14.131.121']);

            return $members;
        }

        private function getCompany()
        {
            $logo = 'logo.png';
            $type = 'Carteira de Identificação Ministerial';
            $companyInfo = [
                'II Igreja de Deus do Avivamento Bíblico',
                'Rua G, 336 - Vila Campos - Montes Claros - MG',
                'Tel.: (38)4009-5777 - idabmoc@gmail.com.br - http://idabmoc.com'
            ];
            $cardInfo = [
                'Uso exclusivo para identificação ministerial',
                'Esta carteira é pessoal e intransferível',
                'Válida somente enquanto o usuário estiver regularmente registrado'
            ];

            return new Company($logo, $type, $companyInfo, $cardInfo);
        }
    }