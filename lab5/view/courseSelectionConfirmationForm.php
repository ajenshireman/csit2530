<?php
/**
 * processpicks.php
 * Ajen Shireman
 * CSIT 2530 Lab5
 * 216February 2014
 * 
 * This just echos back the choices from pickList.php
 * 
 * 21 February 2014
 *  Added pageTitle
 *  
 * 26 February 2014:
 *  moved validation to function
 */

$pageTitle = 'CSIT Faculty Course Selection - Results';

?>
<?php require './view/head.php' ?>
<form id="courseSelectionConfirmationForm" action="." method="post">
	<div class="row">
		<div class="small-12 columns">
			<div class="panel callout">
				<div class="row">
					<div id="name" class="small-12 columns">
					    Name: <?php echo $formVars['values']['name'] ?>
					</div>
					<div id="semester" class="small-12 columns">
					    Semester: <?php echo $formVars['values']['semester'] ?>
					</div>
					<div id="numClasses" class="small-12 columns">
					    Number of classes: <?php echo $formVars['values']['numClasses'] ?>
					</div>
					<div id="numHours" class="small-12 columns">
					    Number of hours: <?php echo $formVars['values']['numHours'] ?>
					</div>
					<div id="courses" class="small-12 columns">
					    Preferred Courses: <br />
					    <?php 
					    $courses = $formVars['values']['courses'];
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
					    $timeslots = $formVars['values']['timeslots'];
					    if ( is_array($timeslots) ) {
					        foreach ( $timeslots as $timeslot ) {
					            echo "$timeslot<br />";
					        }
					    } else {
					        echo $timeslots;
					    }
					    ?>
					</div>
					<div id="notes" class="small-12 columns">
					    Notes: <br />
					    <?php echo $formVars['values']['notes'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="small-12 columns">
            <button class="tiny" type="submit" name="action" value="courseSelectionConfirm">OK</button>
            <button class="tiny" type="submit" name="action" value="courseSelectionRevist">Back</button>
            <button class="tiny" type="cancel" name="action" value="courseSelectionCancel">Cancel</button>
	    </div>
	</div>
</form>

<?php require './view/foot.php' ?>