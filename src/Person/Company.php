<?php

namespace Igrejanet\Badges\Person;

/**
 * Company
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.0.0
 * @since   23/08/2017
 * @package Igrejanet\Badges\Person
 */
class Company
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $companyInfo;

    /**
     * @var string
     */
    public $cardInfo;

    /**
     * @var string
     */
    public $logo;

    /**
     * @param   string  $logo
     * @param   string  $type
     * @param   array  $companyInfo
     * @param   array  $cardInfo
     */
    public function __construct($logo, $type, array $companyInfo, array $cardInfo)
    {
        $this->type         = $type;
        $this->companyInfo  = $companyInfo;
        $this->cardInfo     = $cardInfo;
        $this->logo         = $logo;
    }
}