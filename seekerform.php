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
		<title>Kalorietabel</title>
		<style>
			td, th {
				border: 1px solid silver;
				padding: 0.2em;
			}
			form {
				margin-top: 2em;
				margin-bottom: 2em;			
			}
	</style>
</head>


	<form action="" method="get" enctype="multipart/form-data">
		<fieldset>
		<legend> Hvad indeholder det jeg spiser? </legend>
		<label>Søg </label><input type="text" name="what" value="">
		<button name="submit" value="submit" type="submit">Submit</button>
		<button name="cancel" value="cancel">Cancel</button>
	
		</fieldset>
	</form>
	
	<!-- result -->
	<?php
	function finder( $word ){
		echo "<table>";	
		
		// open csv
		$tabel = "kalorietabel.csv";
		$file =  fopen( $tabel, "r" );
	
		// table headers
		$tabHead = fgetcsv($file);
	
		for ($n = 0; $n < 10; $n++){
			echo "<th>"
			. $tabHead[$n]
			. "</th>";
		}
	
		// search and loop out
		while(! feof($file) )
			{
				$linje = fgetcsv($file);
				$mystring = $linje[0];
	
				// Seeking in the string
				$pos = stripos($mystring, $word);
	
				if ($pos !== false){
					echo "<tr>\n";		
		
					for ($i = 0; $i < 10; $i++){
						
							echo "<td>" 
							. $linje[ $i ];
							echo "</td>\n";
	
						}
					} // for
	
					echo "</tr>\n";
	
			} // while
	
		fclose($file);
		
		echo "</table>";
	}
	
	// find a word
	if( isset($_GET['submit'])  ) {
		finder( $_GET['what'] );
	}
	
	include_once "sidebar.php";
	?>

</body>
</html>
