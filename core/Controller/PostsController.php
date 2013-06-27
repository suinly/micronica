<?php

class PostsController extends Controller {	
	public function index() {
		echo "Контроллер: " . __CLASS__;
		echo "<br>Метод: " . __METHOD__;
	}
}

$posts = new PostsController;