<div>
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
            <td><a href="<?php echo URL ?>/overview/showuserdetails/<?php echo $user->get('userId') ?>"><button>Details</button></a></td>
            <?php if ( $this->model->userInRole($_SESSION['userId'], 'Administrator') ) { ?>
            <td><a href="<?php echo URL ?>/overview/rehashPassword/<?php echo $user->get('userId')?>"><button>Rehash PW</button></a></td>
            <td><a href="<?php echo URL ?>/account/setstatus/<?php echo $user->get('userId')?>/4"><button>Delete</button></a></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</div>
<div>
    <a href="<?php echo URL ?>">Index</a>
</div>