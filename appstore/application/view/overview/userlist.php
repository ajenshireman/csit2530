<div class="row">
    <div class="small-12 column">
        <strong>Status: </strong>
        <ul class="button-group">
            <li><a href="<?php echo URL ?>/overview/users" class="button">All</a></li>
            <?php foreach ( $this->statuses as $status ) { ?>
            <li><a href="<?php echo URL . '/overview/users/' . $status->get('statusId') 
            ?>" class="button"><?php echo $status->get('name') ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="small-12 column">
        <table>
            <tr>
                <th>User</th>
                <th>Joined</th>
                <th>Status</th>
            </tr>
            <?php foreach ( $this->users as $user ) { ?>
            <tr>
                <td><?php echo $user->get('username') ?></td>
                <td><?php echo $user->createDate() ?></td>
                <td><?php echo $user->get('status') ?></td>
                <td><a href="<?php echo URL ?>/overview/showuserdetails/<?php echo $user->get('userId') ?>" class="button">Details</a></td>
                <?php if ( $this->model->userInRole($_SESSION['userId'], 'Administrator') ) { ?>
                <td><a href="<?php echo URL ?>/overview/rehashPassword/<?php echo $user->get('userId')?>" class="button">Rehash PW</a></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="small-12 column">
        <a href="<?php echo URL ?>" class="button">Index</a>
    </div>
</div>