<?php

namespace LojaVirtual\Eventos\Tests\Mocks;

use LojaVirtual\Eventos\EventInterface;
use LojaVirtual\Eventos\EventListener;

class EventListenerMock extends EventListener
{
    const EVENT_NAME = 'example.mock';

    /**
     * @param EventInterface $event
     * @return bool
     */
    public function know(EventInterface $event)
    {
        return ($event->name() === $this->eventName());
    }

    /**
     * @param EventInterface $event
     * @return mixed|string
     */
    public function dispatch(EventInterface $event)
    {
        echo sprintf("Event %s was dispatched.", $event->name());
    }

    /**
     * Returns the event name
     *
     * @return string
     */
    public function eventName()
    {
        return self::EVENT_NAME;
    }
}