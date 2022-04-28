<?php

namespace LojaVirtual\Eventos;

interface EventInterface
{

    /**
     * Returns the current moment when the event was dispatched
     *
     * @return \DateTimeImmutable
     */
    public function moment();
}