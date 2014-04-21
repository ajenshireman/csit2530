<form name="registratioForm" action="<?php echo URL ?>/register/register" method="post">
    <div>
        <label for="registerUsername">Username: </label>
        <input type="text" name="registerUsername" />
    </div>
    <div>
        <label for="registerEmail">Email: </label>
        <input type="text" name="registerEmail" />
    </div>
    <div>
        <label for="registerPassword">Password: </label>
        <input type="text" name="registerPassword" />
    </div>
    <div>
        <label for="registerPasswordConfirm">Confirm Password: </label>
        <input type="text" name="registerPasswordConfirm" />
    </div>
    <div>
    	<button type="submit" id="btnLoginSubmit">Register</button>
    	<button type="cancel" id="btnLoginCancel">Cancel</button>
    </div>
</form>