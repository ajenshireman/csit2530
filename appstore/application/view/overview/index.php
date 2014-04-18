<div>
    <table>
        <tr>
            <th>User</th>
            <th>Joined</th>
            <th></th>
        </tr>
        <?php foreach ( $this->users as $user ) { ?>
        <tr>
            <td><?php echo $user->get('username') ?></td>
            <td><?php echo $user->get('created')?></td>
            <td><a href="<?php echo URL ?>/overview/showuserdetails/<?php echo $user->get('userId')?>"><button>Details</button></a></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div>
    <a href="<?php echo URL ?>">Index</a>
</div>