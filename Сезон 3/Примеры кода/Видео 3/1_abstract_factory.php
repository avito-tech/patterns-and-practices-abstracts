<?php

// Абстрактная фабрика
interface AbstractFactory
{
	public function createProductA(): AbstractProductA;

	public function createProductB(): AbstractProductB;

	// public function createProductC(): AbstractProductC;
}


// Конкретная фабрика 1
class ConcreteFactory1 implements AbstractFactory
{
	public function createProductA(): AbstractProductA
	{
		return new ProductA1();
	}

	public function createProductB(): AbstractProductB
	{
		return new ProductB1();
	}
}


// Конкретная фабрика 2
class ConcreteFactory2 implements AbstractFactory
{
	public function createProductA(): AbstractProductA
	{
		return new ProductA2();
	}

	public function createProductB(): AbstractProductB
	{
		return new ProductB2();
	}
}


// Абстрактный продукт A
interface AbstractProductA
{
	public function someMethod(): void;

	// public function anotherMethod(): void;
}


// Абстрактный продукт B
interface AbstractProductB
{
	public function superMethod(): void;

	// public function anotherMethod();
}


// Конкретный продукт A1
class ProductA1 implements AbstractProductA
{
	public function someMethod(): void
	{
		echo 'реализация A1' . PHP_EOL;
	}
}


// Конкретный продукт A2
class ProductA2 implements AbstractProductA
{
	public function someMethod(): void
	{
		echo 'реализация A2' . PHP_EOL;
	}
}


// Конкретный продукт B1
class ProductB1 implements AbstractProductB
{
	public function superMethod(): void
	{
		echo 'реализация B1' . PHP_EOL;
	}
}


// Конкретный продукт B2
class ProductB2 implements AbstractProductB
{
	public function superMethod(): void
	{
		echo 'реализация B2' . PHP_EOL;
	}
}


// Тестовая функция
function testAbstractFactory(AbstractFactory $factory)
{
	$createProductA = $factory->createProductA();
	$createProductA->someMethod();

	$createProductB = $factory->createProductB();
	$createProductB->superMethod();
}


testAbstractFactory(new ConcreteFactory1());
// testAbstractFactory(new ConcreteFactory2());

