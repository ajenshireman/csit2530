<?php
/* Turn on error reporting */
error_reporting('E_ALL');
ini_set('display_errors', 'on');

/* set the timezone */
date_default_timezone_set('America/New_York');

/* load password_compat if < php 5.5.0 */
if ( !defined(PHP_VERSION_ID) ) {
    require 'application/lib/password.php';
} else if ( PHP_VERSION_ID < 505000 ) {
    require 'application/lib/password.php';
}

/* Set the site url */
define('URL', 'http://127.0.0.1/~ajen/csit2530/appStore');

/* Set the database connection parameters */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'c2530a07proj');
define('DB_USER', 'c2530a07');
define('DB_PASS', 'c2530a07');
