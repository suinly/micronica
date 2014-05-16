<?php
/**
 * Defaults path
 */
define('PATH_ROOT',       $_SERVER['DOCUMENT_ROOT'] . '/');
define('PATH_CORE',       PATH_ROOT . 'core/');
define('PATH_CONTROLLER', PATH_CORE . 'Controller/');
define('PATH_MODEL',      PATH_CORE . 'Model/');
define('PATH_VIEW',       PATH_CORE . 'View/');
define('PATH_LIB',        PATH_CORE . 'Lib/');

require_once(PATH_LIB  . 'ConfigClass.php');
require_once(PATH_CORE . 'config.inc.php');				// configuration file
require_once(PATH_CORE . 'global.inc.php');				// global functions

require_once(PATH_CORE . 'router.inc.php');				// logic routes
