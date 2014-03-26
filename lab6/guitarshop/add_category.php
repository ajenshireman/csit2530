<?php 
//Get category info
$categoryName = $_POST['name'];

// Vaidate
if ( empty($categoryName) ) {
    $error = "Please enter a category name.";
    require('error.php');
} else {
    require_once 'database.php';
    $query = "insert into categories1 (categoryName) values ( '$categoryName' )";
    $db->query($query);
    
    // Display the category list
    require 'category_list.php';
}
