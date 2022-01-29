<?php
namespace App\Patterns\Behavioral\Strategy;

use App\Patterns\Behavioral\Strategy\Trades\Buy;
use App\Patterns\Behavioral\Strategy\Trades\Sale;

class TradeFactory
{
	private string $tradeType = '';

	public function setTradeType($tradeType): static
	{
		$this->tradeType = $tradeType;
		return $this;
	}

	public function getTradeMethod(): string
	{
		return match ($this->tradeType) {
			TradeType::TYPE_BUY => Buy::class,
			TradeType::TYPE_SALE => Sale::class,
		};
	}
}
