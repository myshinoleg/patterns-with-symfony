<?php

namespace App\Patterns\Creational\AbstractFactory\Platforms;

use App\Patterns\Creational\AbstractFactory\Components\Nep\Link;
use App\Patterns\Creational\AbstractFactory\Components\Nep\Title;

class Nep implements IPlatform
{
    public function getTitle()
    {
        return Title::getTitle();
    }

    public function getLink()
    {
        return Link::getLink();
    }
}