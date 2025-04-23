<?php

// Создатель. Конкретный класс с фабричным методом
abstract class Creator
{
	public function AnOperation()
	{
		// …код…

		$class = $this->factoryMethod();
		$class();

		// …код…
	}

	abstract protected function factoryMethod();

	// abstract protected function anotherFactoryMethod();
}


// Конкретный создатель. Переопределяет создателя
class ConcreteCreator extends Creator
{
	protected function factoryMethod()
	{
		return new ConcreteProduct();
	}

	// protected function anotherFactoryMethod() { }
}


// Другой конкретный создатель. Тоже переопределяет создателя
class AnotherConcreteCreator extends Creator
{
	protected function factoryMethod()
	{
		return new AnotherConcreteProduct();
	}
}


// Целевой класс
class ConcreteProduct
{
	public function __invoke()
	{
		echo __CLASS__ . PHP_EOL;
	}
}


// Другой целевой класс
class AnotherConcreteProduct
{
	public function __invoke()
	{
		echo __CLASS__ . PHP_EOL;
	}
}


// Тестовая функция
function testFactoryMethod()
{
	$product = (new ConcreteCreator())->AnOperation();
	// $product = (new AnotherConcreteCreator())->AnOperation();

	// some asserts
}


testFactoryMethod();

