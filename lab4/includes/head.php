<?php
/**
 * head.php
 * Author: Ajen Shireman
 *
 * Common <head> for all pages
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>
        <?php 
            if ( isset($pageTitle) ) {
                print "$pageTitle";
            } else {
                print 'CSIT 2530 - Ajen Shireman';
            }
        ?>
    </title>
    
    <!-- normalize.css  -->
    <link rel="stylesheet" href="css/normalize.css" />
    
    <!-- Foundation 5.1.1 -->
    <link rel="stylesheet" href="css/foundation.css" />
    
    <!-- custom styles -->
    <link rel="stylesheet" href="css/styles.css" />
    
    <!--  Foundation 5.1.1 html5 shim -->
    <script src="js/vendor/modernizr.js"></script>
    
</head>
<body>