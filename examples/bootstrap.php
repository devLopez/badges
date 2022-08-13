<?php

require_once '../vendor/autoload.php';

use Igrejanet\Badges\Person\Company;
use Igrejanet\Badges\Person\Members;
use Igrejanet\Badges\Person\Person;
use Knp\Snappy\Pdf;

class Bootstrap
{
    public static function getPdf()
    {
        //return new Pdf('/usr/local/bin/wkhtmltopdf');
        return new Pdf(__DIR__ . '../vendor/bin/wkhtmltopdf-amd64');
    }

    public static function generateCompany()
    {
        $logo = __DIR__ . '/img/logo.png';
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

    public static function generateMembers(): Members
    {
        $foto = __DIR__ . '/img/matheus.jpg';

        $members = new Members();

        foreach([
            new Person('Matheus Lopes Santos', 'Analista', 8364, $foto, ['RG' => 'MG 11.111.111']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono']),
            new Person('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'Diácono'])
        ] as $person) {
            $members->add($person);
        }

        return $members;
    }
}
