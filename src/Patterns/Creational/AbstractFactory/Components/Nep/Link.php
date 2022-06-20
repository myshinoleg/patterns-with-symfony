<?php

namespace App\Patterns\Creational\AbstractFactory\Components\Nep;

class Link implements \App\Patterns\Creational\AbstractFactory\Components\ILink
{
    public static function getLink(): string
    {
        return 'https://www.etp-ets.ru/44/catalog/procedure';
    }
}