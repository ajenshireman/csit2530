<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml-transitional.dtd">
<html>
<head>
  <title>CSIT 2530 BMI Calculator</title>
  <meta content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
</head>

<body>
  <h2>CSIT 2530 Midterm - BMI Calculator</h2>
  <?php
     if (!empty($error_message))
     {
        echo $error_message,'<br/>'; 
     }
  ?>

  <form action="http://ps11.pstcc.edu/~sburlingame/process_bmi.php" method="post">
    Enter your username (e.g. omcdonald@farm.gov): 
        <input name="username" type="text" size="60"/>
    <br /><br />
    Choose Age Range: 
    &nbsp;&nbsp;<select name="age_range">
      <option value="age18_24">18-24
      <option value="age25_34" selected="selected">25_34
      <option value="age35_49">35-49
      <option value="age50_64">50-64
      <option value="age65plus">old geezer
    </select>
    <br /><br />
    Enter your height and weight<br />
    HEIGHT <input name="height_feet" type="text" size="1"/> FT
          <input name="height_inches" type="text" size="2"/> INCHES
    <br />WEIGHT
    <input name="weight" type="text" size="3"/> LBS
    <br /><br />
    <input type="submit" name="submit" value="Calculate BMI"/>
  </form>

  <h4>by - Substitute Your Name and the date Here</h4>

</body>
</html>

