<?php
/**
 * courseSelectionThankYou.php
 * Ajen Shireman
 * CSIT 2530 - Lab5
 * 7 March 2014
 *
 * Thank you page displayed after course selection is complete
 */
$pageTitle = 'CSIT Faculty Course Selection - Complete';
?>
<?php require './view/head.php' ?>
<form action="." method="post">
	<div class="row">
		<div class="small-12 columns">
			<div class="panel callout">
			    <p>
			        Thank you <?php print($formVars['values']['name'])?>.
			    </p>
			    <p>
			        Your course selections for <?php print($formVars['values']['semester']) ?> have been saved.
			    </p>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="small-12 columns">
            <button class="tiny" type="submit" name="action" value="display_selection_form">OK</button>
	    </div>
	</div>
</form>
<?php require './view/foot.php' ?>
