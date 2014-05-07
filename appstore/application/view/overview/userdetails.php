<div class="row">
    <div class="panel">
        <div>
            <h3>Details for <?php echo $this->user->get('username') ?></h3>
        </div>
        <div>
            <?php if ( file_exists(AVATAR_UPLOAD_PATH . $this->user->get('userId')) ) { ?>
            <img src="<?php echo AVATAR_PATH . $this->user->get('userId') ?>" />
            <?php } ?>
        </div>
        <div>
            UserID: <?php echo $this->user->get('userId') ?>
        </div>
        <div>
            e-mail: <?php echo $this->user->get('email') ?>
        </div>
        <div>
            Joined: <?php echo $this->user->createDate() ?>
        </div>
        <div>
            Roles: 
            <?php 
            for ( $i = 0; $i < count($this->userRoles); $i++ ) {
                echo $this->userRoles[$i]->get('name') . ' ';
            }
            ?>
        </div>
        <div>
            Status: <?php echo $this->user->get('status') ?>
        </div>
        <?php if ( $this->model->userInRole($_SESSION['userId'], 'Administrator') ) { ?>
        <div class="row">
            <form action="<?php echo URL ?>/account/setstatus/overview/showuserdetails/<?php echo $this->user->get('userId') ?>" method="post">
                <div cass="row">
                    <div class="small-12 medium-3 column">
                    	<strong>Set Account Status: </strong>
                    </div>
                    <div class="small-12 medium-2 column">
                    	<select name="inputStatusId">
                    	    <?php echo $this->statusChange ?>
                    	</select>
                    </div>
                    <div  class="small-12 medium-2 column end">
                        <button type="submit" name="inputUserId" value="<?php echo $this->user->get('userId') ?>">Change</button>
                    </div>
                </div>
            </form>
        </div>
        <?php } ?>
        <div>
            <a href="<?php echo URL ?>/overview/users" class="button">User List</a>
        </div>
    </div>
</div>
