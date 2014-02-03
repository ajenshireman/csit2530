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
    	Courses (Select 5)<br />
    	<div class="form-group">
    	   <label for=inportCourse1">Choice 1: </label>
        	<select name="inputCourse1" class="block">
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
    	   <label for=inportCourse2">Choice 2: </label>
        	<select name="inputCourse1" class="block">
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
    	   <label for=inportCourse3">Choice 3: </label>
        	<select name="inputCourse1" class="block">
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
    	   <label for=inportCourse4">Choice 4: </label>
        	<select name="inputCourse1" class="block">
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
    	   <label for=inportCourse5">Choice 5: </label>
        	<select name="inputCourse1" class="block">
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
	</div>
	<div class="form-group">
    	<label for="inputTimeslots" class="block">Preferred Times (Select at least 1)</label><br />
    	<input type="checkbox" name="inputTimesots" value="8:30-11:30">8:30-11:30<br />
    	<input type="checkbox" name="inputTimesots" value="9:30-11:30">9:30-11:30<br />
    	<input type="checkbox" name="inputTimesots" value="1:00-4:00">1:00-4:00<br />
    	<input type="checkbox" name="inputTimesots" value="4:00-6:00">4:00-6:00<br />
    	<input type="checkbox" name="inputTimesots" value="6:15-9:15">6:15-9:15<br />
    	<input type="checkbox" name="inputTimesots" value="No Fridays">No Fridays
	</div>
	<button type="submit" name="btnSubmit">Submit</button>
</form>
<?php require 'includes/foot.php' ?>
