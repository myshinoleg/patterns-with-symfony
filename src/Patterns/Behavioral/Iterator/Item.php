<?php

namespace App\Patterns\Behavioral\Iterator;

class Item
{
    private int $num = 0;

    public function __construct($num)
    {
        $this->num = $num;
    }

    public function print()
    {
        return '</br> � ������� � ' . ++$this->num .'. � ���� ����� ���� ���� �������, �� ��� �� ���� ������� ���� </br>';
    }
}
