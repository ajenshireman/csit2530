<?php if ( isset($this->FEEDBACK_GENERAL ) ) { ?>
<div class="row">
    <div class="small-12 column alert-box info" data-alert">
        <?php 
        foreach ( $this->FEEDBACK_GENERAL as $message ) {
            echo '<p>' . $message."</p>\n";
        }
        ?>
        <a href="#" class="close">&times;</a>
    </div>
</div>
<?php } ?>
