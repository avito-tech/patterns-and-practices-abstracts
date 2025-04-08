<?php

class Prototype
{
	public int $val;
}


// Создаём объект и задаём значение
$prototype = new Prototype();
$prototype->val = 10 . PHP_EOL;


// Обычное присваивание
$notPrototype = $prototype;
// Присваивание через клонирование
$clonedPrototype = clone $prototype;
echo $notPrototype->val . PHP_EOL;	// 10
echo $clonedPrototype->val . PHP_EOL; // 10


$prototype->val = 99;
echo $notPrototype->val . PHP_EOL;	// 99
echo $clonedPrototype->val . PHP_EOL; // 10
