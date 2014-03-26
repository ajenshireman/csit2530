<?php 
// get category id
$categoryId = $_POST['category_id'];

// Delete the category
require_once 'database.php';
$query = "delete from categories1 where categoryId = $categoryId";
$db->query($query);

// show the category list
require 'category_list.php';
