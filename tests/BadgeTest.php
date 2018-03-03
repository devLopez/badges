<?php

use Igrejanet\Badges\Badge;
use Igrejanet\Badges\Contracts\BadgeContract;
use Igrejanet\Badges\Factories\MemberFactory;
use Igrejanet\Badges\Person\Company;
use Illuminate\Http\Response;
use Knp\Snappy\Pdf;
use PHPUnit\Framework\TestCase;

class BadgeTest extends TestCase
{
    public function testInstanceOfBadges()
    {
        $members = $this->getMembers();
        $company = $this->getCompany();
        $pdf     = $this->getPdfLocation();

        $badge      = new Badge(new Pdf($pdf));
        $response   = $badge->setMembers($members)->setCompany($company)->generate();

        $this->assertInstanceOf(Badge::class, $badge);
        $this->assertInstanceOf(BadgeContract::class, $badge);
        $this->assertInstanceOf(Response::class, $response);
    }

    private function getPdfLocation()
    {
        return __DIR__ . '/../vendor/bin/wkhtmltopdf-amd64';
        //return '/usr/local/bin/wkhtmltopdf';
    }

    private function getMembers()
    {
        $members = MemberFactory::createMembers();

        $members->add('Matheus', 'Analista', 8364, 'matheus.jpg', ['RG' => 'MG 11.111.111'], false);
        $members->add('Lopes', 'DBA', 8367, 'loeps.jpg', ['RG' => 'MG 14.131.121'], false);

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