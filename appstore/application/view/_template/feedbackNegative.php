<?php if ( isset($this->FEEDBACK_NEGATIVE) ) { ?>
<div class="row">
    <div class="small-12 column alert-box warning" data-alert>
        <?php 
        foreach ( $this->FEEDBACK_NEGATIVE as $message ) {
            echo '<p>' . $message."</p>\n";
        }
        ?>
        <a href="#" class="close">&times;</a>
    </div>
</div>
<?php } ?>
