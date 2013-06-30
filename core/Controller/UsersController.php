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
		if ($this->requestType == 'post') {
			$user = $this->User->query("SELECT * 
										FROM users 
										WHERE `username`='" . $this->data['username'] . "' 
										AND `password`='" . password($this->data['password']) .  "'");
			if($user->num_rows > 0) {
				$_SESSION['User'] = $user->fetch_assoc();
				$this->redirect('/');
			} else {
				echo "BAD LOGIN OR PASSWORD";
			}
		}
	}

	public function logout() {
		unset($_SESSION['User']);
		$this->redirect('/');
	}
}

$users = new UsersController;