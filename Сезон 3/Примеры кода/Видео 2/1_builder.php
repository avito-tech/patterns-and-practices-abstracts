<?php

// Целевой класс
class Product
{
	private readonly string $property;
	// private readonly $anotherProperty;

	public function __construct(ConcreteBuilder $builder)
	{
		$this->property = $builder->getProperty();
		// $this->anotherProperty = $builder->getAnotherProperty();
	}

	public function getter()
	{
		return $this->property;
	}
}


// Строитель
class ConcreteBuilder
{
	private readonly string $property;
	// private readonly $anotherProperty;

	public function setProperty(string $property): ConcreteBuilder
	{
		$this->property = $property;
		return $this;
	}

	public function getProperty(): string
	{
		return $this->property;
	}

	// public function setAnotherProperty(mixed $property): ConcreteBuilder {}
	// public function getAnotherProperty(): mixed { }

	public function build(): Product
	{
	   return new Product($this);
	}
}


// Тестовая функция
function testBuilder()
{
	$property = 'test';

	$builder = (new ConcreteBuilder())
		->setProperty($property);

	$product = $builder->build();

	if ($product->getter() === $property) {
		echo 'test ok' . PHP_EOL;
	} else {
		echo 'test fail' . PHP_EOL;
	}
}


testBuilder();

