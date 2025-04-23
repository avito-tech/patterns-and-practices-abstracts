<?php

// Создаёт и возвращает инстанс объекта
Singleton::getInstance();
// Только возвращает инстанс объекта без создания
Singleton::getInstance();
// Только возвращает инстанс объекта без создания
Singleton::getInstance();


final class Singleton
{
	private static $instance;

	public static function getInstance(): Singleton
	{
		if (static::$instance === null) {
			static::$instance = new static();
			echo 'объект создан' . PHP_EOL;
		}

		echo 'возвращаем инстанс объекта' . PHP_EOL;
		return static::$instance;
	}

	private function __construct()
	{ /* здесь возможен код */ }

	private function __clone()
	{ /* тело метода пустое */ }

	private function __wakeup()
	{ /* тело метода пустое */ }
}
