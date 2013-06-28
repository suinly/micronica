<?php

class PostsController extends Controller {
	public function index() {
		$posts = $this->Post->find('all', array(
			'limit' => 10
		));
		$this->set('posts', $posts);
	}

	public function view($id = null) {
		if ($id != null) {
			$this->set('post', $this->Post->read($id));
		}
	}

	public function add() {
		if ($this->requestType == 'post') {
			$this->data['user_id'] = $_SESSION['User']['id'];
			$this->Post->create($this->data);
			$this->redirect('/');
		}
	}
}

$posts = new PostsController;