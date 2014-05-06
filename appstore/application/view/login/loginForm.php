<form name="loginForm" action="<?php echo URL ?>/login/login" method="post">
    <?php if ( isset($this->FEEDBACK_NEGATIVE) ) { ?>
    <div>
        <?php 
        foreach ( $this->FEEDBACK_NEGATIVE as $error ) {
            echo '<div class="error">' . $error ."</div>\n";
        }
        ?>
    </div>
    <?php } ?>
    <div>
        <label for="loginUsername">Username: </label>
    	<input type="text" name="loginUsername" />
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