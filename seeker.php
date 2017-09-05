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


	$tabel = "kalorietabel.csv";

	$file =  fopen( $tabel, "r" );

	// print_r( fgetcsv( $file ) );

	$file = fopen( $tabel ,"r");

	while(! feof($file) )
		{
			$linje = fgetcsv($file);
			$mystring = $linje[0];

			// SEEKING
			$findme   = 'aGURK';
			$pos = stripos($mystring, $findme);

			if ($pos !== false){
				echo "<tr>\n";		
			}
		
				for ($i = 0; $i < 10; $i++){
			

					if ($pos !== false) {
						
						echo "<td>" 
						. $linje[ $i ];
						echo "</td>\n";

					} else {
							 //echo "The string: '$findme' was not found in the string '$mystring'";
					}
				} //

			if ($pos !== false){
				echo "</tr>\n";		
			}


		} // while

	fclose($file);
	?>
</table>

</body>
</html>
