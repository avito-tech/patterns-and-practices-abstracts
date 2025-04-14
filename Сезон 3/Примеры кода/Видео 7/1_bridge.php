<?php

// Абстракция
abstract class Abstraction
{
    public function __construct(protected Implementor $implementor)
    {}

    public function operation(): string
    {
        return 'Abstraction result: ' . $this->implementor->operationImp();
    }
}


// Уточнённая абстракция
class RefinedAbsraction extends Abstraction
{
    public function operation(): string
    {
        return 'RefinedAbsraction result: ' . $this->implementor->operationImp();
    }
}


// Реализатор
interface Implementor
{
    public function operationImp();
}


// Конкретный реализатор A
class ConcreteImplementorA implements Implementor
{
    public function operationImp(): string
    {
        return 'ConcreteImplementorA.' . PHP_EOL;
    }
}


// Конкретный реализатор B
class ConcreteImplementorB implements Implementor
{
    public function operationImp(): string
    {
        return 'ConcreteImplementorB.' . PHP_EOL;
    }
}


// Тестовая функция
function testBridge(Abstraction $abstraction)
{
    echo $abstraction->operation();
}


testBridge(new RefinedAbsraction(new ConcreteImplementorA()));
// testBridge(new RefinedAbsraction(new ConcreteImplementorB()));

