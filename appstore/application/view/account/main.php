<div class="panel">
    <div class="panelTitle">
        <h4>Account Details</h4>
    </div>
	<div class="panelBody">
        <div>
            <?php if ( file_exists(AVATAR_UPLOAD_PATH . $this->user->get('userId')) ) { ?>
            <img src="<?php echo AVATAR_PATH . $this->user->get('userId') ?>" />
            <?php } ?>
        </div>
	    <div>
	       Username: <?php echo $this->user->get('username') ?>
	   </div>
	    <div>
	       Email: <?php echo $this->user->get('email' ) ?>
	    </div>
	    <div>
	       Joined: <?php echo $this->user->createDate() ?>
	    </div>
	</div>
	<div>
	   <a href="<?php echo URL ?>/account/changeavatar"><button>Change Avatar</button></a>
	</div>
	<div>
	   <a href="<?php echo URL ?>/account/changepassword"><button>Change Password</button></a>
	</div>
</div>
