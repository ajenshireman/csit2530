<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8" />
    <meta />
    
    <title></title>
    
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>/public/css/styles.css" />
    
    <script></script>
</head>
<body>
    <!-- common top bar menu -->
    <div class="topbar">
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
            <?php } else { ?>
            <li>
            	<a href="<?php echo URL ?>/login">Login</a>
            </li>
            <li>
            	<a href="<?php echo URL ?>/register">Register</a>
            </li>
            <?php } ?>
        </ul>
    </div>
    