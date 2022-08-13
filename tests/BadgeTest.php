<?php

use Igrejanet\Badges\Badge;
use Igrejanet\Badges\Contracts\BadgeContract;
use Igrejanet\Badges\Person\Company;
use Igrejanet\Badges\Person\Members;
use Igrejanet\Badges\Person\Person;
use Illuminate\Http\Response;
use Knp\Snappy\Pdf;

function getMembers(): Members
{
    $members = new Members();

    $members->add(
        new Person('Matheus', 'Analista', 8364, 'matheus.jpg', ['RG' => 'MG 11.111.111'], false)
    );

    $members->add(
        new Person('Lopes', 'DBA', 8367, 'loeps.jpg', ['RG' => 'MG 14.131.121'], false)
    );

    return $members;
}

function getCompany(): Company
{
    $logo = 'logo.png';
    $type = 'Carteira de Identificação Ministerial';

    $companyInfo = [
        'II Igreja de Deus do Avivamento Bíblico',
        'Rua G, 336 - Vila Campos - Montes Claros - MG',
        'Tel.: (38)4009-5777 - idabmoc@gmail.com.br - http://idabmoc.com',
    ];

    $cardInfo = [
        'Uso exclusivo para identificação ministerial',
        'Esta carteira é pessoal e intransferível',
        'Válida somente enquanto o usuário estiver regularmente registrado',
    ];

    return new Company($logo, $type, $companyInfo, $cardInfo);
}

function getPdfLocation(): string
{
    return __DIR__ . '/../vendor/bin/wkhtmltopdf-amd64';
}

it('should test instances', function () {
    $members = getMembers();
    $company = getCompany();
    $pdf     = getPdfLocation();

    $badge    = new Badge(new Pdf($pdf));
    $response = $badge->setMembers($members)->setCompany($company)->generate();

    $this->assertInstanceOf(Badge::class, $badge);
    $this->assertInstanceOf(BadgeContract::class, $badge);
    $this->assertInstanceOf(Response::class, $response);
});
