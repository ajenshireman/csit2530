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
<form action="">
	<div class="row">
	    <div class="small-12 columns">
	    	<fieldset>
	    	    <legend>Instructor and Course Information</legend>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputName">Name
	    		        <select name="inputName">
	    		            <option value="David Brown">David Brown</option>
	    		            <option value="Sharon Burlingame">Sharon Burlingame</option>
	    		            <option value="Gitti Negahban">Gitti Negahban</option>
	    		            <option value="Andrey Puretskiy">Andrey Puretskiy</option>
	    		        </select>
	    		    </label>
	    		</div>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputSemester">Semester
	    		        <select name="inputSemester">
	    		            <option value="Summer 2014">Spring 2014</option>
	    		            <option value="Fall 2014">Fall 2014</option>
	    		            <option value="Spring 2015">Spring 2015</option>
	    		        </select>
	    		    </label>
	    		</div>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputNumClases">Number of Courses
	    		        <select name="inputNumClasses">
	    		            <option value ="2">2</option>
	    		            <option value ="3">3</option>
	    		            <option value ="4">4</option>
	    		        </select>
	    		    </label>
	    		</div>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputNumHours">Number of Hours
	    		        <input type="text" name="inputNumHours" size="5" />
	    		    </label>
	    		</div>
	    	</fieldset>
	    </div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<fieldset>
			    <legend>Desired Courses</legend>
			    
	            <div class="row">
	            	<div class="small-12 medium-2 large-1 columns inline">
	            		<label for="inputCourses">Choice 1:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
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
	            
	            <div class="row">
	            	<div class="small-12 medium-2 large-1 columns inline">
	            		<label for="inputCourses">Choice 2:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
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
	            
	            <div class="row">
	            	<div class="small-12 medium-2 large-1 columns inline">
	            		<label for="inputCourses">Choice 3:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
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
	            
	            <div class="row">
	            	<div class="small-12 medium-2 large-1 columns inline">
	            		<label for="inputCourses">Choice 4:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
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
	            
	            <div class="row">
	            	<div class="small-12medium-2 large-1 columns inline">
	            		<label for="inputCourses">Choice 5:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
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
	            
			</fieldset>
		</div>
	</div>
	<div class="row">
	    <div class="small-12 columns">
	    	<fieldset>
	    	    <legend>Preferred Times (Select at least 1)</legend>
	    		<div class="small-12 columns">
	    			<div class="small-6 medium-3 columns">
	    				<input type="checkbox" name="inputTimeslots[]" value="8:30-11:30"><label for="">8:30-11:30</label>
	    			</div>
	    			<div class="small-6 medium-3 columns">
	    				<input type="checkbox" name="inputTimeslots[]" value="9:30-11:30"><label for="">9:30-11:30</label>
	    			</div>
	    			<div class="small-6 medium-3 columns">
	    				<input type="checkbox" name="inputTimeslots[]" value="1:00-4:00"><label for="">1:00-4:00</label>
	    			</div>
	    			<div class="small-6 medium-3 columns">
	    				<input type="checkbox" name="inputTimeslots[]" value="4:00-6:00"><label for="">4:00-6:00</label>
	    			</div>
	    			<div class="small-6 medium-3 columns">
	    				<input type="checkbox" name="inputTimeslots[]" value="6:15-9:15"><label for="">6:15-9:15</label>
	    			</div>
	    			<div class="small-6 medium-3 columns end">
	    				<input type="checkbox" name="inputTimeslots[]" value="No Fridays"><label for="">No Fridays</label>
	    			</div>
	    		</div>
	    	</fieldset>
	    </div>
	</div>
	<div class="row">
        <div class="small-12 columns">
            <fieldset>
                <legend>Notes</legend>
                <textarea name="notes"></textarea>
            </fieldset>
        </div>
    </div>
	<div class="row">
	    <div class="small-12 columns">
	        <button class="tiny" type="submit" name="btnSubmit">Submit</button>
	        <button class="tiny" type="submit" name="btnClear">Cancel</button>
	    </div>
	</div>
</form>
<?php include './includes/foot.php' ?>
