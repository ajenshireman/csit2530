<?php
/* Set error reporting */
ini_set('display_errors', 1);
$errorReportingLevel = 2;
switch ( $errorReportingLevel ) {
	case 1:
	    error_reporting(E_ALL ^ E_NOTICE);
	    break;
	case 2:
	    error_reporting(E_ALL);
	    break;
	case 0:
	default:
	    ini_set('display_errors', 0);
	    error_reporting(NONE);
}

/* Define the global constant for the site's root directory */
$site_path = realpath(dirname(__FILE__));
define('SITE_PATH', $site_path);

/* load the config file */
require './config/initialize.php';
