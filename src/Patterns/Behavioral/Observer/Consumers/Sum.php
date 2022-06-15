<?php

namespace App\Patterns\Behavioral\Observer\Consumers;

use SplSubject;

class Sum implements \SplObserver
{
    public function __construct(SplSubject $notifier)
    {
        $notifier->attach($this);
    }

    public function update(SplSubject $subject)
    {
        $sum = 0;

        foreach ($subject->getArguments() as $argument)
        {
            $sum+=$argument;
        }

        echo ' Sum = ' . $sum;
    }
}