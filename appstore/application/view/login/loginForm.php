<form name="loginForm" action="<?php echo URL ?>/login/login" method="post">
    <div>
        <label for="loginUsername">Username: </label>
    	<input type="text" name="inputUsername" />
    </div>
    <div>
        <label for="loginPassword">Password: </label>
    	<input type="text" name="loginPassword" />
    </div>
    <div>
    	<button type="submit" id="btnLoginSubmit" action="login" value="login">Log In</button>
    	<button type="cancel" id="btnLoginCancel">Cancel</button>
    </div>
</form>