<?php

namespace App\Patterns\Creational\FactoryMethod;

interface ISearch
{
    public static function getInstance(): self;

    public function getLink(): string;
}