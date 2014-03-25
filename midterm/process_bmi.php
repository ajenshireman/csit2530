<?php
  // Midterm BMI processor
  // Author: Sharon Burlingame - March, 2013
  // Modified by:
  // BMI is calculated as weight(in pounds)/ height-squared (in inches) * 703.069
  //                   

  /* Constants */
  define (CONVERSION_FACTOR, 703.069);
  
  // create short variable names
  $username=trim($_POST['username']);
  $agerange=$_POST['age_range'];
  $gender = $_POST['gender'];
  $height_feet=trim($_POST['height_feet']);
  $height_inches = trim($_POST['height_inches']);
  $weight = trim($_POST['weight']);
 
  $error_message = '';
  if (empty($username)) 
  {
     $error_message .= 'Error: A username is required. Please try again.<br/>';
  }
  
  if ( empty($gender) ) {
      $error_message .= 'Error: A gender is required.<br />';
  }
  
  if ( !empty($error_message) ) {
      include('midterm_bmi.php');
      exit();
  }
  
  // What is this doing?
  /*
   * added sashes before characters that need to be escaped
   * this helps prevent sql injection by changing ' into \' and " into \" 
   * it as changes returns to  \n but this is not as critical
   */
  if (!get_magic_quotes_gpc())
  {
    $username = addslashes($username);
  }

  // Using the formula specified in the comments at the top of the page,
  // calculate the BMI for this user
  
  $heigh_in_inches = $height_feet * 12;
  $height_in_inches = $heigh_in_inches + $height_inches;
  $bmi = ( $weight / pow($height_in_inches, 2) ) * CONVERSION_FACTOR;

  // Open a file or database to save entered data
  // This code is currently missing
?>

<?php require 'head.php' ?>

<body>
  <h2>CSIT 2530 Midterm - BMI Calculator</h2>
<?php
  // Placeholder - just display the entered data
  // Should display the results of the BMI calculation to the user
    echo 'User '.$username.' who is '.$gender.' with current height '.$height_feet.' ft '.
         $height_inches.' inches and weight '.$weight.' lbs <br/> '.
        ' has a BMI of '.$bmi;


    echo  "<br />";

  // Display a weight status message according to the table in the exam instructions 

   
 
?>

<?php require 'foot.php' ?>
