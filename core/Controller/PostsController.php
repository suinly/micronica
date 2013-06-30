<?php

class PostsController extends Controller {
	public function index() {
		$posts = $this->Post->find('all', array(
			'limit' => 50,
			'order' => 'created DESC'
		));

		$this->loadModel('Attachment');

		foreach ($posts as $key => $val) {
			$attachments = $this->Attachment->find('all', array(
				'conditions' => array('post_id' => $val['id']),
				'order' => 'created DESC'
			));
			$posts[$key]['attachments'] = $attachments;
		}

		$this->set('posts', $posts);;
	}

	public function view($id = null) {
		if ($id != null) {
			$post = $this->Post->read($id);
			$this->loadModel('Attachment');
			$attachments = $this->Attachment->find('all', array(
				'conditions' => array('post_id' => $id),
				'order' => 'created DESC'
			));

			if ($post) {
				$this->set('post', $post);
				$this->set('attachments', $attachments);
			} else {
				$this->set('post', array('content' => 'Не найдено'));
			}
		}
	}

	public function add() {
		if ($this->requestType == 'post') {
			$this->data['user_id'] = $_SESSION['User']['id'];
			if ($this->Post->create($this->data)) {
				if (isset($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
					$this->loadModel('Attachment');
					$this->Attachment->uploadImages($_FILES, $this->Post->id);
				}
				$this->redirect('/posts/view/' . $this->Post->id);
			}
		}
	}

	public function edit($id = null) {
		if ($this->requestType == 'post') {
			$this->Post->update($id, $this->data);
		} 
		if ($id != null) {
			$post = $this->Post->read($id);
			$this->set('post', $post);
		}
	}

	public function form($type = null) {
		switch($type) {
			case 'image':
				$this->layout = 'ajax';
				$this->action = 'form.image';
				break;
		}
	}


}

$posts = new PostsController;