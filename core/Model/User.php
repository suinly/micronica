<?php

class User extends Model {
	public $table = 'users';
	public $fields = array(
		'id',
		'username',
		'created'
	);
}