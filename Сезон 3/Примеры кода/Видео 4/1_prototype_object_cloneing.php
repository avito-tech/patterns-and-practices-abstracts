<?php

class Prototype
{
	public \stdClass $clonedObject;
	public \stdClass $simpleObject;

	public function __clone()
	{
		$this->clonedObject = clone $this->clonedObject;
	}
}


// Создаём объект и задаём значение
$prototype = new Prototype();
$prototype->clonedObject = new \stdClass();
$prototype->clonedObject->val = 1;
$prototype->simpleObject = new \stdClass();
$prototype->simpleObject->val = 2;


// Клонируем объект
$newPrototype = clone $prototype;


// Меняем значение исходного объекта
$prototype->clonedObject->val = 51;
$prototype->simpleObject->val = 52;
echo $newPrototype->clonedObject->val . PHP_EOL; // 1
echo $newPrototype->simpleObject->val . PHP_EOL; // 52