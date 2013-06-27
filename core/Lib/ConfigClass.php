<?php

class Config {
	/**
	 * Blog title string
	 */
	private static $BLOG_TITLE;

	/**
	 * Routes config
	 * 
	 * index.php?section=DEFAULT_CONTROLLER?action=DEFAULT_ACTION
	 */
	private static $DEFAULT_CONTROLLER;
	private static $DEFAULT_ACTION;

	/**
	 * Set static variable method
	 */
	public static function set($key = null, $value = null) {
		if ($key != null && $value != null) {
			self::$$key = $value;
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
			return self::$$key;
		} else {
			return false;
		}
	}
}