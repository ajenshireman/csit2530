<div class="panel">
    <div class="panelTitle">
        <h4>Account Details</h4>
    </div>
	<div class="panelBody">
	    <div>Username: <?php echo $this->user->get('username') ?></div>
	    <div>Email: <?php echo $this->user->get('email' ) ?></div>
	    <div>Joined: <?php echo $this->user->createDate() ?></div>
	</div>
</div>
