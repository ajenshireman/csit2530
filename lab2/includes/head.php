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
<html lang="en">
<head>
    <meta charset="utf-8" />
    
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
    <link rel="stylesheet" href="css/normalize.css" /
    
    <!-- custom styles -->
    <link rel="stylesheet" href="css/styles.css" />
    
</head>
<body>