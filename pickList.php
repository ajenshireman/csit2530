<?php
/**
 * picklist.php
 * Ajen Shireman
 * CSIT 2530 Lab2 - PartB
 * 31 January 2014
 * 
 * Simple form to allow instructors to select which courses they want to teach.
 */
?>
<?php require 'includes/head.php' ?>
<form role="form" id="classSelectionForm" method="post" action="pickProcessor.php">
    <div class="form-group">
        <label for="inputName">Name</label>
        <select name="inputName">
            <option value="David Brown">David Brown</option>
            <option value="Sharon Burlingame">Sharon Burlingame</option>
            <option value="Gitti Negahban">Gitti Negahban</option>
            <option value="Andrey Puretskiy">Andrey Puretskiy</option>
        </select>
    </div>
    <div class="form-group">
        <label for="inputSemester">Semester</label>
        <select name="inputSemester">
            <option value="Spring 2014">Spring 2014</option>
            <option value="Fall 2014">Fall 2014</option>
        </select>
    </div>
    <div class="form-group">
        <label for="inputNumClasses">Number of Courses</label>
        <input type="radio" name="inputNumClasses" value ="2" /> 2
        <input type="radio" name="inputNumClasses" value ="3" /> 3
        <input type="radio" name="inputNumClasses" value ="4" /> 4
    </div>
    <div class="form-group">
        <label for="inputNumHours">Number of Hours</label>
        <input type="text" name="inputNumHours" size="5" />
    </div>
	<div class="form-group">
    	<label for="inputCourses" class="block">Courses (Select 5)</label>
    	<select multiple name="inputCourses[]" size="9" class="block">
    	    <option value="CSIT 1510 P01">CSIT 1510 P01</option>
            <option value="CSIT 1520 P02">CSIT 1520 P02</option>
            <option value="CSIT 1810 P01">CSIT 1810 P01</option>
            <option value="CSIT 2230 PC1">CSIT 2230 PC1</option>
            <option value="CSIT 2530 P01">CSIT 2530 P01</option>
            <option value="CSIT 2860 PC1">CSIT 2860 PC1</option>
            <option value="CSIT 2290 P01">CSIT 2290 P01</option>
            <option value="CSIT 2520 P01">CSIT 2520 P01</option>
    	</select>
	</div>

	<div class="form-group">
    	<label for="inputTimeslots" class="block">Preferred Times (Select at least 1)</label>
    	<select multiple name="inputTimeslots[]" size="7" class="block">
    	    <option value="8:30-11:30">8:30-11:30</option>
    	    <option value="9:30-11:30">9:30-11:30</option>
    	    <option value="1:00-4:00">1:00-4:00</option>
    	    <option value="4:00-6:00">4:00-6:00</option>
    	    <option value="6:15-9:15">6:15-9:15</option>
    	    <option value="No Fridays">No Fridays</option>
    	</select>
	</div>
	<button type="submit" name="btnSubmit">Submit</button>
</form>
<?php require 'includes/foot.php' ?>
