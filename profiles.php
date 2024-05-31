
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>

<body>
    
    <style>
		#searchbar{
			position: absolute;
            top:18%;
			left: 4%;
			padding:15px;
			border-radius: 10px;
		  }
        </style>
      <header>
    <nav class="navbar">
        <ul>
        <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="#">About</a></li> -->
            <li><a href="FAQs Page(customers).php">FAQs</a></li>
            <li><a href="profiles.php" class="active">Customer Profiles</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="complaints.php"> Complaints</a></li>
            <li><a href="data.php"> Customer Data</a></li>
            <li><a href="target_data.php"> Target customers</a></li>
            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="#" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
    <h1>Customer Data</h1>
  
    
    <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search customer..">
    <br>
    <table class="container">
	
   <tr>
       <th>Customer Id</th>
       <th>E-mail</th>
       <th>Full Name</th>
       <th>Phone No.</th>
       <th>Gender</th>
	   <th>Age</th>
       <th>Address</th>
       
       <th>State</th>
       <th>Photo</th>
       
   </tr>
   <?php
    require_once "config.php";
    $sql = "SELECT * FROM customer_profile";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
             
                
        echo"<tr class='element'><td>" . $row['id'] . "</td>
       <td>" . $row['email'] . "</td> 
       <td>" .  $row['full_name'] . "</td> <td>" . $row['phone'] . "</td><td>" .   $row['gender'] . "</td>
       <td>" .  $row['age'] . "</td>
       <td>" .  $row['address'] . "</td>
       <td>" .  $row['state'] . "</td>
	   <td> <img src=img/".  $row['profile_pic'] ." width='80px'; height='80px'; alt='profile-picture' border='1'>
       
      
     
    </tr>";
    

	
}}
 
		


?> 

<script>

        </script>  
 <script src="js/search.js"></script>    

 </table>
</body>
</html>
   