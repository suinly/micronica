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
}

$posts = new PostsController;