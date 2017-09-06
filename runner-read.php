<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kalorietabel</title>

<style>

td {
	border: 1px solid silver;
	padding: 0.2em;
}

</style>


</head>

<table>
	<?php
	/**
	 * file: csv-test.php
	 * purpose: try out csv
	 **/

	$tabel = "runner.csv";

	$file =  fopen( $tabel, "r" );

	// print_r( fgetcsv( $file ) );

	$file = fopen( $tabel ,"r");

	while( ! feof($file) )
		{
			$linje = fgetcsv($file);
		
			echo "<tr>\n";		

				for ($i = 0; $i < 5; $i++){
					echo "<td>" . $linje[ $i ] . "</td>\n";
				}

			echo "</tr>\n\n";

		}

	fclose($file);
	?>
</table>

</body>
</html>
