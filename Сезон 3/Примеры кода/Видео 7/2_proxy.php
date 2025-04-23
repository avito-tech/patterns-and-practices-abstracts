<?php

// Субъект
interface Subject
{
    public function request(): string;
}


// Заместитель
class Proxy implements Subject
{
    public function __construct(private Subject $subject)
    {}

    public function request(): string
    {
        return 'Proxy result: ' . $this->subject->request();
    }
}


// Реальный субъект
class RealSubject implements Subject
{
   public function request(): string
    {
        return 'Real result.' . PHP_EOL;
    }
}


// Тестовая функция
function testProxy()
{
    $realSubject = new RealSubject();
    $proxy = new Proxy($realSubject);
    echo $proxy->request();
}


testProxy();

