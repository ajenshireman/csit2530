<?php
/**
 * pickProcessor.php
 * Ajen Shireman
 * CSIT 2530 Lab2 - PartB
 * 31 January 2014
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
$timeslots = !empty($_POST['inputTimeslots']) ? $_POST['inputTimeslots'] : 'No Times Selected';

?>
<?php include './includes/head.php' ?>
<div id="name">
    Name: <?php echo $name ?>
</div>
<div id="semester">
    Semester: <?php echo $semester ?>
</div>
<div id="numClasses">
    Number of classes: <?php echo $numClasses ?>
</div>
<div id="numHours">
    Number of hours: <?php echo $numHours ?>
</div>
<div id="courses">
    Preferred Courses: <br />
    <?php 
    if ( is_array($courses) ) {
        foreach ( $courses as $course ) {
            echo "$course<br />";
        }
    } else {
        echo $courses;
    }
    ?>
</div>
<div id="timeslots">
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
<?php include './includes/foot.php' ?>