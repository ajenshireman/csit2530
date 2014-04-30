<div>
    <h3>Details for <?php echo $this->user->get('username') ?></h3>
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
<div>
    <strong>Set Account Status</strong><br />
    <?php echo $this->statusChange ?>
</div>
<?php } ?>
<div>
    <a href="<?php echo URL ?>/overview">User List</a>
</div>