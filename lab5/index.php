<?php
/**
 * index.php
 * Ajen Shireman
 * CSIT 2530 - Lab5
 * 26 February 2014
 * 
 * Controller for course picker app
 */

/* turn error reporting on */
ini_set('display_errors', 1);
error_reporting(E_ALL);

require './model/courseSelection.model.php';  
require './model/validation.php';     

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
    require './view/courseSelectionForm.php';
} else if ( $action = 'courseSelectionSubmit' ) {
    $formVars = validateCourseSelectionForm();
    if ( isset($formVars['errors']) ) {
        require './view/courseSelectionForm.php';
    } else {
        require './view/courseSelectionConfirmationForm.php';
    }
}

