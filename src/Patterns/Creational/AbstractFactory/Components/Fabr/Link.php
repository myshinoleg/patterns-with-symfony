<?php

namespace App\Patterns\Creational\AbstractFactory\Components\Fabr;

class Link implements \App\Patterns\Creational\AbstractFactory\Components\ILink
{
    public static function getLink(): string
    {
        return 'https://www.fabrikant.ru/trades/procedure/search/';
    }
}