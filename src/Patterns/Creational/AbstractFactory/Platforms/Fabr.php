<?php

namespace App\Patterns\Creational\AbstractFactory\Platforms;

use App\Patterns\Creational\AbstractFactory\Components\Fabr\Link;
use App\Patterns\Creational\AbstractFactory\Components\Fabr\Title;

class Fabr implements IPlatform
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