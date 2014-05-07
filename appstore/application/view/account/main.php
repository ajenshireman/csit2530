<div class="row">
    <div class="small-12 column">
        <div class="panel">
            <?php if ( isset($this->FEEDBACK_POSITIVE) ) { ?>
            <div cass="row">
                <?php 
                foreach ( $this->FEEDBACK_POSITIVE as $message ) {
                    echo '<div class="message_success">' . $message ."</div>\n";
                }
                ?>
            </div>
            <?php } ?>
            <div class="row">
                <div class="small-12 column panelTitle">
                    <h4>Account Details</h4>
                </div>
            </div>
        	<div class="row">
        		<div class="small-12 column panelBody">
	                <div class="row">
	                	<div class="small-12 medium-3 column">
	                		<div>
	                		    <?php if ( file_exists(AVATAR_UPLOAD_PATH . $this->user->get('userId')) ) { ?>
	                		    <img src="<?php echo AVATAR_PATH . $this->user->get('userId') ?>" />
	                		    <?php } ?>
	                		</div>
	                	</div>
	    			    <div class="small-12 medium-9 column">
	    			    	<div>
	    			    	   Username: <?php echo $this->user->get('username') ?>
	    			        </div>
	    			    	<div>
	    			    	   Email: <?php echo $this->user->get('email' ) ?>
	    			    	</div>
	    			    	<div>
	    			    	   Joined: <?php echo $this->user->createDate() ?>
	    			    	</div>
	    			    </div>
	                </div>
	            	<div class="row">
	            		<div class="small-12 column">
	            		   <a href="<?php echo URL ?>/account/changeavatar"><button>Change Avatar</button></a>
	            		   <a href="<?php echo URL ?>/account/changepassword"><button>Change Password</button></a>
	            		   <a href="<?php echo URL ?>/account/changeemail"><button>Change Email</button></a>
	            		</div>
	            	</div>
        		</div>
        	</div>
        </div>
    </div>
</div>