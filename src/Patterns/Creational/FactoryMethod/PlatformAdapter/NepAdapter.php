<?php

namespace App\Patterns\Creational\FactoryMethod\PlatformAdapter;

use App\Patterns\Creational\FactoryMethod\IPlatform;
use App\Patterns\Creational\FactoryMethod\ISearch;
use App\Patterns\Creational\FactoryMethod\PlatformSearch\NepSearch;

class NepAdapter implements IPlatform
{
    private static $instance;

    private function __construct() {}

    public static function getInstance(): IPlatform
    {
        if (!self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSearchPlatform(): ISearch
    {
        return NepSearch::getInstance();
    }
}