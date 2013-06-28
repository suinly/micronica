<?php
/*
 * Configuretion file
 */

Config::set('BLOG_TITLE', 'Micronica');

/**
 * Routes config
 * 
 * index.php?controller=DEFAULT_CONTROLLER?action=DEFAULT_ACTION
 */
Config::set('DEFAULT_CONTROLLER', 	'posts');
Config::set('DEFAULT_ACTION', 		'index');

/**
 * Database configuration
 */
Config::set('DB_HOST', 		'localhost');
Config::set('DB_NAME', 		'micronica');
Config::set('DB_USER', 		'micronica');
Config::set('DB_PASS', 		'password');

Config::set('DB_CHARSET', 	'utf8');

/**
 * Secret string
 */
Config::set('SECRET', 'hjlMkeFzV6JebBYY3qEqIdLEKhAXncwOb1juq4Q');