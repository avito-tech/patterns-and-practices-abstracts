<?php

// Хозяин
class Originator
{
    private string $state;

    public function setState(string $state): void
    {
        $this->state = $state;
        echo 'Установлено новое состояние ' . $this->state . PHP_EOL;
    }

    public function createMemento(): Memento
    {
        echo 'Сохраняем состояние ' . $this->state . PHP_EOL;
        return new Memento($this->state);
    }

    public function setMemento(Memento $memento): void
    {
        $this->state = $memento->getState();
        echo 'Изменилось состояние на ' . $memento->getState() . PHP_EOL;
    }
}


// Хранитель
class Memento
{
    private string $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function getState(): string
    {
        return $this->state;
    }
}


// Посыльный
class Caretaker
{
    private Originator $originator;
    /** @var Memento[] */
    private array $mementos;

    public function __construct(Originator $originator)
    {
        $this->originator = $originator;
    }

    public function backup(): void
    {
        $this->mementos[] = $this->originator->createMemento();
    }

    public function undo(): void
    {
        if (!count($this->mementos)) {
            return;
        }

        array_pop($this->mementos);
        $memento = end($this->mementos);
        $this->originator->setState($memento->getState());
    }

    public function showStateHistory(): void
    {
        echo 'Выводим историю состояний:' . PHP_EOL;
        foreach ($this->mementos as $key => $memento) {
            echo $key . '. ' . $memento->getState() . PHP_EOL;
        }
    }
}


// Тестовая функция
function testMemento()
{
    $originator = new Originator();
    $caretaker = new Caretaker($originator);

    $originator->setState('first');
    $caretaker->backup();

    echo PHP_EOL;

    $originator->setState('second');
    $caretaker->backup();

    echo PHP_EOL;

    $originator->setState('third');
    $caretaker->backup();

    echo PHP_EOL;

    $caretaker->showStateHistory();

    echo PHP_EOL;

    $caretaker->undo();

    echo PHP_EOL;

    $originator->setState('fourth');
    $caretaker->backup();

    echo PHP_EOL;

    $caretaker->showStateHistory();
}


testMemento();

