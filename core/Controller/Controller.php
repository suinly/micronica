<?php

class Controller {
	public $controller;
	public $action;
	public $layout = 'default';

	function __construct() {
		$this->View = new View;
	}

	function __destruct() {

		$this->set('controller', $this->controller, 'params');
		$this->set('action', $this->action, 'params');
		$this->set('layout', $this->layout, 'params');

		$this->View->render();
	}

	protected function set($key = null, $value = null, $type = null) {
		if ($type == null) {
			$this->View->set($key, $value);
		} else {
			$this->View->set($key, $value, $type);
		}
	}
}