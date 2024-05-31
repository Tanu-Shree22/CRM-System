<?php
 require_once 'config.php';
//  error_reporting(0);
   
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
	 
	$date = trim($_POST['date']);
    $offer_id = trim($_POST['offer_id']);
	$offer_name = trim($_POST['offer_name']);
  $target = trim($_POST['target']);
  $sales = trim($_POST['sales']);
	
	$sql = "INSERT INTO offer_report(offer_id, date , offer_name, target ,sales) VALUES(  '$offer_id','$date' , '$offer_name', '$target' , '$sales')"; 
  
	$result = mysqli_query($conn, $sql);
	if ($result)
	{     header("location: offer_report.php");
  }
  else{
    echo"something went wrong" . mysqli_error();
   }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
    <title>Report form</title>
</head>
<body>
<header>
    <nav class="navbar">
        <ul>
        <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="#">About</a></li> -->
            <li><a href="FAQs Page(customers).php">FAQs</a></li>
            <li><a href="profiles.php">Customer Profiles</a></li>
            <li><a href="reports.php"  class="active">Reports</a></li>
            <li><a href="complaints.php"> Complaints</a></li>
            <li><a href="data.php"> Customer Data</a></li>
            <li><a href="target_data.php"> Target customers</a></li>
            <li><a href="emp_offer.php">Offers</a></li>
            <li><a href="admin page.php">Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
    
       
        <h1> Offers Report Data</h1>
  <form id="form" method="post">
  <div class="form-control">
    <div ><br>
      
      <label> Date</label>
      <input type="date" name="date" placeholder="Enter date" required>
    </div>
    <div ><br>
      
      <label> Offer Id</label>
      <input type="number" name="offer_id" placeholder="Enter Month" required>
    </div>
    <div ><br>
      <div ><br>
      
        <label> Offer Name</label>
        <input type="text" name="offer_name" placeholder="Enter Month" required>
      </div>
      <div ><br>
      
      <label> Target Sales</label>
      <input type="number" name="target" placeholder="Enter Month" required>
    </div>
    <div ><br>
      
      <label> Sales</label>
      <input type="number" name="sales" placeholder="Enter Month" required>
    </div>
      
    
      
     
     

    </div>
    
   
      <div>
        <br>
         <!-- <a href="main page.html"> -->
        <button  type="submit">Generate </button>
    </div>
      
    </div>
  </form>
</div>
</div>
</body>
</html>