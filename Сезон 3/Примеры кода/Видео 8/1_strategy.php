<?php

// Контекст
class Context
{
    public function someMethod(Strategy $strategy)
    {
        echo 'Контекст. ' . $strategy->algorithm();
    }
}


// Интерфейс стратегии
interface Strategy
{
    public function algorithm();

    // public function anotherAlgorithm();
}


// Стратегия А
class ConcreteStrategyA implements Strategy
{
    public function algorithm()
    {
        return 'Выполнение алгоритма A.' . PHP_EOL;
    }
}


// Стратегия B
class ConcreteStrategyB implements Strategy
{
    public function algorithm()
    {
        return 'Выполнение алгоритма B.' . PHP_EOL;
    }
}


// Стратегия C
class ConcreteStrategyC implements Strategy
{
    public function algorithm()
    {
        return 'Выполнение алгоритма C.' . PHP_EOL;
    }
}


// Тестовая функция
function testStrategy(Strategy $strategy)
{
    $context = new Context();
    $context->someMethod($strategy);
}


testStrategy(new ConcreteStrategyA());
testStrategy(new ConcreteStrategyB());
testStrategy(new ConcreteStrategyC());

