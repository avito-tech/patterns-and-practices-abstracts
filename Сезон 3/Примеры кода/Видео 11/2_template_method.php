<?php

// Абстрактный класс
abstract class AbstractClass
{
    final public function templateMethod()
    {
        $this->operation1();
        $this->operation2();
        $this->operation3();
        $this->operation4();
    }

    protected function operation1()
    {
        echo 'Операция 1. Может быть переопределена.' . PHP_EOL;
    }

    abstract protected function operation2();

    protected function operation3()
    {
        return true;
    }

    private function operation4()
    {
        echo 'Операция 4. Нельзя переопределить.' . PHP_EOL;
    }
}


// Конкретный класс
class ConcreteClass extends AbstractClass
{
    protected function operation1()
    {
        echo 'Новая операция 1' . PHP_EOL;
    }

    protected function operation2()
    {
        echo 'Новая операция 2' . PHP_EOL;
    }

    protected function operation3()
    {
        echo 'Новая операция 3' . PHP_EOL;
    }
}


// Тестовая функция
function testTemplateMethod()
{
    (new ConcreteClass())->templateMethod();

    // (new AnotherConcreteClass())->templateMethod();
}


testTemplateMethod();

