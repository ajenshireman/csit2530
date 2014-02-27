<?php
/**
 * processpicks.php
 * Ajen Shireman
 * CSIT 2530 Lab4
 * 21 February 2014
 * 
 * This just echos back the choices from pickList.php
 * 
 * 21 February 2014
 *  Added pageTitle
 */

$pageTitle = 'CSIT Faculty Course Selection - Results';

?>
<?php require './/head.php' ?>
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
				            echo "Choice $p: $course<br />\n";
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
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php require './/foot.php' ?>