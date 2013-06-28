<?php

class View {
	private $data = array(
		'params' 	=> array(), 
		'data' 		=> array()
	);

	public function set($key = null, $value = null, $type = 'data') {
		$this->data[$type][$key] = $value;
	}

	public function render() {
		if (isset($this->data['data']) && count($this->data['data']) > 0) {
			extract($this->data['data']);
		}

		if (file_exists(PATH_VIEW . 'Layouts/' . $this->data['params']['layout'] . '.tpl')) {
			include(PATH_VIEW . 'Layouts/' . $this->data['params']['layout'] . '.tpl');
		} else {
			die('View/Layouts/' . $this->data['params']['layout'] . '.tpl не найден!');
		}
	}

	public function content() {
		if (isset($this->data['data']) && count($this->data['data']) > 0) {
			extract($this->data['data']);
		}

		if (file_exists(PATH_VIEW . ucfirst($this->data['params']['controller']) . '/' . $this->data['params']['action'] . '.tpl')) {
			include(PATH_VIEW . ucfirst($this->data['params']['controller']) . '/' . $this->data['params']['action'] . '.tpl');
		} else {
			die('View/' . ucfirst($this->data['params']['controller']) . '/' . $this->data['params']['action'] . '.tpl не найден!');
		}
	}
}