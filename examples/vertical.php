<?php

include './bootstrap.php';

use Igrejanet\Badges\Badge;

$members    = Bootstrap::generateMembers();
$company    = Bootstrap::generateCompany();

$badge      = new Badge(Bootstrap::getPdf());
$response   = $badge->setMembers($members)
                    ->setCompany($company)
                    ->setOrientation('portrait')
                    ->withBackPage(false)
                    ->generate();

$response->send();