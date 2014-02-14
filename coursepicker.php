<?php
/**
 * COURSEPICKER.php
 * Ajen Shireman
 * CSIT 2530 Lab3 - PartB
 * 14 February 2014
 * 
 * Refinement of form from lab2
 */
?>
<?php include './includes/head.php' ?>

<!-- 
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
    	   <label for="inpo]utCourses">Choice 1 </label>
        	<select name="inputCourses[]">
        	    <option value="CSIT 1510 - Introduction to Programming Using Java">CSIT 1510 - Introduction to Programming Using Java</option>
                <option value="CSIT 1520 - Advanced Java Programming">CSIT 1520 - Advanced Java Programming</option>
                <option value="CSIT 1810 - Introduction to Database Design">CSIT 1810 - Introduction to Database Design</option>
                <option value="CSIT 2230 - Introduction to Internet Software Development">CSIT 2230 - Introduction to Internet Software Development</option>
                <option value="CSIT 2530 - Web Database Application Development">CSIT 2530 - Web Database Application Development</option>
                <option value="CSIT 2860 - Machine Organization">CSIT 2860 - Machine Organization</option>
                <option value="CSIT 2280 - Introduction to Scripting Languages">CSIT 2290 - Introduction to Scripting Languages</option>
                <option value="CSIT 2520 - SQL Applications with Oracle">CSIT 2520 - SQL Applications with Oracle</option>
        	</select>
    	</div>
    	<div class="form-group">
    	   <label for="inputCourses">Choice 2 </label>
        	<select name="inputCourses[]">
        	    <option value="CSIT 1510 - Introduction to Programming Using Java">CSIT 1510 - Introduction to Programming Using Java</option>
                <option value="CSIT 1520 - Advanced Java Programming">CSIT 1520 - Advanced Java Programming</option>
                <option value="CSIT 1810 - Introduction to Database Design">CSIT 1810 - Introduction to Database Design</option>
                <option value="CSIT 2230 - Introduction to Internet Software Development">CSIT 2230 - Introduction to Internet Software Development</option>
                <option value="CSIT 2530 - Web Database Application Development">CSIT 2530 - Web Database Application Development</option>
                <option value="CSIT 2860 - Machine Organization">CSIT 2860 - Machine Organization</option>
                <option value="CSIT 2280 - Introduction to Scripting Languages">CSIT 2290 - Introduction to Scripting Languages</option>
                <option value="CSIT 2520 - SQL Applications with Oracle">CSIT 2520 - SQL Applications with Oracle</option>
        	</select>
    	</div>
    	<div class="form-group">
    	   <label for="inputCourses">Choice 3 </label>
        	<select name="inputCourses[]">
        	    <option value="CSIT 1510 - Introduction to Programming Using Java">CSIT 1510 - Introduction to Programming Using Java</option>
                <option value="CSIT 1520 - Advanced Java Programming">CSIT 1520 - Advanced Java Programming</option>
                <option value="CSIT 1810 - Introduction to Database Design">CSIT 1810 - Introduction to Database Design</option>
                <option value="CSIT 2230 - Introduction to Internet Software Development">CSIT 2230 - Introduction to Internet Software Development</option>
                <option value="CSIT 2530 - Web Database Application Development">CSIT 2530 - Web Database Application Development</option>
                <option value="CSIT 2860 - Machine Organization">CSIT 2860 - Machine Organization</option>
                <option value="CSIT 2280 - Introduction to Scripting Languages">CSIT 2290 - Introduction to Scripting Languages</option>
                <option value="CSIT 2520 - SQL Applications with Oracle">CSIT 2520 - SQL Applications with Oracle</option>
        	</select>
    	</div>
    	<div class="form-group">
    	   <label for="inputCourses">Choice 4 </label>
        	<select name="inputCourses[]">
        	    <option value="CSIT 1510 - Introduction to Programming Using Java">CSIT 1510 - Introduction to Programming Using Java</option>
                <option value="CSIT 1520 - Advanced Java Programming">CSIT 1520 - Advanced Java Programming</option>
                <option value="CSIT 1810 - Introduction to Database Design">CSIT 1810 - Introduction to Database Design</option>
                <option value="CSIT 2230 - Introduction to Internet Software Development">CSIT 2230 - Introduction to Internet Software Development</option>
                <option value="CSIT 2530 - Web Database Application Development">CSIT 2530 - Web Database Application Development</option>
                <option value="CSIT 2860 - Machine Organization">CSIT 2860 - Machine Organization</option>
                <option value="CSIT 2280 - Introduction to Scripting Languages">CSIT 2290 - Introduction to Scripting Languages</option>
                <option value="CSIT 2520 - SQL Applications with Oracle">CSIT 2520 - SQL Applications with Oracle</option>
        	</select>
    	</div>
    	<div class="form-group">
    	   <label for="inputCourse">Choice 5 </label>
        	<select name="inputCourses[]">
        	    <option value="CSIT 1510 - Introduction to Programming Using Java">CSIT 1510 - Introduction to Programming Using Java</option>
                <option value="CSIT 1520 - Advanced Java Programming">CSIT 1520 - Advanced Java Programming</option>
                <option value="CSIT 1810 - Introduction to Database Design">CSIT 1810 - Introduction to Database Design</option>
                <option value="CSIT 2230 - Introduction to Internet Software Development">CSIT 2230 - Introduction to Internet Software Development</option>
                <option value="CSIT 2530 - Web Database Application Development">CSIT 2530 - Web Database Application Development</option>
                <option value="CSIT 2860 - Machine Organization">CSIT 2860 - Machine Organization</option>
                <option value="CSIT 2280 - Introduction to Scripting Languages">CSIT 2290 - Introduction to Scripting Languages</option>
                <option value="CSIT 2520 - SQL Applications with Oracle">CSIT 2520 - SQL Applications with Oracle</option>
        	</select>
    	</div>
	</div>
	<div class="form-group">
    	<label for="inputTimeslots" class="block">Preferred Times (Select at least 1)</label>
    	<span class="block"><input type="checkbox" name="inputTimeslots[]" value="8:30-11:30"> 8:30-11:30</span>
    	<span class="block"><input type="checkbox" name="inputTimeslots[]" value="9:30-11:30"> 9:30-11:30</span>
    	<span class="block"><input type="checkbox" name="inputTimeslots[]" value="1:00-4:00"> 1:00-4:00</span>
    	<span class="block"><input type="checkbox" name="inputTimeslots[]" value="4:00-6:00"> 4:00-6:00</span>
    	<span class="block"><input type="checkbox" name="inputTimeslots[]" value="6:15-9:15"> 6:15-9:15</span>
    	<span class="block"><input type="checkbox" name="inputTimeslots[]" value="No Fridays"> No Fridays</span>
	</div>
	<button type="submit" name="btnSubmit">Submit</button>
</form>
-->
<?php include './includes/foot.php' ?>
