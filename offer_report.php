<!doctype html>
<html>
<head>
<title>Offer Report</title>
<link href="css/reports.css" type="text/css" rel="stylesheet">
</head>
<body >
<a href="product_report.php"><button class="btn" name="add">Product Reports</button></a>

<?Php
require "config.php";// Database connection

if($stmt = mysqli_query($conn,("SELECT offer_name, sales FROM offer_report"))){

  echo "No of records : ". mysqli_num_rows($stmt) ."<br>";
$php_data_array = Array(); // create PHP array
  echo "<table>
<tr> <th>Offer</th><th>Sales</th></tr>";
while ($row = mysqli_fetch_row($stmt)) {
   echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
   
   $php_data_array[] = $row; // Adding to array
   }
   echo "</table>";
}else{
echo "somethimg went wrong" . mysqli_error();
}

echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>
<div style="position:relative;width:100%">
        <div id="chart_div" style="position:absolute;right:0px;top:100px;width: 400px; height: 300px;"></div>
    </div>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'offer_name');
        data.addColumn('number', 'sales');
		for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'Offers Performance of the month',
                       width:600,
                       height:500};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>
</html>







