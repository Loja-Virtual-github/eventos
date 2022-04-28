<?php

namespace LojaVirtual\Eventos;

abstract class EventListener
{
    /**
     * @var string
     */
    protected $event_name = '';

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
    public function know(EventInterface $event)
    {
        return ($event->name() === $this->eventName());
    }

    /**
     * Return the event name that this Listener can deal with
     *
     * @return string
     */
    public function eventName()
    {
        return $this->event_name;
    }

    /**
     * Dispatch an event
     *
     * @param EventInterface $event
     * @return mixed
     */
    abstract public function dispatch(EventInterface $event);
}