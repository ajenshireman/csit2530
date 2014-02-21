<?php
/**
 * coursepicker.php
 * Ajen Shireman
 * CSIT 2530 Lab3 - PartB
 * 19 February 2014
 * 
 * Refinement of form from lab2
 */
?>
<?php require './includes/head.php' ?>
<?php 
if ( isset($errors) ) { 
    $errorMsg = '';
    foreach ( $errors as $error ) {
        $errorMsg.=$error.'\n';
    }
?>
<script>
    alert('<?php echo $errorMsg ?>');
</script>
<?php } ?>
<form action="processpicks.php" method="post">
	<div class="row">
	    <div class="small-12 columns">
	    	<fieldset>
	    	    <legend>Instructor and Course Information</legend>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputName">Name
	    		        <select name="inputName" id="inputName" required="required">
	    		            <option value="David Brown">David Brown</option>
	    		            <option value="Sharon Burlingame">Sharon Burlingame</option>
	    		            <option value="Gitti Negahban">Gitti Negahban</option>
	    		            <option value="Andrey Puretskiy">Andrey Puretskiy</option>
	    		        </select>
	    		    </label>
	    		</div>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputSemester">Semester
	    		        <select name="inputSemester" id="inputSemester" required="required">
	    		            <option value="Summer 2014">Spring 2014</option>
	    		            <option value="Fall 2014">Fall 2014</option>
	    		            <option value="Spring 2015">Spring 2015</option>
	    		        </select>
	    		    </label>
	    		</div>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputNumClasses">Number of Courses
	    		        <select name="inputNumClasses" id="inputNumClasses" required="required">
	    		            <option value ="2">2</option>
	    		            <option value ="3">3</option>
	    		            <option value ="4">4</option>
	    		        </select>
	    		    </label>
	    		</div>
	    		<div class="small-12 medium-6 large-3 columns">
	    		    <label for="inputNumHours">Number of Load Hours (1 to 19)
	    		        <input type="number" min="1" max="19" name="inputNumHours" id="inputNumHours" required="required" />
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
			    	<div class="small-12 columns">
			    		<h6>Please select 5 courses in order from most to least desired</h6>
			    	</div>
			    </div>
			    
	            <div class="row">
	            	<div class="small-12 medium-2 large-1 columns inline">
	            		<label for="inputCourses1">Choice 1:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
	            		<select name="inputCourses[]" id="inputCourses1" required="required">
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
	            		<label for="inputCourses2">Choice 2:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
	            		<select name="inputCourses[]" id="inputCourses2" required="required">
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
	            		<label for="inputCourses3">Choice 3:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
	            		<select name="inputCourses[]" id="inputCourses3" required="required">
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
	            		<label for="inputCourses4">Choice 4:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
	            		<select name="inputCourses[]" id="inputCourses4" required="required">
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
	            		<label for="inputCourses5">Choice 5:</label>
	            	</div>
	            	<div class="small-12 medium-10 large-11 columns">
	            		<select name="inputCourses[]"  id="inputCourses5" required="required">
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
                
    			<div class="small-6 medium-4 large-3 columns">
    				<input type="checkbox" name="inputTimeslots[]" id="inputTimeslots1" value="8:30-11:30"><label for="inputTimeslots1">8:30-11:30</label>
    			</div>
    			<div class="small-6 medium-4 large-3 columns">
    				<input type="checkbox" name="inputTimeslots[]" id="inputTimeslots2" value="9:30-11:30"><label for="inputTimeslots2">9:30-11:30</label>
    			</div>
    			<div class="small-6 medium-4 large-3 columns">
    				<input type="checkbox" name="inputTimeslots[]" id="inputTimeslots3" value="13:00-16:00"><label for="inputTimeslots3">13:00-16:00</label>
    			</div>
    			<div class="small-6 medium-4 large-3 columns">
    				<input type="checkbox" name="inputTimeslots[]" id="inputTimeslots4" value="16:00-18:00"><label for="inputTimeslots4">16:00-18:00</label>
    			</div>
    			<div class="small-6 medium-4 large-3 columns">
    				<input type="checkbox" name="inputTimeslots[]" id="inputTimeslots5" value="18:15-21:15"><label for="inputTimeslots5">18:15-21:15</label>
    			</div>
    			<div class="small-6 medium-4 large-3 columns end">
    				<input type="checkbox" name="inputTimeslots[]" id="inputTimeslots6" value="No Fridays"><label for="inputTimeslots6">No Fridays</label>
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
	        <button class="tiny" type="submit" id="btnClear" name="btnClear">Cancel</button>
	    </div>
	</div>
</form>
<?php require './includes/foot.php' ?>
