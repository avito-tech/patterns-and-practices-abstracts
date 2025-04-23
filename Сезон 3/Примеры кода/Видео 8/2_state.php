<?php

// Контекст
class Context
{
    private State $state;
    // private OtherState $otherState;

    public function __construct()
    {
        $this->state = new ConcreteStateA();
    }

    public function request()
    {
        // …код…
        $this->state->handle($this);
    }

    public function setState(State $state)
    {
        $this->state = $state;
    }
}


// Состояние
interface State
{
    public function handle(Context $context);

    // public function otherHandle(Context $context);
}


// Конкретные состояния A
class ConcreteStateA implements State
{
    public function handle(Context $context)
    {
        echo 'Состояние А.' . PHP_EOL;
        $context->setState(new ConcreteStateB);
    }
}


// Конкретные состояния B
class ConcreteStateB implements State
{
    public function handle(Context $context)
    {
        echo 'Состояние B.' . PHP_EOL;
        $context->setState(new ConcreteStateC);
    }
}


// Конкретные состояния C
class ConcreteStateC implements State
{
    public function handle(Context $context)
    {
        echo 'Состояние C.' . PHP_EOL;
        $context->setState(new ConcreteStateA);
    }
}


// Тестовая функция
function testState()
{
    $context = new Context();
    $context->request();
    $context->request();
    $context->request();
}


testState();

