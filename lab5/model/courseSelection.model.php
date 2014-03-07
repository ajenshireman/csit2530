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
define('NAME_LIST', '../../CSIT2014FALLNames.csv');
define('COURSE_LIST', '../../datafiles/CSIT2014FALLCourseOffering.csv');
define('TIME_LIST', '../../datafiles/CSIT2014FALLTimeslots.csv');

/**
 * clean up the form variables
 * 
 * unsets $formVars and $_SESSION['formVars']
 * 
 * @return void
 */

function cleanUpCorseSelection () {
    unset($formVars);
    unset($_SESSION['formVars']);
    unset($_POST);
}

/**
 * get the contents of a csv fie and retun it as an array
 * 
 * This isn't working for some reason and i don't have time to fix it
 * 
 * @param string $source
 * 
 * @return array $contents
 */
function getFromCSV ( $source ) {
    if ( $file = fopen($source, 'rb') ) {
        $contents = array();
        while ( !feof($file) ) {
            $line = fgetcsv($file);
            if ( $line === false ) { continue; }
            array_push($content, $line);
        }
        return $contents;
    } else {
        /*
         * @TODO handle missing file gracefully
        */
        print('File '.$source.' does not exist');
        return;
    }
}

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
    //return getFromCSV(COURSE_LIST);
    
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
 * get the available timeslots
 * 
 * @return array
 */
function getTimeslots () {
    if ( $file = fopen(TIME_LIST, 'rb') ) {
        $timeslots = array();
        while ( !feof($file) ) {
            $timeslot = fgetcsv($file);
            if ( $timeslot === false ) { continue; }
            array_push($timeslots, $timeslot);
        }
        return $timeslots;
    } else {
        /*
         * @TODO handle missing file gracefully
        */
        print('File '.TIME_LIST.' does not exist');
        return;
    }
}

/**
 * print the available timeslots
 * 
 * @param array $selectedTimes
 * 
 * @return void
 */
function printTimesolots ( $selectedTimes = array() ) {
    $div = '';
    $divClass = 'small-6 medium-4 large-3 columns';
    $timeslots = getTimeslots();
    for ( $i = 0; $i < count($timeslots); $i++ ) {
        // check if this is the last timeslot
        if ( $i == count($timeslots) - 1 ) {
            $divClass .= ' end';
        }
        
        // check if this timeslt is selected
        if ( isset($selectedTimes[$i]) ) {
            $selected = ' checked="checked"';
        } else {
            $selected = '';
        }
        
        // wirte the html
        $div .= <<<OPENDIV
<div class="$divClass">
    <input type="checkbox" name="inputTimeslots[$i]" id="inputTimeslots$i" value="{$timeslots[$i][0]}"$selected><label for="inputTimeslots$i">{$timeslots[$i][0]}</label>
</div>
OPENDIV;
    }
    print $div;
}

/**
 * collect form values from $_POST
 * 
 * @ param array$ post
 * 
 * @return array
 */
function collectFormVars ( $post = array() ) {
    $formVars['values'] = array(
            'name'       => !empty($_POST['inputName'])       ? $_POST['inputName']       : null,
            'semester'   => !empty($_POST['inputSemester'])   ? $_POST['inputSemester']   : null,
            'numClasses' => !empty($_POST['inputNumClasses']) ? $_POST['inputNumClasses'] : null,
            'numHours'   => !empty($_POST['inputNumHours'])   ? $_POST['inputNumHours']   : null,
            'courses'    => !empty($_POST['inputCourses'])    ? $_POST['inputCourses']    : null,
            'timeslots'  => !empty($_POST['inputTimeslots'])  ? $_POST['inputTimeslots']  : null,
            'notes'      => !empty($_POST['notes'])           ? $_POST['notes']           : null
    );
    return $formVars;
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
    // prevent dupilicates
    if ( findDuplicateCourseSelecetions ( $values['courses']) ) {
        $errors['courses'] = 'Please select 5 different courses';
    }
    
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
 * check for the selection of dulicate courses
 * 
 * @param array $courses
 * 
 * @return true if duplicates are found
 * @return false if no duplicattes are found
 */
function findDuplicateCourseSelecetions ( $courses ) {
    for ( $i = 0; $i < count($courses); $i++ ) {
        for ( $j = $i + 1; $j < count($courses); $j++ ) {
            if ( $courses[$i] == $courses[$j] ) {
                return true;
            }
        }
    }
    
    return false;
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
    $file = fopen('../../datafiles/choicelistFall2014.txt', 'ab');
    fwrite($file, $selections['name'].PHP_EOL);
    foreach ( $selections['courses'] as $course ) {
        fwrite($file, $course.PHP_EOL);
    }
    fwrite($file, PHP_EOL);
    fclose($file);
}
