<?php
/* Turn on error reporting */
ini_set('display_errors', 1);
error_reporting(E_ALL);

/* set the timezone */
date_default_timezone_set('America/New_York');

/* Set the site url */
define('URL', 'http://127.0.0.1/~ajen/csit2530/appstore');
//define('URL', 'http://ps11.pstcc.edu/~c2530a07/appstore');

/* Folder config */
define('CLASS_PATH', 'application/class/');
define('CONTROLLER_PATH', 'application/controller/');
define('LIB_PATH', 'application/lib/');
define('MODEL_PATH', 'application/model/');
define('VIEW_PATH', 'application/view/');
define('PUBLIC_PATH', URL . '/public/');

/* Define locations for the common head and foot */
define('COMMON_HEAD', VIEW_PATH . '_template/head.php');
define('COMMON_FOOT', VIEW_PATH . '_template/foot.php');

/* load password_compat if < php 5.5.0 */
if ( !defined(PHP_VERSION_ID) ) {
    require LIB_PATH . 'password.php';
} else if ( PHP_VERSION_ID < 505000 ) {
    require IB_PATH . 'password.php';
}

/* Set the database connection parameters */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'c2530a07proj');
define('DB_USER', 'c2530a07');
define('DB_PASS', 'c2530a07');
