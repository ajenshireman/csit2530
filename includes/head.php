<?php
/**
 * head.php
 * Author: Ajen Shireman
 *
 * Common <head> for all pages
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
    <title>
        <?php 
            if ( isset($pageTitle) ) {
                print "$pageTitle";
            } else {
                print 'CSIT 5330 - Ajen Shireman';
            }
        ?>
    </title>
    
    <!-- normalize.css  -->
    <link rel="stylesheet" href="css/normalize.css" />
    
    <!-- custom styles -->
    <link rel="stylesheet" href="css/styles.css" />
    
</head>
<body>