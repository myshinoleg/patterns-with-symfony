<?php

namespace App\Patterns\Behavioral\Strategy\Trades;

class Sale implements ITrade
{
	public function getTradeList(): string
	{
		return 'https://www.fabrikant.ru/trades/procedure/search/?type=1';
	}
}