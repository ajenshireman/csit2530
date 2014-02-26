<?php
/**
 * courses_db.php
 * Ajen Shireman
 * CSIT 2530
 * Course Selection app
 * 
 * Defines functions for accessing course information
 * 
 */

/**
 * Since we're puing from a file for now, define it at the beinning
 */
define('COURSE_LIST', '../datafiles/CSIT2014FallOffering.csv' );

/**
 * Get the courses availble
 * 
 * For now pulls the information from ../datafiles/CSIT2014FallOffering.csv
 * 
 * @todo 
 * eventually pull from a database and return an associative array with field names as the keys
 * 
 * @return array 
 */
function getCourses () {
    $file = fopen(COURSE_LIST, 'rb');
    $courses = array();
    while ( !feof($file) ) {
        $course = fgetcsv($file);
        if ( $c === false ) { continue; }
        array_push($courses, $course);
    }
    return $courses;
}

?>
