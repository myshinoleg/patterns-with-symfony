<?php

namespace App\Patterns\Behavioral\Observer\Consumers;

use SplSubject;

class Multiplication implements \SplObserver
{
    public function __construct(SplSubject $notifier)
    {
        $notifier->attach($this);
    }

    public function update(SplSubject $subject)
    {
        $result = 0;

        foreach ($subject->getArguments() as $argument)
        {
            $result*=$argument;
        }

        echo $result;
    }
}