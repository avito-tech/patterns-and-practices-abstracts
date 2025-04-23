<?php

// Обработчик
abstract class Handler
{
    private ?Handler $next = null;

    public function setNext(Handler $next): self
    {
        $this->next = $next;
        return $next;
    }

    public function handleRequest(string $message): ?string
    {
        if ($this->next !== null) {
            return $this->next->handleRequest($message);
        }

        return null;
    }
}


// Конкретный обработчик 1
class ConcreteHandler1 extends Handler
{
    public function handleRequest(string $message): ?string
    {
        if (strlen($message) < 6) {
            return 'Выполнился обработчик 1' . PHP_EOL;
        }

        return parent::handleRequest($message);
    }
}


// Конкретный обработчик 2
class ConcreteHandler2 extends Handler
{
    public function handleRequest(string $message): ?string
    {
        if (strlen($message) == 6) {
            return 'Выполнился обработчик 2' . PHP_EOL;
        }

        return parent::handleRequest($message);
    }
}


// Конкретный обработчик 3
class ConcreteHandler3 extends Handler
{
    public function handleRequest(string $message): ?string
    {
        if (strlen($message) > 6) {
            return 'Выполнился обработчик 3' . PHP_EOL;
        }

        return parent::handleRequest($message);
    }
}


// Тестовая функция
function testChainOfResponsibility()
{
    $chain1 = (new ConcreteHandler1());
    $chain2 = $chain1->setNext(new ConcreteHandler2());
    $chain3 = $chain2->setNext(new ConcreteHandler3());

    echo $chain1->handleRequest('apple');

    echo PHP_EOL;

    echo $chain1->handleRequest('banana');

    echo PHP_EOL;

    echo $chain1->handleRequest('watermelon');
}


testChainOfResponsibility();

