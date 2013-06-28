<?php

class View {
	private $data = array();

	public function set($key = null, $value = null, $type = 'data') {
		$this->data[$type][$key] = $value;
	}

	public function render() {
		extract($this->data['data']);
		include(PATH_VIEW . 'Layouts/' . $this->data['params']['layout'] . '.tpl');
	}

	public function content() {
		extract($this->data['data']);
		include(PATH_VIEW . ucfirst($this->data['params']['controller']) . '/' . $this->data['params']['action'] . '.tpl');
	}
}