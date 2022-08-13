<?php

use Igrejanet\Badges\Person\Company;

it('should test instance info', function () {
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

    $company = new Company($logo, $type, $companyInfo, $cardInfo);

    expect($company)
        ->toBeInstanceOf(Company::class)
        ->and($company->type)->toBe($type)
        ->and($company->companyInfo)->toBe($companyInfo)
        ->and($company->cardInfo)->toBe($cardInfo);
});
