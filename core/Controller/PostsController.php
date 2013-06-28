<?php

class PostsController extends Controller {	
	public function index() {
		$this->Post = new Post;
		$posts = $this->Post->find('all', array(
			'limit' => 10
		));
		$this->set('posts', $posts);
	}
}

$posts = new PostsController;