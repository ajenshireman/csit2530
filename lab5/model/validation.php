<?php
/**
 * validation.php
 * Ajen Shireman
 * CSIT 2530
 * 
 * defines functions to for form validation
 * all funcation should be in the form validate[formName]
 */

/**
 * validate the course selection form
 * 
 * @return array multi-dimensional array with errors and form values
 */
function validateCourseSelectionForm () {
    // Gather post variables
    $values = array (
        'name'       => !empty($_POST['inputName'])       ? $_POST['inputName']       : '',
        'semester'   => !empty($_POST['inputSemester'])   ? $_POST['inputSemester']   : '',
        'numClasses' => !empty($_POST['inputNumClasses']) ? $_POST['inputNumClasses'] : 0,
        'numHours'   => !empty($_POST['inputNumHours'])   ? $_POST['inputNumHours']   : 0,
        'courses'    => !empty($_POST['inputCourses'])    ? $_POST['inputCourses']    : 'No Courses Selected',
        'timeslots'  => !empty($_POST['inputTimeslots'])  ? $_POST['inputTimeslots']  : '',
        'notes'      => !empty($_POST['notes'])           ? $_POST['notes']           : ''
    );
    
    // Validation
    // Name
    if ( empty($values['name']) ) {
        $errors['name'] = 'Please slect a name';
    }
    
    // Semester
    if ( empty($values['semester']) ) {
        $errors['semester'] = 'Please select a semester';
    }
    
    // Number of classes
    if ( empty($values['numClasses']) ) {
        $errors['numCourses'] = 'Please select the desired number of courses';
    }
    
    // Hours
    if ( empty($values['numHours']) ) {
        $errors['hours'] = 'Please enter the desired number of hours';
    } else if ( !is_numeric($values['numHours']) ) {
        $errors['hours'] = 'Hours must be a numeral';
    } else if ( $values['numHours'] <= 0 || $values['numHours'] >= 20 ) {
        $errors['hours'] = 'Hours must be greater than 0 and less than 20';
    }
    
    // Course selections
    // The form only allows selection of 5 courses
    
    // Timeslots
    if ( empty($values['timeslots']) ) {
        $errors['timeslots'] = 'Please select at least one preferred time';
    }
    
    return array(
        'values' => $values,
        'errors' => isset($errors) ? $errors : null
    );
}
