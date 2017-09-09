<?php
/**
 * file: madDagbog.php
 * purpose: research
 * date: 20170906
 **/
$title = "Track Calories"; // used by header.php
$file = fopen("madDagbog.csv","r");
$kcal = 0;
$ration = 1980; // 2000 - 10%.

$idag = date("Y-m-d"); // 2017-09-11

include_once "header.php";
?>

<!-- read the file -->
<table style="width: 80%; margin-left: auto; margin-right: auto;max-width: 600px">
	<caption> <?php echo $title; ?> </caption>

	<!-- summary chart -->
	<tr>
		<td colspan="4">
			<div id="chart_div"></div>
		</td>
	</tr>

	<!-- follow the csv columns -->
	<tr>
		<!-- th> Date  </th -->
		<th> Food </th>
		<th> Gr. </th>
		<th> Cal. </th>
	</tr>

	<!-- READ the csv data -->
	<?php

	// print content
	while( ! feof($file) )
	  {
		$row = fgetcsv($file);
		
		// only print today's rows
		if( $idag === $row[0] ) {
			$kcal = $kcal + $row[3]; // only count today
		
	  
	  		echo "<tr>";
	  	
			for($i=1; $i < count($row) ; $i++) {
				// print rows but don't print blank rows
				if($row[$i] > "" ) {  	
					echo "\t<td>" .  $row[$i] . "</td>" . PHP_EOL;
					}
				}
		
			echo "</tr>" 
			. PHP_EOL 
			. PHP_EOL;
		}
	  }
	
	fclose($file);
	?>
	
</table>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
/**
 * Simple Data Visualization
 * Google Chart
 * Based on: https://jsfiddle.net/api/post/library/pure/
 *
 * CSV data added via PHP.
 **/
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBarColors);

function drawBarColors() {
      var data = google.visualization.arrayToDataTable([
        ['Today', 'Max Energy', 'Energy Used'],
        [ 'Today', <?php echo $ration; ?>, <?php echo $kcal; ?>],
      ]);

      var options = {
        title: 'Summary: <?php echo $idag; ?>',
        chartArea: {width: '50%'},
        colors: ['#993300', '#330099'],
        hAxis: {
          title: 'Cal.',
          minValue: 0
        },
        vAxis: {
          title: '<?php echo $idag; ?>'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>  

<?php include_once "footer.php"; ?>