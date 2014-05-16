<?php

class Attachment extends Model {
	public $table = 'attachments';
	public $fields = array(
		'id',
		'post_id',
		'type',
		'content',
		'created'
	);

	public function uploadImages($data, $post_id = null) {
		foreach ($data['images']['tmp_name'] as $key => $file) {
			switch ($data['images']['type'][$key]) {
		                case 'image/jpeg':
		                    $filetype = '.jpg';
		                    break;
		                case 'image/png':
		                    $filetype = '.png';
		                    break;
		        }
			$file_name = md5($file . date("Y-m-d_H-i-s")) . $filetype;
			$file_path = Config::get('UPLOAD_IMAGES_DIR') . $file_name;
			if (move_uploaded_file($file, $file_path)) {
				$this->create(array(
					'post_id' 	=> $post_id,
					'type' 		=> 'image',
					'content' 	=> $file_name
				));
			}
		}
	}
}
