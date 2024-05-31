

<!doctype html >
<html>
<head>
<title>Product report</title>
<link href="css/reports.css" type="text/css" rel="stylesheet">
</head>
<body>

<a href="offer_report.php"><button class="btn" name="add">Offer Report</button></a>
<?Php
require "config.php";// Database connection

if($stmt = mysqli_query($conn,("SELECT Month,target, sales FROM product_report"))){

  echo "No of records : ".mysqli_num_rows($stmt)."<br>";
$php_data_array = Array(); // create PHP array

//$row2 = mysqli_fetch_array($stmt,MYSQLI_NUM);

  echo "<table>
<tr> <th>Month</th><th>Target</th><th>Sales</th></tr>";
while ($row = mysqli_fetch_row($stmt)) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo mysqli_error();
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
// echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>
<!-- <a href=https://www.plus2net.com/php_tutorial/chart-column-database.php>Column Chart from MySQL database</a> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);   //draw chart 
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Target');
		data.addColumn('number', 'Sale');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1]),parseInt(my_2d[i][2])]);
       var options = {
          title: 'Product sales report',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
		  width:500,
		  height:400
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
	//////
</script>

</body>

</html>







