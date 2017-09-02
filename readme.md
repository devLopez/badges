[![Build Status](https://travis-ci.org/devLopez/badges.svg?branch=master)](https://travis-ci.org/devLopez/badges)

# Igrejanet Badges

O Package Igrejanet Badges é responsável pela geração de crachás
e carteirinhas diversas.

## Instalação

Para instalação, utilize o composer:

```sh
$ composer require igrejanet/badges
```

Note: O pacote vem preparado para uso com o Laravel 5.5. Sendo assim, não é necessário registrar o *Service Provider*

## Utilização

Para utilizar o pacote voçê pode fazer da seguinte forma:

#### *Framework Agnostic*

```php
<?php
require_once './vendor/autoload.php';

use Igrejanet\Badges\Badge;
use Igrejanet\Badges\MemberFactory;
use Igrejanet\Badges\Person\Company;
use Knp\Snappy\Pdf;

// Você pode setar uma localização diferente para o gerador
// mas o mesmo já vem listado como dependência no composer
$pdf = new Pdf(__DIR__ . './vendor/bin/wkhtmltopdf-amd64');

// Dados da Empresa
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

$company = new Company($logo, $type, $companyInfo, $cardInfo);

// Dados dos usuarios
$foto       = __DIR__.'/img/matheus.jpg';
$members    = MemberFactory::createMembers();

$members->add('Matheus', 'Analista', 8364, $foto, ['RG' => 'MG 11.111.111']);
$members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'DBA']);

// Gera as carteirinhas
$badge      = new Badge($pdf);
$response   = $badge->setMembers($members)
                    ->setCompany($company)
                    ->generate();

$response->send();
```

#### *Com Laravel*

Para uso com Laravel, você deve definir a localização do
arquivo gerador no arquivo `.env` com a variável `WKHTMLTOPDF_LOCATION`.

Feito isto, basta o seguinte:
```php
<?php

use Igrejanet\Badges\Contracts\BadgeContract as Badges;
use Igrejanet\Badges\Contracts\MembersContract as Members;
use Igrejanet\Badges\Person\Company;

class UserController extends Controller
{
    protected $badges;
    
    protected $members;
    
    public function __construct(Badges $badges, Members $members)
    {
        $this->badges   = $badges;
        $this->members  = $members;
    }
    
    public function genBadges()
    {
        $foto ='img/matheus.jpg';
        $this->members->add('Matheus', 'Analista', 8364, $foto, ['RG' => 'MG 11.111.111']);
        $this->members->add('Lopes', 'DBA', 8399, $foto, ['RG' => 'MG 14.131.121', 'CPF' => '101.384.146-88', 'Cargo' => 'DBA']);
        
        $logo = 'img/logo.png';
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
        
        $company = new Company($logo, $type, $companyInfo, $cardInfo);
        
        return $this->badges
                    ->setMembers($this->members)
                    ->setCompany($company)
                    ->generate();
    }
}
```

As duas opções retornam um arquivo PDF.Você pode conferir os exemplos de uso
disponíveis no diretório `examples`. Para executar os exemplos
execute: 
```sh
$ php -S 127.0.0.1:8000 -t examples
```