<?php

namespace LojaVirtual\Eventos\Tests;

use LojaVirtual\Eventos\EventPublisher;
use LojaVirtual\Eventos\Tests\Mocks\EventExampleMock;
use LojaVirtual\Eventos\Tests\Mocks\EventListenerMock;

class EventPublisherTest extends BaseTesting
{
    public function testInitialize()
    {
        $eventPublisher = new EventPublisher();
        $this->assertInstanceOf('LojaVirtual\Eventos\EventPublisher', $eventPublisher);
        $this->assertEquals(0, $eventPublisher->count());
    }

    public function testAddListener()
    {
        $eventPublisher = new EventPublisher();
        $eventPublisher->addListener(new EventListenerMock());
        $this->assertEquals(1, $eventPublisher->count());
    }

    public function testPublishListener()
    {
        $eventPublisher = new EventPublisher();
        $eventPublisher->addListener(new EventListenerMock());

        $event = new EventExampleMock();
        ob_start();
        $eventPublisher->publish($event);
        $result = ob_get_contents();
        ob_end_flush();

        $this->assertEquals(
            'Event example.mock was dispatched.',
            $result
        );
    }
}