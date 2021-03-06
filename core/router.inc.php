<?php
/*
 * This is logic routes script.
 */

$params = explode('/', $_SERVER['REQUEST_URI']);

/*
 * If $_GET['controller'] and $_GET['action'] isset or not empty, use them,
 * else use the default values in core/config.inc.php.
 */
$controller = isset($params[1]) && !empty($params[1]) ? $params[1] : Config::get('DEFAULT_CONTROLLER');
$action	= isset($params[2]) && !empty($params[2]) ? $params[2] : Config::get('DEFAULT_ACTION');

$modelName = ucfirst(mb_substr($controller, 0, -1));
$controllerName = ucfirst($controller) . 'Controller';

/**
 * Include required controllers.
 */
if (file_exists(PATH_CONTROLLER . ucfirst($controller) . 'Controller.php')) {
	require_once(PATH_VIEW . 'View.php');

	require_once(PATH_MODEL . 'Model.php');

	if (file_exists(PATH_MODEL . ucfirst(mb_substr($controller, 0, -1)) . '.php')) {
		require_once(PATH_MODEL . ucfirst(mb_substr($controller, 0, -1)) . '.php');
	}

	require_once(PATH_CONTROLLER . 'Controller.php');
	require_once(PATH_CONTROLLER . ucfirst($controller) . 'Controller.php');
} else {
	die('<h1>Controller ' . ucfirst($controller) . ' not found!</h1>');
}


// access
$deny = true;

if (!isset($_SESSION['User'])) {
	// проверяем текущий контроллер
	foreach (Controller::$access as $c => $a) {
		if ($c == $controller && $c = '*') {
			foreach ($a as $v) {
				if ($v == $action && $v = '*') {
					$deny = false;
					break;
				}
			}
		}
	}

	if ($deny) {
		Controller::redirect('/users/login');
	}
}


/**
 * Checking method.
 */
if (method_exists($$controller, $action)) {
	$$controller->controller = $controller;
	$$controller->action = $action;
	
	$$controller->$modelName = new $modelName;

	$$controller->$action(@$params[3], @$params[4], @$params[5]);
} else {
	die('<h1>Method ' . $action . '() not found in controller ' . ucfirst($controller) . '!</h1>');
}