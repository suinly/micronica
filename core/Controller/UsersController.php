<?php

class UsersController extends Controller {
	public function index() {
		$this->set('users', $this->User->find('all', array(
			'limit' => 10
		)));
	}

	public function add() {
		if ($this->requestType == 'post') {
			$this->data['password'] = password($this->data['password']);
			$this->User->create($this->data);
		}
	}

	public function login() {
		
	}
}

$users = new UsersController;