<?php
/**
 * file: madDagbog.php
 * purpose: research
 * date: 20170906
 **/
$title = "Nutrition Diary"; // used by header.php
$kcal = 0;
$ration = 1980; // 2000 - 10%.

$idag = date("Y-m-d"); // 2017-09-11

include_once "header.php";
?>

<!-- read the file -->
<table>
	<!-- follow the csv columns -->
	<tr>
		<th> Dato  </th>
		<th> Hvad </th>
		<th> Gram </th>
		<th> Kcal </th>
	</tr>

	<!-- READ data -->
	<?php
	$file = fopen("madDagbog.csv","r");
	
	// print content
	while( ! feof($file) )
	  {
		$row = fgetcsv($file);
		
		if( $idag === $row[0] ) {
			$kcal = $kcal + $row[3]; // only count today
		}
	  
	  	echo "<tr>";
	  	
		for($i=0; $i < count($row) ; $i++) {  	
			echo "\t<td>" .  $row[$i] . "</td>" . PHP_EOL;
			}
	
		echo "</tr>" 
		. PHP_EOL 
		. PHP_EOL;
	  }
	
	fclose($file);
	?>
</table>

<h2>Today</h2>
<?php 
// prepare visual response
echo "<p>Calories today:<strong> " 
. $kcal 
. "</strong>  (" 
. $idag 
.").</p>"; 

if($kcal > $ration) {
	echo "<div class='sad'>:-(</div>";
}
else {
	echo "<div class='happy'>:-)</div>";
}
?>

<?php include_once "footer.php"; ?>