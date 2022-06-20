<?php

namespace App\Patterns\Creational\Builder\FormBuilders;

class FabrBuilder implements \App\Patterns\Creational\Builder\IBuilder
{
	private $content;

    public function createHeader($content): self
    {
		$this->content .= '<div style="width: 100%; height: 5%; background-color: green">' . $content . '</div>';
		return $this;
    }

    public function createBody($content): self
    {
	    $this->content .= '<div style="width: 100%; height: 50%; background-color: gray">' . $content . '</div>';
		return $this;
    }

    public function createBottom($content): self
    {
		$this->content .= '<div style="width: 100%; height: 5%; background-color: green">' . $content . '</div>';
		return $this;
    }

	public function getContent()
	{
		return $this->content;
	}
}