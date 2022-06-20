<?php

namespace App\Patterns\Behavioral\Iterator;

class Collection implements \IteratorAggregate
{
	private array $items = [];

	public function addItem($item)
	{
		$this->items[] = $item;
	}

	public function getItems()
	{
		return $this->items;
	}

	public function getIterator()
	{
		return new Iterator($this);
	}
}