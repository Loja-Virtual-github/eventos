<?php

namespace LojaVirtual\Eventos\Tests\Mocks;

use LojaVirtual\Eventos\EventInterface;
use LojaVirtual\Eventos\EventListener;

class EventListenerMock extends EventListener
{
    /**
     * @var string
     */
    protected $event_name = 'example.mock';

    /**
     * @param EventInterface $event
     * @return mixed|string
     */
    public function dispatch(EventInterface $event)
    {
        echo sprintf("Event %s was dispatched.", $event->name());
    }
}