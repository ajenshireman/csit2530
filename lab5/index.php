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
error_reporting(E_ALL^E_NOTICE);

require './model/courseSelection.model.php';  

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
    //echo "showing first time form";
    require './view/courseSelectionForm.php';
} else if ( $action == 'courseSelectionSubmit' ) {
    // Validate selections
    $formVars = validateCourseSelectionForm();
    if ( isset($formVars['errors']) ) {
        // If errors, show the selection form again
        require './view/courseSelectionForm.php';
    } else {
        // If no errors show the confirmation page
        require './view/courseSelectionConfirmationForm.php';
    }
} else if ( $action == 'courseSelectionRevist' ) {
    // return the user to the selection form with choices intact
    // TODO selections aren't preserved. Why?
    require './view/courseSelectionForm.php';
} else if ( $action == 'courseSelectionFinalize' ) {
    // Finalize the selections
    finalizeCourseSelection($formVars['values']);
    
    // Display the thank you page
    require './view/courseSelectionThankYou.php';
}
