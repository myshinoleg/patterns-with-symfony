<?php

namespace App\Patterns\Creational\Builder;

use App\Patterns\Creational\Builder\FormBuilders\FabrBuilder;
use App\Patterns\Creational\Builder\FormBuilders\NepBuilder;

class BuilderFactory
{
	public static function getBuilder($tradeType):IBuilder
	{
		return match ($tradeType) {
			'nep' => new NepBuilder(),
			'fabr' => new FabrBuilder()
		};
	}
}