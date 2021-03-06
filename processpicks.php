<?php
/**
 * processpicks.php
 * Ajen Shireman
 * CSIT 2530 Lab3 - PartB
 * 19 February 2014
 * 
 * This just echos back the choices from pickList.php
 */

// If the form hasn't been submitted, send the user back to the index
// TODO: put this all in one page
if ( !isset($_POST['btnSubmit']) ) {
    header("Location: index.php");
    die();
}

// Gather post variables
$name = !empty($_POST['inputName']) ? $_POST['inputName'] : '';
$semester = !empty($_POST['inputSemester']) ? $_POST['inputSemester'] : '';
$numClasses = !empty($_POST['inputNumClasses']) ? $_POST['inputNumClasses'] : 0;
$numHours = !empty($_POST['inputNumHours']) ? $_POST['inputNumHours'] : 0;
$courses= !empty($_POST['inputCourses']) ? $_POST['inputCourses'] : 'No Courses Selected';
$timeslots = !empty($_POST['inputTimeslots']) ? $_POST['inputTimeslots'] : '';
$notes = !empty($_POST['notes']) ? $_POST['notes'] :'';

// Validation
// Name
if ( empty($name) ) {
    $errors['name'] = 'Please slect a name';
}

// Semester
if ( empty($semester) ) {
    $errors['semester'] = 'Please select a semester';
}

// Number of classes
if ( empty($numClasses) ) {
    $errors['numCourses'] = 'Please enter the desired number of courses';
}

// Hours
if ( empty($numHours) ) {
    $errors['hours'] = 'Please enter the desired number of hours';
} else if ( !is_numeric($numHours) ) {
    $errors['hours'] = 'Hours must be a numeral';
} else if ( $numHours <= 0 || $numHours >= 20 ) {
    $errors['hours'] = 'Hours must be greater than 0 and less than 20';
}

// Course selections
// The form only allows selection of 5 courses

// Timeslots
if ( empty($timeslots) ) {
    $errors['timeslots'] = 'Please select at least one preferred time';
}

// If there are errors, return to the selection page
if ( isset($errors) ) {
    include('coursepicker.php');
    exit();
}

?>
<?php require './includes/head.php' ?>
<div class="row">
	<div class="small-12 columns">
		<div class="panel callout">
			<div class="row">
				<div id="name" class="small-12 columns">
				    Name: <?php echo $name ?>
				</div>
				<div id="semester" class="small-12 columns">
				    Semester: <?php echo $semester ?>
				</div>
				<div id="numClasses" class="small-12 columns">
				    Number of classes: <?php echo $numClasses ?>
				</div>
				<div id="numHours" class="small-12 columns">
				    Number of hours: <?php echo $numHours ?>
				</div>
				<div id="courses" class="small-12 columns">
				    Preferred Courses: <br />
				    <?php 
				    if ( is_array($courses) ) {
				        $p = 1;
				        foreach ( $courses as $course ) {
				            echo "Choice $p: $course<br />";
				            $p++;
				        }
				    } else {
				        echo $courses;
				    }
				    ?>
				</div>
				<div id="timeslots" class="small-12 columns">
				    Preferred Times: <br />
				    <?php
				    if ( is_array($timeslots) ) {
				        foreach ( $timeslots as $timeslot ) {
				            echo "$timeslot<br />";
				        }
				    } else {
				        echo $timeslots;
				    }
				    ?>
				</div>
				<?php 
				if ( !empty($notes) ) {?>
				<div id="notes" class="small-12 columns">
				    Notes: <br />
				    <?php echo $notes ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php require './includes/foot.php' ?>