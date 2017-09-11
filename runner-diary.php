<html>
<head>

<style>
	#getData label {
		padding-left:26px;
    width:4em;
    text-transform: uppercase;
    display:inline-block;
    margin-bottom: .3em;	
	}

</style>

</head>

<!-- User input -->
<form id="getData" action="#" method="get" enctype="multipart/form-data">
	<fieldset>
		<legend>Enter data here</legend>
		
		<label>Name</label> <input type="text" name="name" size="30" required><br>
		<label>Date</label>  <input type="date" name="date" size="30" required><br>
		<label>Route</label>  <input type="text" name="route" size="30" required><br>
		<label>Km.</label>  <input type="number" name="km" size="30" required><br>
		<label>Time</label>  <input type="text" name="time" size="30" required><br>
		<label>Notes</label>  <input type="text" name="notes" size="30" required><br>
		
		<!-- submit -->
		<div>
		<button name="submit" value="submit" type="submit">Submit</button>
		<button name="cancel" value="cancel" type="reset">Cancel</button>
		</div>
	
	</fieldset>
</form>
</html>

<?php
/**
 * Format a CSV row
 **/
$file = "runner.csv"; // the file name

// will create a comma separated string 
$input = "'" 
	. $_GET['name'] 
	. "','" 
	. $_GET['date'] 
	. "','" 
	. $_GET['route']
	. "',"
	. $_GET['km']
	. ",'"
	. $_GET['time']
	. "','"
	. $_GET['notes']
	. "'"
	. PHP_EOL; // the input from the form 

/**
 * SAVE the user input
 **/
if( isset( $_GET['submit'] ) ) {
	file_put_contents(
		$file,
		$input, 
		FILE_APPEND);
}

/**
 * READ some of the data
 **/
?>
