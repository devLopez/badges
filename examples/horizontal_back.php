<?php

require_once '../vendor/autoload.php';

use Igrejanet\Badges\BadgeFactory;
use Igrejanet\Badges\MemberFactory;
use Igrejanet\Badges\Person\Company;

$foto = __DIR__.'/img/matheus.jpg';

$members = MemberFactory::createMembers();
$members->add('Matheus', 'Analista', 8364, $foto, ['RG' => 'MG 11.111.111']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']);

$logo = __DIR__.'/img/logo.png';
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

$company    = new Company($logo, $type, $companyInfo, $cardInfo);
$badge      = BadgeFactory::createBadge($members, $company);

$response = $badge->generate();
$response->send();
