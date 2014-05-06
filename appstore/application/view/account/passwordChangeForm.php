<div>
    To change your password, enter your current password and your desired new password.<br />
    Once your password has been changed, you will automaticay be logged out.<br />
    You can then log in with your new pasword.<br />
</div>
<form name="changePasswordForm" action="<?php echo URL ?>/account/updatepassword" method="post">
    <?php if ( isset($this->FEEDBACK_NEGATIVE) ) { ?>
    <div>
        <?php 
        foreach ( $this->FEEDBACK_NEGATIVE as $error ) {
            echo <<<err
        <div class="error">$error</div>\n        
err;
        }
        Session::remove('errors');
        ?>
    </div>
    <?php } ?>
    <div>
        <label for="currentPassword">Current Password:</label>
        <input type="text" name="currentPassword" />
    </div>
     <div>
        <label for="newPassword">New Password:</label>
        <input type="text" name="newPassword" />
    </div>
     <div>
        <label for="confirmPassword">Confirm Password:</label>
        <input type="text" name="confirmPassword" />
    </div>
    <div>
    	<button type="submit" id="btnChangePasswordSubmit">Submit</button>
    	<button type="cancel" id="btnChangePasswordCancel">Cancel</button>
    </div>
</form>