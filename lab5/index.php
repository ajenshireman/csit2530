<?php
/**
 * index.php
 * Ajen Shireman
 * CSIT 2530 - Lab5
 * 7 March 2014
 * 
 * Controller for course picker app
 */

/* turn error reporting on */
ini_set('display_errors', 1);
error_reporting(E_ALL);
//error_reporting(E_ALL^E_NOTICE);

/* load required moduels */
require './model/courseSelection.model.php';  

/* start the session */
session_name('c2530a07_coursepicker');
session_start();

/* get formVars to the session */
$formVars = isset($_SESSION['formVars']) ? $_SESSION['formVars'] : null;

/* get reqiured action from post */
if ( isset($_POST['action']) ) {
    $action = $_POST['action'];
} else if ( isset($_GET['action']) ) {
    $action = $_GET['action'];
} else {
    $action = 'display_selection_form';
}

/* do the stuff */
if ( $action == 'display_selection_form' ) {
    cleanUpCorseSelection();
    
    // Show the form to the user
    require './view/courseSelectionForm.php';
} else if ( $action == 'courseSelectionSubmit' ) {
    // Validate selections
    $_SESSION['formVars'] = $formVars = validateCourseSelectionForm();
    if ( isset($formVars['errors']) ) {
        // If errors, show the selection form again
        require './view/courseSelectionForm.php';
    } else {
        // If no errors show the confirmation page
        require './view/courseSelectionConfirmationForm.php';
    }
} else if ( $action == 'courseSelectionRevist' ) {
    // return the user to the selection form with choices intact
    require './view/courseSelectionForm.php';
} else if ( $action == 'courseSelectionFinalize' ) {
    // Finalize the selections
    finalizeCourseSelection($_SESSION['formVars']['values']);
    
    // Display the thank you page
    require './view/courseSelectionThankYou.php';
    
    // cleanup
    cleanUpCorseSelection();    
}
