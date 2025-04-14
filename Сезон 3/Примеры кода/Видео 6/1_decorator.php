<?php

// Конкретный компонент
class ConcreteComponent implements Component
{
    public function operation(): string
    {
        return 'Result concrete component.' . PHP_EOL;
    }
}


// Другой конкретный компонент
// class AnotherConcreteComponent implements Component {}


// Компонент
interface Component
{
    public function operation(): string;
}


// Декоратор
abstract class Decorator implements Component
{
    protected Component $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }
}


// Конкретный декоратор А
class ConcreteDecoratorA extends Decorator
{
    public function operation(): string
    {
        return $this->component->operation() . 'Result decorator A.' . PHP_EOL;
    }
}


// Конкретный декоратор B
class ConcreteDecoratorB extends Decorator
{
    public function operation(): string
    {
        return $this->component->operation() . 'Result decorator B.' . PHP_EOL;
    }
}


// Конкретный декоратор C
class ConcreteDecoratorC extends Decorator
{
    public function operation(): string
    {
        return $this->component->operation() . 'Result decorator C.' . PHP_EOL;
    }
}


// Тестовая функция
function testDecorator()
{
    echo (new ConcreteDecoratorC(
        new ConcreteDecoratorB(
            new ConcreteDecoratorA(
                new ConcreteComponent()
            )
        )
    ))->operation();
}


testDecorator();

