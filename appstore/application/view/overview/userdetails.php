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
    Joined: <?php echo $this->user->get('created') ?>
</div>
<div>
    <a href="<?php echo URL ?>/overview">User List</a>
</div>