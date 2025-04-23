<?php

// Получатель
class Receiver
{
    public function action()
    {
        echo 'Выполнение бизнес-логики класса Receiver.' . PHP_EOL;
    }

    // public function anotherOperation() { }
}


// Другой получатель
class AnotherReceiver
{
    public function doSomething()
    {
        echo 'Выполнение бизнес-логики класса AnotherReceiver.' . PHP_EOL;
    }

    // public function anotherOperation() { }
}


// Инициатор
class Invoker
{
    public function maker(Command $command)
    {
        // вызывает набор действий для работы с получателем
        $command->execute();
    }

    public function redo(Command $command)
    {
        $command->redo();
    }
}


// Интерфейс команды
interface Command
{
    public function execute();
    public function redo();
    // public function anotherAction();
}


// Команда
class ConcreteCommand implements Command
{
    private Receiver $receiver;

    public function __construct(Receiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->action();
    }

    public function redo()
    {
        echo 'Откат последней операции.' . PHP_EOL;
    }

    // public function anotherAction() { }
}


// Команда для другого получателя
class AnotherConcreteCommand implements Command
{
    private AnotherReceiver $receiver;

    public function __construct(AnotherReceiver $receiver)
    {
        $this->receiver = $receiver;
    }

    public function execute()
    {
        $this->receiver->doSomething();
    }

    public function redo()
    {
        echo 'Откат последней операции.' . PHP_EOL;
    }

    // public function anotherAction() { }
}


// Тестовая функция
function testCommand(Command $concreteCommand)
{
    $invoker = new Invoker();

    $invoker->maker($concreteCommand);
    $invoker->redo($concreteCommand);
}


$receiver = new Receiver();
$concreteCommand = new ConcreteCommand($receiver);
testCommand($concreteCommand);

$anotherReceiver = new AnotherReceiver();
$concreteCommand2 = new AnotherConcreteCommand($anotherReceiver);
testCommand($concreteCommand2);

