<div class="row">
	<div class="smal-12 column">
		<form name="changePasswordForm" action="<?php echo URL ?>/account/updateemail" method="post">
		    <?php require TEMPLATE_PATH . 'feedbackNegative.php' ?>
            <fieldset>
                <legend>Change e-mail</legend>
    		    <div class="row">
    		        <label for="emailPassword">Current Password:</label>
    		        <input type="password" name="emailPassword" />
    		    </div>
    		     <div class="row">
    		        <label for="newEmail">New Email:</label>
    		        <input type="text" name="newEmail" />
    		    </div>
    		    <div class="row">
    		    	<button type="submit" name="btnChangeEmailSubmit">Submit</button>
    		    	<button type="cancel" name="btnChangeEmailCancel">Cancel</button>
    		    </div>
		    </fieldset>
		</form>
	</div>
</div>