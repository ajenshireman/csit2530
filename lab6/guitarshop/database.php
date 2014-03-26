<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('America/New_York');

    $host = 'localhost';
    $dbname='c2530a##test';
    $username = 'c2530a##';
    $password = 'type-your-mysql-pw-here';

    $db = new mysqli($host, $username, $password,$dbname);
    if (mysqli_connect_errno()) {
        require('database_error.php');
        exit();
    }
    else echo 'Connect was successful';
?>