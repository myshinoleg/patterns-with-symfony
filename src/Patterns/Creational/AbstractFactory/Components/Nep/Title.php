<?php

namespace App\Patterns\Creational\AbstractFactory\Components\Nep;

class Title implements \App\Patterns\Creational\AbstractFactory\Components\ITitle
{
    public static function getTitle(): string
    {
        return 'NEP';
    }
}