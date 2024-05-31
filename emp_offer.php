
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1><u>Promotions</u></h1>
    
     <header>
    <nav class="navbar">
        <ul>
        <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="#">About</a></li> -->
            <li><a href="FAQs Page(customers).php">FAQs</a></li>
            <li><a href="profiles.php">Customer Profiles</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="complaints.php"> Complaints</a></li>
            <li><a href="data.php"> Customer Data</a></li>
            <li><a href="target_data.php"> Target customers</a></li>
            <li><a href="emp_offer.php" class="active">Offers</a></li>
            <li><a href="employee page.php" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   
    <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search offer..">
    <br>
    <table class="container">
	
   <tr>
   <th>Id</th>
       <th>Title</th>
       <th>Product Category</th>
       <th>Details</th>
       <th>Start Date</th>
       <th>Due Date</th>
	  
      
       
      
   </tr>
   <?php
	require_once "config.php";
    error_reporting(0);
	$sql = "SELECT id, title, product_type, details, start,due FROM offers ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
			
        echo"<tr class='element'><td>" . $id . "</td>
       <td>" . $row['title'] . "</td> 
       <td>" .  $row['product_type'] . "</td> 
       <td>" .  $row['details'] . "</td>
       <td>" .  $row['start'] . "</td>
       <td>" .  $row['due'] .  "</td>
       
      
     
    </tr>";
    

	
}}
 else{
	echo "something went wrong.";
}
		


?> 

<script>

        </script>  
 <script src="js/search.js"></script>    

 </table>
</body>
</html>
   