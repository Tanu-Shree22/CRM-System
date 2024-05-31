<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Targets</title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>

<body>
<style>
   body {
        background-color: rgb(218, 217, 238);
    
    }
    </style>
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
            <li><a href="target_data.php" class="active"> Target customers</a></li>
            <li><a href="emp_offer.php">Offers</a></li>
            <li><a href="employee page.php" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
 <form  method="post" id="form">
  <h1>Add Target </h1>
 <!-- Create Form -->
      
 <!-- Details -->
 <div class="form-control">
 <p style="color: red ;" > Customer id must be the same as in customer data!! </p> 
                <label for="id" id="label-email">
                    Customer Id
                </label>

                <!-- Input Type Email-->
                <input type="number" id="id" name="id" placeholder="Enter Customer id" />
            
<div class="form-control">
                <label for="email" id="label-email">
                    Customer Email
                </label>

                <!-- Input Type Email-->
                <input type="email" id="email" name="email" placeholder="Enter Customer email" />
            
            <label for="full_name" id="name">
                    Customer Name
                </label>

                <!-- Input Type Email-->
                <input type="text" id="name" name="full_name" placeholder="Enter Customer name" />
            
            <label for="phone" id="phone">
                    Customer Phone
                </label>

                <!-- Input Type Email-->
                <input type="tel" id="phone" name="phone" placeholder="Enter mobile number" />
            </div>


            <!-- Multi-line Text Input Control -->
            <button type="submit" value="submit" name="submit">
                ADD
            </button>
        </form>
</body>
</html>
<?php 
    if(isset($_POST["submit"])){
        include('config.php');
        // include('cust-Offers.php');
        $id = $_POST['id'];
        $email_id = $_POST['email'];
        $name = $_POST['full_name'];
        $phone = $_POST['phone'];
        // $title = trim($_POST['title']);
        $sql = "INSERT INTO target_customers(id, email,full_name, phone) VALUES( '$id' ,'$email_id', '$name', '$phone' )"; 
  
        $result = mysqli_query($conn, $sql);
        if ($result)
        { header("location: target_data.php");
    }else{
        echo"jdhjkabkj";
    }

}
?>  
                            