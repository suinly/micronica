<?php

class Post extends Model {
	public $table = 'posts';
	public $fields = array(
		'id',
		'user_id',
		'post_type_id',
		'content',
		'created'
	);
}