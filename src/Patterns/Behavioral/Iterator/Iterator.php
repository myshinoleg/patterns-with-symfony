<?php

namespace App\Patterns\Behavioral\Iterator;

class Iterator implements \Iterator
{
	private $collection;

	private int $position = 0;

	private $reverse = false;

	public function __construct($collection, $reverse = false)
	{
		$this->collection = $collection;
		$this->reverse = $reverse;
	}

	public function current()
	{
		return $this->collection->getItems()[$this->position];
	}

	public function next()
	{
		$this->position++;
	}

	public function key()
	{
		return $this->position;
	}

	public function valid()
	{
		return isset($this->collection->getItems()[$this->position]);
	}

	public function rewind()
	{
		$this->position = $this->reverse ?
			count($this->collection->getItems()) - 1 : 0;
	}
}
