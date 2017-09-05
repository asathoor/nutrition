<?php
/**
 * file: csv-test.php
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

</style>


</head>
<table>

<?php
// search word
$findme   = 'aGURK';

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

		// SEEKING
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
						 //echo "Not found"
				} // else
			} // for

		if ($pos !== false){
			echo "</tr>\n";
		}


	} // while

fclose($file);
?>
</table>

</body>
</html>
