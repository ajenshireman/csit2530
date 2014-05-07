<div class="row">
	<div class="small-12 column">
		<form name="loginForm" action="<?php echo URL ?>/login/login" method="post">
		    <?php require TEMPLATE_PATH . 'feedbackNegative.php' ?>
		    <fieldset>
                <legend>Log in</legend>
                <div class="row">
                    <label for="loginUsername">Username: 
                        <input type="text" name="loginUsername" />
                    </label>
                </div>
                <div class="row">
                    <label for="loginPassword">Password: 
                        <input type="password" name="loginPassword" />
                    </label>
                </div>
                <div class="row">
                    <button type="submit" name="btnLoginSubmit">Log In</button>
                    <button type="cancel" name="btnLoginCancel">Cancel</button>
                </div>
            </fieldset>
		</form>
	</div>
</div>