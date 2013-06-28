<?php

class Model {
	public $mysqli = false;	// mysql link
	public $fields = array('id');
	public $data;

	/**
	 * Constructor method
	 */
	function __construct() {
		$this->mysqli =  @new mysqli(
			Config::get('DB_HOST'), 
			Config::get('DB_USER'), 
			Config::get('DB_PASS'), 
			Config::get('DB_NAME')
		);

		if ($this->mysqli->connect_errno) {
			die($this->mysqli->connect_error);
		}

		$this->mysqli->set_charset(Config::get('DB_CHARSET'));
	}

	/**
	 * Destructor method
	 */
	function __destruct() {
		if ($this->mysqli->connect_errno == 0) {
			$this->mysqli->close();
		}
	}


	/**
	 * Query method
	 */
	public function query($query = null, $resultmode = null) {
		if ($query != null) {
			if ($result = $this->mysqli->query($query, $resultmode)) {
				return $result;
			} else {
				die ($this->mysqli->error);
			}
		} else {
			return false;
		}
	}


	/**
	 * Read object from DB by id
	 */
	public function read($id = null) {
		if ($id != null) {
			return $this->query("SELECT * FROM " . $this->table . " WHERE id = " . $id . " LIMIT 1;")
						->fetch_assoc();
		} else {
			return false;
		}
	}

	/**
	 * Find object from DB
	 */
	public function find($type = 'all', $options = array()) {
		$result = array();

		switch ($type) {
			case 'all':
				$query = "SELECT " . implode(',', $this->fields) . " FROM " . $this->table;
				if (isset($options) && $options['limit']) {
					$query .= " LIMIT " . $options['limit'];
				}

				$res = $this->query($query);
				while ($row = $res->fetch_assoc()) {
					$result[] = $row;
				}
				break;
		}

		return $result;
	}

	/**
	 * Create object
	 */
	public function create($data = null) {
		if ($data != null) {
			if (!isset($data['create'])) {
				$data['created'] = date("Y-m-d H:i:s");
			}

			foreach ($data as $key => $val) {
				$data[$key] = inQuoutes("'", $val);
			}

			$query = "INSERT INTO " . $this->table . " (" . implode(',', array_keys($data)) . ") VALUES(" . implode(',', $data) . ");";
			debug($query);
			$this->query($query);
		}
	}
}