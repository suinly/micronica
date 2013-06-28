<?php

class Config {
	private static $cfg = array();

	/**
	 * Set static variable method
	 */
	public static function set($key = null, $value = null) {
		if ($key != null && $value != null) {
			self::$cfg[$key] = $value;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get static variable method
	 */
	public static function get($key = null) {
		if ($key != null) {
			return self::$cfg[$key];
		} else {
			return false;
		}
	}
}