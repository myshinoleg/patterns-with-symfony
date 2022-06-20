<?php

namespace App\Patterns\Creational\AbstractFactory\Components\Fabr;

class Title implements \App\Patterns\Creational\AbstractFactory\Components\ITitle
{
    public static function getTitle(): string
    {
        return 'Fabrikant';
    }
}