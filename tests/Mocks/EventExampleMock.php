<?php

namespace LojaVirtual\Eventos\Tests\Mocks;

use LojaVirtual\Eventos\EventInterface;

class EventExampleMock implements EventInterface
{
    /**
     * @var string
     */
    const EVENT_NAME = 'example.mock';

    /**
     * @return string
     */
    public function name()
    {
        return self::EVENT_NAME;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function moment()
    {
        return new \DateTimeImmutable();
    }
}