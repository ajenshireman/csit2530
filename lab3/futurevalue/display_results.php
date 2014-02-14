<?php
/**
 * display_results.php
 * Ajen Shireman
 * CSIT 2530 Lab3
 * 14 February 2014
 *
 * Results page for app to calulate future value of an investment
 * This file was provided as by the textbook authors as a started file
 * Enhancements:
 *  If the clear button was pressed, unset POST variables and return the user to the index
 *  Added check for upper limit on investment_rate
 *  Added chack for upper and lower limit on years
 *  Added date to the bottom of the page
 */

    // If the user pressed 'cancel' clear the form
    if ( isset($_POST['cancel']) ) {
        // unset the POST variables
        unset($_POST['investmen']);
        unset($_POST['interest_rate']);
        unset($_POST['years']);
        // return user to the index
        header('Location: index.php');
    }
    
    // get the data from the form
    $investment = $_POST['investment'];
    $interest_rate = $_POST['interest_rate'];
    $years = $_POST['years'];

    // Set the timezone in which are running this application
    date_default_timezone_set('America/New_York');


    // validate investment entry
    if ( empty($investment) ) {
        $error_message = 'Investment is a required field.'; }
    else if ( !is_numeric($investment) )  {
        $error_message = 'Investment must be a valid number.'; }
    else if ( $investment <= 0 ) {
        $error_message = 'Investment must be greater than zero.'; }

    // validate interest rate entry
    else if ( empty($interest_rate) ) {
        $error_message = 'Interest rate is a required field.'; }
    else if ( !is_numeric($interest_rate) )  {
        $error_message = 'Interest rate must be a valid number.'; }
    else if ( $interest_rate <= 0 || $interest_rate > 15) {
        $error_message = 'Interest rate must be greater than zero and less than or equal to 15.'; }
    
    // validate year entry
    else if ( !isset($years) ) {
        $error_message = 'Years is a required field.'; }
    else if ( !is_numeric($years) )  {
        $error_message = 'Years must be a valid number.'; }
    else if ( $years < 0 || $years >50) {
        $error_message = 'Years must be between zero and 50 (inclusive).'; }

    // set error message to empty string if no invalid entries
    else {
        $error_message = ''; }

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit();
    }

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = ($future_value + ($future_value * $interest_rate *.01));
    }
    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <div id="content">
        <h1>Ajen Shireman's Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br />

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br />

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br />

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br />
    </div>
    <div id="timestamp">
        This calculation was produced on <?php echo date('Y-m-d') ?>
    </div>
</body>
</html>