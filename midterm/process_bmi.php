<?php
  // Midterm BMI processor
  // Author: Sharon Burlingame - March, 2013
  // Modified by:
  // BMI is calculated as weight(in pounds)/ height-squared (in inches) * 703.069
  //                   

  // create short variable names
  $username=trim($_POST['username']);
  $agerange=$_POST['age_range'];
  $height_feet=trim($_POST['height_feet']);
  $height_inches = trim($_POST['height_inches']);
  $weight = trim($_POST['weight']);
 

  if (empty($username)) 
  {
     $error_message = 'Error: A username is required. Please try again.<br/>';
     include('midterm_bmi.php');
     exit();
  }

  // What is this doing?
  if (!get_magic_quotes_gpc())
  {
    $username = addslashes($username);
  }

  // Using the formula specified in the comments at the top of the page,
  // calculate the BMI for this user

  $bmi = '*** under construction ***';

  // Open a file or database to save entered data
  // This code is currently missing
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html>
<head>
  <title>CSIT 2530 BMI Results</title>
  <meta content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
</head>

<body>
  <h2>CSIT 2530 Midterm - BMI Calculator</h2>
<?php
  // Placeholder - just display the entered data
  // Should display the results of the BMI calculation to the user
    echo 'User '.$username.' with current height '.$height_feet.' ft '.
         $height_inches.' inches and weight '.$weight.' lbs <br/> '.
        ' has a BMI of '.$bmi;


    echo  "<br />";

  // Display a weight status message according to the table in the exam instructions 

   
 
?>

<h4>by - Substitute Your Name and the date Here</h4>
</body>
</html>
