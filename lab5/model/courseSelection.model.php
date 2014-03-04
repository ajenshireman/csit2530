<?php
/**
 * courseSelection.model.php
 * Ajen Shireman
 * CSIT 2530
 * Course Selection app
 * 
 * Contains buisiness logic for course selection app
 * Defines functions for accessing course information
 * Defines fucions for vaidationg the selection form
 */

/**
 * Since we're putting from a file for now, define it at the beginning
 */
define('COURSE_LIST', '../../datafiles/CSIT2014FALLCourseOffering.csv' );

/**
 * Get the available courses
 * 
 * For now pulls the information from ../datafiles/CSIT2014FALLCourseOffering.csv
 * 
 * @TODO
 * eventually pull from a database and return an associative array with field names as the keys
 * 
 * @return array 
 */
function getCourses () {
    if ( $file = fopen(COURSE_LIST, 'rb') ) {
        $courses = array();
        while ( !feof($file) ) {
            $course = fgetcsv($file);
            if ( $c === false ) { continue; }
            array_push($courses, $course);
        }
        return $courses;
    } else {
        /*
         * @TODO handle missing file gracefully
         */
        print('File '.COURSE_LIST.' does not exist');
        return;
    }
}

/**
 * print the available courses as a <option> list for a dropdown
 * 
 * gets the availabe courses from getCourses()
 * 
 * @param array $selectedCourse
 * 
 * @return void
 */
function printCourseOptions ( $selectedCourse ) {
    $courses = getCourses();
    $options = '';
    foreach ( $courses as $course ) {
        $cinfo = "$course[0] $course[1] $course[2] - $course[3] - $course[4] $course[5]";
        $options .= "<option value=\"$cinfo\"";
        if ( $selectedCourse == $cinfo ) {
            $options .= ' selected="selected"';
        }
        $options .= ">$cinfo</option>".PHP_EOL;
    }
    print $options;
}

/**
 * print the courses as an unordered list
 * 
 * just used for testing purposes
 * 
 * @return void
 */
function printCourses () {
    $courses = getCourses();
    print('<ul>');
    foreach ( $courses as $course ) {
        print "<li>$course[0] $course[1] $course[2] - $course[3] - $course[4] $course[5]</li>";
    }
    print('</ul>');
}

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

/**
 * finalize course selection
 * 
 * write the choices to a txt file and eventually the data base
 * 
 * @param array $selection
 * 
 * @return void
 */
function finalizeCourseSelection ( $selections = array() ) {
    /* append the course selections to a text file */
    $file = fopen('../../datafiles/choicelistFall2014.txt', 'xb');
    fwrite($file, $selections['name'].PHP_EOL);
    foreach ( $selections['courses'] as $course ) {
        fwrite($file, $course.PHP_EOL);
    }
    fwrite($file, PHP_EOL);
    fclose($file);
}
