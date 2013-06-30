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

				if (count($options) > 0) {
					if (isset($options['conditions'])) {
						$query .= " WHERE (";
						foreach ($options['conditions'] as $name => $condition) {
							$query .= "`" . $name . "`='" . $condition . "'";
						}
						$query .= ")";
					}

					if (isset($options['order'])) {
						$query .= " ORDER BY " . $options['order'];
					}
					
					if (isset($options['limit'])) {
						$query .= " LIMIT " . $options['limit'];
					}
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
				$data[$key] = inQuoutes("'", h($val));
			}

			$query = "INSERT INTO " . $this->table . " (" . implode(',', array_keys($data)) . ") VALUES(" . implode(',', $data) . ");";
			
			if ($this->query($query) == 1) {
				$result = $this->query('SELECT last_insert_id()')->fetch_assoc();
				$this->id = $result['last_insert_id()'];
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 * Update object
	 */
	public function update($id = null, $data = null) {
		if ($id != null && $data != null) {
			$data_string = "";
			foreach ($data as $key => $val) {
				$data[$key] = inQuoutes("'", h($val));
				$data_string.= "`" . $key . "` = '" . h($val) . "',";
			}
			// remove last comma
			$data_string = mb_substr($data_string, 0, -1);

			$query = "UPDATE " . $this->table . " SET " . $data_string . " WHERE id=" . $id . ";";
			if ($this->query($query) == 1) {
				return true;
			} else {
				return false;
			}
		}
	}
}