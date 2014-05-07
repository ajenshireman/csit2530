<div class="row">
    <div class="small-12 column">
        <form name="registratioForm" action="<?php echo URL ?>/register/register" method="post">
            <?php require TEMPLATE_PATH . 'feedbackNegative.php' ?>
		    <fieldset>
                <legend>Register</legend>
                <div class="row">
                    <label for="registerUsername">Username: </label>
                    <input type="text" name="registerUsername" />
                </div>
                <div class="row">
                    <label for="registerEmail">Email: </label>
                    <input type="text" name="registerEmail" />
                </div class="row">
                <div class="row">
                    <label for="registerPassword">Password: </label>
                    <input type="password" name="registerPassword" />
                </div>
                <div class="row">
                    <label for="registerPasswordConfirm">Confirm Password: </label>
                    <input type="password" name="registerPasswordConfirm" />
                </div>
                <div class="row">
                	<button type="submit" name="btnRegisterSubmit">Register</button>
                	<button type="cancel" name="btnRegisterCancel">Cancel</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
