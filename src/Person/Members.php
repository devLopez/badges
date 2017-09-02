<?php

namespace Igrejanet\Badges\Person;

use Igrejanet\Badges\Contracts\MembersContract;
use Illuminate\Support\Collection;

/**
 * Members
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 1.1.0
 * @since   02/09/2017
 * @package Igrejanet\Badges
 */
class Members implements MembersContract
{
    /**
     * @var Collection
     */
    protected $members;

    /**
     * @param   Collection  $members
     */
    public function __construct(Collection $members)
    {
        $this->members = $members;
    }

    /**
     * @param   string $name
     * @param   string $job
     * @param   int $regNumber
     * @param   string|null $photo
     * @param   array $userInfo
     * @param   bool  $barcode
     */
    public function add($name, $job, $regNumber, $photo = null, array $userInfo = [], $barcode = true)
    {
        $this->members->push(
            new Person($name, $job, $regNumber, $photo, $userInfo, $barcode)
        );
    }

    /**
     * @return  Collection
     */
    public function retrieve() : Collection
    {
        return $this->members;
    }
}