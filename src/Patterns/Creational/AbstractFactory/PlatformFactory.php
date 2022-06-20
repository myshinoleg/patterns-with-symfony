<?php

namespace App\Patterns\Creational\AbstractFactory;

use App\Patterns\Creational\AbstractFactory\Platforms\Fabr;
use App\Patterns\Creational\AbstractFactory\Platforms\Nep;

class PlatformFactory
{
	public function factory(string $platform)
	{
        return match ($platform) {
            'nep' => new Nep(),
            'fabr' => new Fabr(),
        };
	}
}