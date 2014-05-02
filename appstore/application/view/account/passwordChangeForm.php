<form name="changePasswordForm" action="<?php echo URL ?>/account/changepassword" method="post">
    <?php if ( isset($this->errors) ) { ?>
    <div>
        <?php echo $this->errors ?>
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
    	<button type="submit" id="btnLoginSubmit">Submit</button>
    	<button type="cancel" id="btnLoginCancel">Cancel</button>
    </div>
</form>