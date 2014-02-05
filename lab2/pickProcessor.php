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
$name = $_POST['inputName'];
$semester = $_POST['inputSemester'];
$numClasses = $_POST['inputNumClasses'];
$numHours = $_POST['inputNumHours'];
$courses=$_POST['inputCourses'];
$timeslots = $_POST['inputTimeslots'];

?>
<?php require './includes/head.php' ?>
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
    foreach ( $courses as $course ) {
        echo "$course<br />";
    }
    ?>
</div>
<div id="timeslots">
    Preferred Times: <br />
    <?php 
    foreach ( $timeslots as $timeslot ) {
        echo "$timeslot<br />";
    }
    ?>
</div>
<?php require './includes/foot.php' ?>