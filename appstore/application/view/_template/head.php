<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title></title>
    
    <!-- normalize.css - imrove cross-browser rendering -->
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/normlize.css" />
    
    <!-- Foundation 5.1.1 -->
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/foundation.css" />
    
    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/foundationOverride.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/overrideColors.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo PUBLIC_PATH ?>css/styles.css" />
    
    <!--  Foundation 5.1.1 html5 shim -->
    <script src="<?php echo PUBLIC_PATH ?>js/vendor/modernizr.js"></script>
    
    <script></script>
</head>
<body>
<!-- wrapper for page content -->
<div id="wrap">
    <!-- common top bar menu -->
	<div class="fixed">
		<nav class="top-bar" data-topbar></body>
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#">PSTCC App Store</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>
		        
            <section class="top-bar-section">
                <ul class="left">
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL ?>">Home</a>
                    </li>
                    <li class="divider"></li>
                </ul>
            </section>
		    
		    <section class="top-bar-section">
		            <ul class="right">
		    	    	<?php if ( isset($_SESSION['loggedIn']) ) { ?>
		    	    	<li class="divider"></li>
		    	    	<li>
                            <a href="<?php echo URL ?>/overview/users">Users</a>
                        </li>
                        <li class="divider"></li>
		    	    	<li class="has-dropdown">
		                    <a href="#"><?php echo $_SESSION['username'] ?></a>
		                    <ul class="dropdown">
		                        <li>
		                            <a href="<?php echo URL ?>/account">My Account</a>
		                        </li>
		                        <li>
		                            <a href="<?php echo URL ?>/login/logout">Logout</a>
		                        </li>
		                    </ul>
		                </li>
		                <li class="divider"></li>
		                <?php } else { ?>
		                <li class="divider"></li>
		                <li>
		                    <a href="<?php echo URL ?>/login">Login</a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="<?php echo URL ?>/register">Register</a>
		                </li>
		                <li class="divider"></li>
		                <?php } ?>
		            </ul>
		    </section>
		</nav>
	</div>
    