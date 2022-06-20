<?php

namespace App\Patterns\Creational\Builder;

interface IBuilder
{
    public function createHeader($content): self;

    public function createBody($content): self;

    public function createBottom($content): self;

	public function getContent();
}