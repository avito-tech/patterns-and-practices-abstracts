<?php

// Клиент
class Client
{
    public function method(ITarget $target)
    {
        // Некоторая бизнес-логика

        $target->request();
    }
}


// Целевой интерфейс
interface ITarget
{
    public function request();

    // public function anotherRequest();
}


// Адаптируемый класс
class Adaptee
{
    public function specialRequest()
    {
        // …код…
        echo 'Вызван метод адаптируемого класса' . PHP_EOL;
    }

    // public function anotherSpecialRequest() {} 
}


// Адаптер
class Adapter implements ITarget
{
    private Adaptee $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request()
    {
        // по надобности производятся дополнительные действия

        $this->adaptee->specialRequest();
    }

    // public function anotherRequest() {}
}


// Тестовая функция
function testAdapter()
{
    $adapter = new Adapter(new Adaptee());

    (new Client())->method($adapter);
}


testAdapter();

