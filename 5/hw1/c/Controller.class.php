<?php
/**
 * Абстрактный класс контроллера.
 */
session_start();

abstract class Controller {
	/**
	 * Для вызова того или иного метода.
	 * @param string $method метод переданный в $_GET по имени m=
	 */
	public function request($method) {
		$this->before();
		$this->$method();//$this -> method_index
		$this->render();
	}

	protected abstract function before();

	protected abstract function render();

	/**
	 * @Description: Проверяет используется ли метод POST.
	 */
	protected function isPost() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}
}