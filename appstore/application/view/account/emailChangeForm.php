<form name="changePasswordForm" action="<?php echo URL ?>/account/updateemail" method="post">
    <?php if ( isset($this->FEEDBACK_NEGATIVE) ) { ?>
    <div>
        <?php 
        foreach ( $this->FEEDBACK_NEGATIVE as $message ) {
            echo '<div class="error">' . $message."</div>\n";
        }
        ?>
    </div>
    <?php } ?>
    <div>
        <label for="emailPassword">Current Password:</label>
        <input type="text" name="emailPassword" />
    </div>
     <div>
        <label for="newEmail">New Email:</label>
        <input type="text" name="newEmail" />
    </div>
    <div>
    	<button type="submit" name="btnChangeEmailSubmit">Submit</button>
    	<button type="cancel" name="btnChangeEmailCancel">Cancel</button>
    </div>
</form>