<?php

namespace App\Patterns\Creational\FactoryMethod\PlatformSearch;

use App\Patterns\Creational\FactoryMethod\ISearch;

class FabrSearch implements ISearch
{
    private static $instance;

    private function __construct() {}

    public static function getInstance(): ISearch
    {
        if (!self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getLink(): string
    {
        return 'https://www.fabrikant.ru/trades/procedure/search/';
    }
}