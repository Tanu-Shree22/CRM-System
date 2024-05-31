<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1><u>Complaints</u></h1>
    
    <header>
    <nav class="navbar">
        <ul>
        <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="#">About</a></li> -->
            <li><a href="FAQs Page(customers).php">FAQs</a></li>
            <li><a href="profiles.php">Customer Profiles</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="complaints.php"class="active"> Complaints</a></li>
            <li><a href="data.php"> Customer Data</a></li>
            <li><a href="target_data.php"> Target customers</a></li>
            <li><a href="emp_offer.php">Offers</a></li>
            <li><a href="employee page.php" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
    <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search.....">
        <a href= "complaint_solved.php" ><button class="Ans-btn">Answered complaints </button></a>
    <br>
    <table class="container">
	
   <tr>
       <th>Customer Id</th>
       <th>Date</th>
       <th>E-mail</th>
       <th>Full Name</th>
       <th>Phone No.</th>
       <th>Concern</th>
       <th>Action</th>
   </tr>
   
   
   <?php
	require_once "config.php";
    error_reporting(0);
	$sql = "SELECT * FROM complaints where status = 0";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
                // $id = $id + 1;
			
        echo"<tr class='element'><td>" . $row['id'] . "</td>
       <td>" . $row['date'] . "</td> 
       <td>" . $row['email_id'] . "</td>
       <td>" .  $row['full_name'] . "</td> <td>" . $row['phone'] . "</td><td>" .   $row['concern'] . "</td>
       
       <td><a href='answer.php?id=" .$row['id']. "'> <button class='delete'>Answer </button></a>
     
     <a onClick=\"javascript: return confirm('Are you sure to delete this record?');\"href='complaint_delete.php?id=" .$row['id']. "'> <button class='delete'>Delete </button></a>
       </td>
    </tr>";
    

	
    }}
 else{
	// echo "something went wrong.";
}
		


?> 

<script>

        </script>  
 <script src="js/search.js"></script>    

 </table>
</body>
</html>
   		


