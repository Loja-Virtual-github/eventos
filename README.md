# lojavirtual/eventos

Biblioteca que gerencia o registro de listeners e publishers em eventos no PHP.

## Como utilizar

Para utilizar esta lib, vc precisa criar um Listener e um Evento.
O listener será o responsável por cuidar da regra que será disparada quando um evento for publicado e o Evento é o identificador de quando esse listener vai ser executado.

O Listener deverá seguir o exemplo abaixo: 

```php
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
```

A constante **EVENT_NAME** funciona como idenficador para o exemplo. Note que o listener extende da abstração EventListener.

Já a classe de evento deverá seguir o seguinte padrão:
```php
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
```

Note também que agora a classe Evento implementa a interface EventInterface e possui também uma constante **EVENT_NAME** que vincula o evento ao listener.

### Publicador de ventos
Na sua aplicação você deverá instanciar o publicador de eventos, que funciona de maneira semelhante a um container de injeção de dependências.

```php
use LojaVirtual\Eventos\EventPublisher;

$eventPublisher = new EventPublisher();
$eventPublisher->addListener(new EventListenerTest());
$eventPublisher->addListener(new EventListenerTest2());
$eventPublisher->addListener(new EventListenerTest3());

```

Assim você poderá **Injetar** o EventPublisher dentro das classes que irão disparar esses eventos. Dessa forma, bastará você invocar o método publish do publicador de eventos e o mesmo iniciará uma cadeia de execuções de todos listeners registrados na aplicação.

```php
public function cadastrarCliente(EventPublisher $publisher)
{
    ...
    $evento = new ClienteCadastrado();
    $publisher->publish($evento);
}

```

### Aproveite ;)