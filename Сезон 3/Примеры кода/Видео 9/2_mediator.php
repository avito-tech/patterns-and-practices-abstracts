<?php

// Посредник
interface Mediator
{
    public function notify(object $sender, string $event): void;
}


// Конкретный посредник
class ConcreteMediator implements Mediator
{
    public function __construct(
        private ConcreteColleague1 $concreteColleague1,
        private ConcreteColleague2 $concreteColleague2
        // private ConcreteColleague3 $concreteColleague3
    ) {
        $this->concreteColleague1->setMediator($this);
        $this->concreteColleague2->setMediator($this);
        // $this->concreteColleague2->setMediator($this);
    }

    public function notify(object $sender, string $event): void
    {
        if ($event === 'prepare') {
            echo 'Сработало событие на отправку данных.' . PHP_EOL;
            $this->concreteColleague1->sendData();
            $this->concreteColleague2->sendEmail();
        }

        if ($event === 'report') {
            echo 'Сработало событие на создание отчёта.' . PHP_EOL;
            $this->concreteColleague1->sendData();
        }

        // if ($event === 'another') {
        //    echo 'Сработало другое событие.' . PHP_EOL;
        //    $this->concreteColleague1->callSomeMethod();
        //    $this->concreteColleague2->callAnotherMethod();
        //}
    }
}


// Базовый класс коллег
abstract class Colleague
{
    protected Mediator $mediator;

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }
}


// Коллега 1
class ConcreteColleague1 extends Colleague
{
    public function prepare(): void
    {
        echo 'Подготовка данных.' . PHP_EOL;
        $this->mediator->notify($this, 'prepare');
    }

    public function sendData(): void
    {
        echo 'Отправка данных.' . PHP_EOL;
        $this->mediator->notify($this, 'sendData');
    }
}


// Коллега 2
class ConcreteColleague2 extends Colleague
{
    public function report(): void
    {
        echo 'Создание отчёта.' . PHP_EOL;
        $this->mediator->notify($this, 'report');
    }

    public function sendEmail(): void
    {
        echo 'Отправка e-mail.' . PHP_EOL;
        $this->mediator->notify($this, 'sendEmail');
    }
}


// Коллега 3 и так далее
// class ConcreteColleague3 extends Colleague { }


// Тестовая функция
function testMediator()
{
    $concreteColleague1 = new ConcreteColleague1();
    $concreteColleague2 = new ConcreteColleague2();
    $concreteMediator = new ConcreteMediator($concreteColleague1, $concreteColleague2);

    $concreteColleague1->prepare();

    echo PHP_EOL;

    $concreteColleague2->report();
}


testMediator();

