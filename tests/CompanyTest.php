<?php

    use PHPUnit\Framework\TestCase;
    use Igrejanet\Badges\Person\Company;

    class CompanyTest extends TestCase
    {
        public function testInstance()
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

            $company = new Company($logo, $type, $companyInfo, $cardInfo);
            
            $this->assertInstanceOf(Company::class, $company);
            $this->assertEquals($type, $company->type);
            $this->assertEquals($companyInfo, $company->companyInfo);
            $this->assertEquals($cardInfo, $company->cardInfo);
        }
    }