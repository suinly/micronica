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

