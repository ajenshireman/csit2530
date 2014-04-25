<?php
/*
error_reporting('E_ALL');
ini_set('display_errors', 'on');
*/

/* Load the site configuration */
require 'application/config/config.php';

/* Load the autoload functions */
require 'application/config/autoload.php';

$router = new Router();
