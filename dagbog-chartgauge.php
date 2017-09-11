<?php
/**
 * file: madDagbog.php
 * purpose: research
 * date: 20170906
 **/
$title = "Gauge: Track Calories"; // used by header.php
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

	<tr>
		<td> <strong>Calories left</strong> </td><td colspan="2"> <strong> <?php echo $ration - $kcal; ?> </strong> </td>
	<tr>	
	
</table>

<!-- Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
/**
 * Simple Data Visualization
 * Google Chart
 * Based on: the Gauge sample
 *
 * CSV data added via PHP.
 **/
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      	
      	var pctCal = 100 / <?php echo $ration ?>;
      	var eatenCal = pctCal * <?php echo $kcal; ?>;

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Cal.', Math.round( eatenCal ) ],
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

				/*
        * Drop timed value
        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
				*/
      }
</script>  

<?php include_once "footer.php"; ?>