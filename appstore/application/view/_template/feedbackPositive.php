<?php if ( isset($this->FEEDBACK_POSITIVE) ) { ?>
<div class="row">
    <div class="small-12 column alert-box success" data-alert>
        <?php 
        foreach ( $this->FEEDBACK_POSITIVE as $message ) {
            echo '<p>' . $message."</p>\n";
        }
        ?>
        <a href="#" class="close">&times;</a>
    </div>
</div>
<?php } ?>
