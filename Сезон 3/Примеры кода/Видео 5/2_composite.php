<?php

// Компонент
abstract class Component
{
	abstract public function operation();



	public function add(Component $component): self
	{
		throw new RuntimeException();
	}

	public function remove(Component $component): self
	{
		throw new RuntimeException();
	}

	public function getChild(Component $component): self
	{
		throw new RuntimeException();
	}
}


// Листовой элемент
class Leaf extends Component
{
	public function operation()
	{
		// Реализация операций

		return 'Листовой элемент.' . PHP_EOL;
   }
}


// Составной объект
class Composite extends Component
{
	private \SplObjectStorage $elements;

	public function __construct()
	{
		$this->elements = new \SplObjectStorage();
	}

	public function operation()
	{
		$result = 'Составной объект. ';
		foreach ($this->elements as $element) {
			$result .= $element->operation();
		}
		return $result;
	}

	public function add(Component $element): self
	{
		$this->elements->attach($element);
		return $this;
	}

	public function remove(Component $element): self
	{
		$this->elements->detach($element);
		return $this;
	}
}


// Тестовая функция
function testComposite()
{
	$composite1 = (new Composite())
		->add(new Leaf())
		->add(new Leaf());

	$composite2 = (new Composite())
		->add(
			(new Composite())
				->add(new Leaf())
			)
		->add(new Leaf());

	$root = (new Composite())
		->add($composite1)
		->add($composite2);

	echo $root->operation();
}


testComposite();


