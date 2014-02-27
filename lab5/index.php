<?php
/**
 * index.php
 * Ajen Shireman
 * CSIT 2530 - Lab5
 * 
 * Controller for course picker app
 */

define('EOL', PHP_EOL);

ini_set('display_errors', 1);
error_reporting(E_ALL);

require './model/courses_db.php';       

if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} else if ( isset($_GET['action']) ) {
    $action = $_GET['action'];
} else {
    $action = 'display_selection_form';
}

if ( $action == 'display_selection_form' ) {
    unset($_POST);
    // Show the form to the user
    require './coursepicker.php';
} else if ( $action == 'courseSelectionSubmit' ) {
    require './processpicks.php';
}
