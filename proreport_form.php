<?php
 require_once 'config.php';
//  error_reporting(0);
   
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
	 

	$month = trim($_POST['date']);
  $target = trim($_POST['target']);
  $sales = trim($_POST['sales']);

      
   
	$sql = "INSERT INTO product_report(month, target ,sales) VALUES( '$month', '$target' , '$sales')"; 
  
	$result = mysqli_query($conn, $sql);
	if ($result)
	{     header("location: product_report.php");
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
<style>
   body {
        background-color: rgb(218, 217, 238);
    
    }
    </style>
    
       
        <h1> Product Report Data</h1>
  <form id="form"  method="post">
 
 <!-- Details -->
<div class="form-control">
    
      <div ><br>
      
        <label> Month</label>
        <input type="month" name="date" placeholder="Enter Month" required>
      </div>
      <div ><br>
      
      <label> Target Sales</label>
      <input type="number" name="target" placeholder="Enter Month" required>
    </div>
    <div ><br>
      
      <label> Sales</label>
      <input type="number" name="sales" placeholder="Enter Month" required>
    </div>
      
    
      
     
     

    
   
      <div>
        <br>
         <!-- <a href="main page.html"> -->
        <button  type="submit">Generate</button>
    </div>
      
    </div>
  </form>
</div>
</div>
</body>
</html>