<?php

namespace App\Patterns\Behavioral\Strategy\Trades;

class Buy implements ITrade
{
	public function getTradeList(): string
	{
		return 'https://www.fabrikant.ru/trades/procedure/search/?type=0';
	}
}