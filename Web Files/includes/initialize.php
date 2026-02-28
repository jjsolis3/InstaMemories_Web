<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

if (!defined('SERVER_ROOT')) {
	// Resolve from filesystem first so deployment is not tied to a specific cPanel username.
	$resolvedRoot = realpath(dirname(__DIR__));
	if ($resolvedRoot === false && isset($_SERVER['DOCUMENT_ROOT'])) {
		$resolvedRoot = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\');
	}
	if ($resolvedRoot === false || $resolvedRoot === '') {
		$resolvedRoot = dirname(__DIR__);
	}
	define('SERVER_ROOT', $resolvedRoot);
}

defined('LIB_PATH') ? null : 
	define('LIB_PATH', SERVER_ROOT.DS.'includes');

// load config file first
require_once(LIB_PATH.DS.'config.php');


// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS.'functions.php');

// load core objects
require_once(LIB_PATH.DS.'session.php');
require_once(LIB_PATH.DS.'database.php');
require_once(LIB_PATH.DS.'database_object.php');
require_once(LIB_PATH.DS.'pagination.php');
require_once(LIB_PATH.DS.'paginate.php');
//require_once(LIB_PATH.DS."phpMailer".DS."class.phpmailer.php");
//require_once(LIB_PATH.DS."phpMailer".DS."class.smtp.php");
//require_once(LIB_PATH.DS."phpMailer".DS."language".DS."phpmailer.lang-en.php");

// load database-related classes
//require_once(LIB_PATH.DS.'user.php');
//require_once(LIB_PATH.DS.'photograph.php');
//require_once(LIB_PATH.DS.'comment.php');

?>
