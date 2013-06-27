<?php
/*
 * This is logic routes script.
 */

/*
 * If $_GET['controller'] and $_GET['action'] isset or not empty, use them,
 * else use the default values in core/config.inc.php.
 */
$controller = isset($_GET['controller']) && !empty($_GET['controller']) ? $_GET['controller'] : Config::get('DEFAULT_CONTROLLER');
$action	= isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : Config::get('DEFAULT_ACTION');

/**
 * Include required controllers.
 */
if (file_exists(PATH_CONTROLLER . ucfirst($controller) . 'Controller.php')) {
	require_once(PATH_CONTROLLER . 'Controller.php');
	require_once(PATH_CONTROLLER . ucfirst($controller) . 'Controller.php');
} else {
	die('<h1>Контроллер ' . ucfirst($controller) . ' не найден!</h1>');
}

/**
 * Checking method.
 */
if (method_exists($$controller, $action)) {
	$$controller->$action();
} else {
	die('<h1>Метод ' . $action . '() не найден в контроллере ' . ucfirst($controller) . '!</h1>');
}