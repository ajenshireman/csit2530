<div>
    Showing results for <?php echo $this->searchString ?>
</div>
<div>
    <?php foreach ( $this->results as $result ) { ?>
    <div>
        <a href="<?php echo URL ?>/overview/showuserdetails/<?php 
        echo $result->get('userId') ?>"><?php echo $result->get('username') ?></a>
    </div>
    <?php } ?>
</div>