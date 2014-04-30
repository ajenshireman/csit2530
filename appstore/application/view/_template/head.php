<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title></title>
    
    <!-- normalize.css - imrove cross-browser rendering -->
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/normlize.css" />
    
    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/styles.css" />
    
    <script></script>
</head>
<body>
    <!-- common top bar menu -->
	<nav class="topbar">
	    <ul class="navbar">
            <li>
            	<a href="<?php echo URL ?>/main">Main</a>
            </li>
	        <li>
	        	<a href="<?php echo URL ?>/overview">Users</a>
	        </li>
	        <?php if ( isset($_SESSION['loggedIn']) ) { ?>
	        <li>
	        	<a href="<?php echo URL ?>/login/logout">Logout</a>
	        </li>
	        <li>
	            Logged in as: <a href="<?php echo URL ?>/account"><?php echo $_SESSION['username'] ?></a>
	        </li>
	        <?php } else { ?>
	        <li>
	        	<a href="<?php echo URL ?>/login">Login</a>
	        </li>
	        <li>
	        	<a href="<?php echo URL ?>/register">Register</a>
	        </li>
	        <?php } ?>
    	</ul>
	</nav>
    