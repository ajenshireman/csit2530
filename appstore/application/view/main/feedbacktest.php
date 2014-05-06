<div>
    <h4>General Feedback</h4>
    <?php 
    if ( $this->FEEDBACK_GENERAL != null ) {
        foreach ( $this->FEEDBACK_GENERAL as $feedback ) {
            echo '<div class="message">' . $feedback . "</div>\n";
        }
    } else {
        echo "<div>No Messages</div>\n";
    }
    ?>
</div>
<div>
    <h4>Negative Feedback</h4>
    <?php 
    if ( $this->FEEDBACK_NEGATIVE != null ) {
        foreach ( $this->FEEDBACK_NEGATIVE as $feedback ) {
            echo '<div class="error">' . $feedback . "</div>\n";
        }
    } else {
        echo "<div>No Errors</div>\n";
    }
    ?>
</div>
<div>
    <h4>Positive Feedback</h4>
    <?php 
    if ( $this->FEEDBACK_POSITIVE!= null ) {
        foreach ( $this->FEEDBACK_POSITIVE as $feedback ) {
            echo '<div class="message_success">' . $feedback . "</div>\n";
        }
    } else {
        echo "<div>No Messages</div>\n";
    }
    ?>
</div>
