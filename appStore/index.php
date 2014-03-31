<?php

/* Error reporting */
error_reporting(E_ALL);

/* Set the timezone */
date_default_timezone_set('America/New_York');

/* Define Site path */
$sitePath = realpath(dirname(__FILE__));
define('__SITE_PATH', $sitePath);

/* Initialize php variables */
require 'includes/ini.php';
