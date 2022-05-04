<?php

namespace App\Patterns\Behavioral\Observer;

use JetBrains\PhpStorm\Pure;
use SplObserver;

class Notifier implements \SplSubject
{
    protected \SplObjectStorage $subscribeStorage;

    protected array $arguments;

    #[Pure] public function __construct()
    {
        $this->subscribeStorage = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->subscribeStorage->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->subscribeStorage->detach($observer);
    }

    public function notify()
    {
        foreach ($this->subscribeStorage as $obj)
        {
            $obj->update($this);
        }
    }

    public function calculate(...$arguments)
    {
        $this->arguments = $arguments;
        $this->notify();
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }
}