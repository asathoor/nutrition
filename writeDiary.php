<?php
/**
 * file: writeDiary.php
 * purpose: add entry to a .csv file
 **/
 
$title = "Nutrition: Write Diary";
include_once "header.php";
?>

<h1><?php echo $title; ?></h1>

<form action="#" method="get" enctype="multipart/form-data">
	<fieldset>
		<legend>What did you eat?</legend>
		<label> Date </label> <input type="date" name="date"><br>
		<label> Food </label> <input type="text" name="food"><br>	
		<label> Gram / dl </label> <input type="text" name="amount"><br>
		<label> Calories </label> <input type="text" name="calories"><br>
		<button name="submit" value="save" type="submit">Save</button>
		<button name="Cancel" value="cancel" type="reset">Cancel</button>			
	</fieldset>
</form>

<?php include_once "footer.php"; 

/**
 * Write to the file
 **/
$filename = "data.csv";
$mode = "a+";
 
if (isset($_GET['submit']) ){
	$text = $_GET['date'] 
	. ","
	. $_GET['food']
	. ","
	. $_GET['amount']
	. ","
	. $_GET['calories']
	. PHP_EOL;

	//echo $text; // test
	
	$myfile = fopen( $filename, "a+");
	
	if(! $myfile) {
		echo "I could not open the file.";
	}
	else {
		if ( fwrite($myfile, $text) ) {
			echo "Data saved to " . $filename . ": " . $text;
			}
	}
}

?>