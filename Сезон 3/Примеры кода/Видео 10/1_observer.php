<?php

// Интерфейс Субъекта
interface ISubject
{
    public function attach(IObserver $observer);

    public function detach(IObserver $observer);

    public function notify();
}


// Субъект
class ConcreteSubject implements ISubject 
{
    private \SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(IObserver $observer): self
    {
        $this->observers->attach($observer);
        return $this;
    }

    public function detach(IObserver $observer): self
    {
        $this->observers->detach($observer);
        return $this;
    }

    public function notify(): self
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
        return $this;
    }
}


// Интерфейс наблюдателя
interface IObserver
{
    public function update();
}


// Наблюдатель
class ConcreteObserver implements IObserver
{
    public function update()
    {
        echo 'Обрабатываем событие.' . PHP_EOL;
    }
}


// Другой наблюдатель
class AnotherConcreteObserver implements IObserver
{
    public function update()
    {
        echo 'Обрабатываем другое событие.' . PHP_EOL;
    }
}


// Тестовая функция
function testObserver()
{
    $observer = new ConcreteObserver();
    $anotherObserver = new AnotherConcreteObserver();

    $concreteSubject = new ConcreteSubject();
    $concreteSubject->attach($observer);
    $concreteSubject->attach($anotherObserver);

    $concreteSubject->notify();
}


testObserver();

