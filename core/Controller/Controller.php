<?php

class Controller {
	static $controller;
	static $action;
	public $layout = 'default';
	public $requestType;
	static $access = array(
		'posts' => array('index', 'view'),
		'users' => array('login', 'logout')
	);

	function __construct() {
		$this->View = new View;

		if (isset($_POST) && !empty($_POST)) {
			$this->data = $_POST;
			$this->requestType = 'post';
		}
	}

	function __destruct() {
		$this->set('controller', $this->controller, 'params');
		$this->set('action', $this->action, 'params');
		$this->set('layout', $this->layout, 'params');

		$this->View->render();
	}

	protected function set($key = null, $value = null, $type = 'data') {
		$this->View->set($key, $value, $type);
	}

	public function redirect($url = null) {
		if ($url != null) {
			header("Location: " . $url);
		}
	}
}