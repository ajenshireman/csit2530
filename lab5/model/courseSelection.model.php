<?php
/**
 * courseSelection.model.php
 * Ajen Shireman
 * CSIT 2530
 * Course Selection app
 * 
 * Contains buisiness logic for course selection app
 * Defines functions for accessing course information
 * 
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
 * gets he availabe courses from getCourses()
 * 
 * @return void
 */
function printCourseOptions () {
    $courses = getCourses();
    $options = '';
    foreach ( $courses as $course ) {
        $cinfo = "$course[0] $course[1] $course[2] - $course[3] - $course[4] $course[5]";
        $options .= "<option value=\"$cinfo\">$cinfo</option>".PHP_EOL;
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
