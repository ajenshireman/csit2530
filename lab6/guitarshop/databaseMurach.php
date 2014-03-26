<?php
    $dsn = 'mysql:host=localhost;dbname=c2530a##test';
    $username = 'c2530a##';
    $password = 'pw';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        require('database_error.php');
        exit();
    }
?>