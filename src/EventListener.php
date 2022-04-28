<?php

namespace LojaVirtual\Eventos;

abstract class EventListener
{
    /**
     * Process an event
     *
     * @param EventInterface $event
     * @return void
     */
    public function process(EventInterface $event)
    {
        if ($this->know($event)) {
            $this->dispatch($event);
        }
    }

    /**
     * Tell if the event can bem dispatched
     *
     * @param EventInterface $event
     * @return mixed
     */
    abstract public function know(EventInterface $event);

    /**
     * Dispatch an event
     *
     * @param EventInterface $event
     * @return mixed
     */
    abstract public function dispatch(EventInterface $event);

    /**
     * Return the event name that this Listener can deal with
     *
     * @return string
     */
    abstract public function eventName();
}