<?php
/**
 * file: seeker_form.php
 * purpose: try out csv
 **/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nutrition</title>
		<style>
			body {
				font-family: sans-serif;			
			}
			td, th {
				border: 1px solid silver;
				padding: 0.2em;
				font-size: small;
			}
			tr:hover {
				background-color: silver;			
			}
			td:hover{
				background-color: limegreen;			
			}
			form {
				margin-top: 2em;
				margin-bottom: 2em;			
			}
	</style>
</head>

	<!-- the search form -->
	<form action="" method="get" enctype="multipart/form-data">
		<fieldset>
		<legend> What's in my food? </legend>
		<label>Seek </label><input type="text" name="what" value="">
		<button name="submit" value="submit" type="submit">Submit</button>
		<button name="cancel" value="cancel">Cancel</button>
	
		</fieldset>
	</form>
	
	<!-- result -->
	<?php
	// radio button selectors
	function radio_btn( $name, $value ){
		?>
		<!-- from: radio_btn -->
		<form action="#" method="get" enctype="multipart/form-data">
			<input type="radio" name="<?php echo $name; ?>" value="<?php echo $value; ?>">
			<button name="radioSubmit" value="radioSubmit" type="submit">Select</button>		
		</form>	
		
		<?php
	}	
	
	// find a word
	function finder( $word ){
		echo "<table>";	
		
		// open csv
		$tabel = "Food_Display_Table.csv";
		$file =  fopen( $tabel, "r" );
		$col = 25;
	
		// table headers
		$tabHead = fgetcsv($file);
	
		for ($n = 0; $n < $col; $n++){
			echo "<th>"
			. $tabHead[$n]
			. "</th>";
		}
	
		// search and loop out
		while(! feof($file) )
			{
				$linje = fgetcsv($file);
				$mystring = $linje[1]; // column B Display_Name
	
				// Seeking in the string
				$pos = stripos($mystring, $word);
	
				if ($pos !== false){
					echo "<tr>\n";		
		
					for ($i = 0; $i < $col; $i++){
						
							echo "<td>" 
							. $linje[ $i ];
							echo "</td>\n";
	
						}
					} // for
	
					echo "</tr>\n";
	
			} // while
	
		fclose($file);
		
		echo "</table>";
		echo "<footer> Based on: "
		. $tabel 
		. "</footer>";
	}
	
	// find a word
	if( isset($_GET['submit'])  ) {
		finder( $_GET['what'] );
	}
	?>

</body>
</html>
