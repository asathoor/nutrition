# Data

* [Data Gov](https://catalog.data.gov/dataset) 195.000+ 

## What is CSV?

* [CSV format](https://www.csvreader.com/csv_format.php)
* CSV (comma separated values)
* Alternative: TSV (tab separated values)

# PHP and CSV

So far this repo is research for a PHP class about .csv and data.

In this sample an Excel spreadsheet is converted to a CSV-file.

* Source of the Danish csv table: [Regneark.dk](http://www.excel-regneark.dk/?pageIDX=258)
* Source of the US csv table: [Download the Spreadsheet from data.gov](https://catalog.data.gov/dataset/mypyramid-food-raw-data-f9ed6)
* The original spreadsheet from is modified to a simpler form.

# Learning Objectives

Get started: register some data about yourself over a week or so.
If you run save data about it.

## Beginning

1. Import CSV.
2. Loop out data (for, while)
3. Format HTML (markup).
4. Conditional (if else).
5. Simple calculations.

## Advanced: Data visualization

You can visualize your data in many ways, e.g. by google charts. In general they are made by JavaScript. However, you can add values via PHP.

* [Google Charts](https://developers.google.com/chart/interactive/docs/gallery)
* [CanvasJS Charts](https://canvasjs.com/html5-javascript-pie-chart/)

Here is a small sample from the file dagbog-chart.php where PHP variables are inserted:

~~~~
function drawBarColors() {
      var data = google.visualization.arrayToDataTable([
        ['Today', 'Max Energy', 'Energy Used'],
        [ 'Today', <?php echo $ration; ?>, <?php echo $kcal; ?>],
      ]);
~~~~


