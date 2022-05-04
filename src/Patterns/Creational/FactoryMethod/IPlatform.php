<?php

namespace App\Patterns\Creational\FactoryMethod;

interface IPlatform
{
    public static function getInstance(): self;

    public function getSearchPlatform(): ISearch;
}