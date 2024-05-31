<?php
session_start();



//if (!isset($_SESSION["username"])) {
  //  header("Location: login page.php");
//}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Complaints</title>
    <link href="css/mycomplaints.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1><u>My Complaints</u></h1>
    
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
                <!-- <li><a href="#">About</a></li> -->
                <li><a href = "customer Profile.php"> MyProfile</a></li>
               
                <li><a href="FAQs Page(customers).php">FAQs</a></li>

                <li><a href="Raise Complaint.php" class="active">Raise Complaint</a></li>

                <li><a href="cust-Offers.php">Offers</a></li>
                <li><a href="Customer Page.php" >Home </a></li>
                <img src="img/crm-icon-png.png" alt="logo">
            </ul>
        </nav>
    </header>
 

    <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search.....">
    <br>

    

    <table class="container">
	
   <tr>
       <th> S.No. </th>
       <th>Date</th>
      
       <th>Concern</th>
       <th>Status</th>
   </tr>
   <?php
	require_once "config.php";
    error_reporting(0);
	$sql = "SELECT id, email_id,  date_format(date ,'%d/%m/%Y') as date , concern , status FROM complaints where email_id='{$_SESSION["username"]}'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
			
        echo "<tr class='element'> <td>" . $id . "</td>
       <td>" . $row['date'] . "</td> 
     <td>" .   $row['concern'] . "</td>
         " ; 
         if( $row['status'] == 1){ 
             echo 
      " <td> <button class='delete'>Answered </button>
     
     <a onClick=\"javascript: return confirm('Are you sure to delete this record?');\"href='complaint_delete.php?id=" .$row['id']. "'> <button class='delete'>Delete </button></a>
       </td>
    </tr>";
    

	
    }
else{
    echo 
    " <td> <button class='delete'>Pending </button>
   
   <a onClick=\"javascript: return confirm('Are you sure to delete this record?');\"href='complaint_delete.php?id=" .$row['id']. "'> <button class='delete'>Delete </button></a>
     </td>
  </tr>"; 
}
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
   		
