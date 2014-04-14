<?php
    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('America/New_York');
    /*
    try {
        $file = fopen('../../../database/.guitarshop', 'rb');
        //$params = file('../../../database/.guitarshop');
        $params = array();
        
        while ( !feof($file) ) {
            $params[] = fgets($file);
        }
        
        
        $host = $params[0];
        $dbname= $params[1];
        $username = $params[2];
        $password = $params[3];
        
        
        print("host: $host<br />db: $dbname<br />user: $username<br />pass: $password");
        
        fclose($file);
    } catch (Exception $e) {
        // ignore
    }
    */
    $host = 'localhost';
    $dbname='c2530a07test';
    $username = 'c2530a07';
    $password = 'c2530a07';
    
    $db = new mysqli($host, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        require('database_error.php');
        exit();
    }
    else echo 'Connect was successful';
?>