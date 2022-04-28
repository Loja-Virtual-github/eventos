<?php

namespace LojaVirtual\Eventos;

class EventPublisher
{
    /**
     * Internal storage of event listeners
     *
     * @var array
     */
    private $listeners = [];

    /**
     * Add a listener
     *
     * @param EventListener $listener
     * @return void
     */
    public function addListener(EventListener $listener)
    {
        $this->listeners[$listener->eventName()][] = $listener;
    }

    /**
     * Returns the current qtd of listeners registered
     *
     * @return int
     */
    public function count()
    {
        return count($this->listeners);
    }

    /**
     * Publish an event to all listeners registered
     *
     * @param EventInterface $event
     * @return void
     */
    public function publish(EventInterface $event)
    {
        foreach ($this->getListenersByEvent($event) as $listener) {
            $listener->process($event);
        }
    }

    /**
     * Return the list of listeners registered for an event name
     *
     * @param EventInterface $event
     * @return array
     */
    private function getListenersByEvent(EventInterface $event)
    {
        return array_key_exists($event->name(), $this->listeners)
            ? $this->listeners[$event->name()]
            : [];
    }
}