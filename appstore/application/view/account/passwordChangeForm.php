<div class="row">
    <div class="small-12 column">
        <form name="changePasswordForm" action="<?php echo URL ?>/account/updatepassword" method="post">
            <div class="row">
                <div class="small-12 column alert-box info" data-alert>
                	<p>To change your password, enter your current password and your desired new password.</p>
                	<p>Once your password has been changed, you will automaticay be logged out.</p>
                	<p>You can then log in with your new pasword.</p>
                	<a href="#" class="close">&times;</a>
                </div>
            </div>
        	<?php require TEMPLATE_PATH . 'feedbackNegative.php' ?>
		    <fieldset>
		      <legend>Change Password</legend>
                <div class="row">
                    <label for="currentPassword">Current Password:</label>
                    <input type="text" name="currentPassword" />
                </div>
                 <div class="row">
                    <label for="newPassword">New Password:</label>
                    <input type="password" name="newPassword" />
                </div>
                 <div class="row">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" name="confirmPassword" />
                </div>
                <div class="row">
                	<button type="submit" id="btnChangePasswordSubmit">Submit</button>
                	<button type="cancel" id="btnChangePasswordCancel">Cancel</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
