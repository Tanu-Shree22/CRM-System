<?php
 require_once('config.php');

 if( $_SERVER['REQUEST_METHOD'] == "POST"){
     $id = $_GET['id'];
     $email = trim($_POST['email']);
     $full_name = trim($_POST['full_name']);
   
     $age = trim($_POST['age']);
    
     $phone = trim($_POST['phone']);
     $DOB = trim($_POST['DOB']);
     $address = trim($_POST['address']);
    

     $sql = " UPDATE employee_data SET  full_name= ' $full_name', email = ' $email ' , phone = ' $phone ' ,  DOB = '$DOB' , age= '$age' , address= '$address' WHERE emp_id = '$id'";

$result = mysqli_query($conn, $sql);
if ($result){
    header("location:employee_data.php");
}
else{
    echo "something went wrong" . mysqli_error($conn);
}
 }
?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee data</title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>

<body>
<style>
   body {
        background-color: rgb(218, 217, 238);
    
    }
    </style>
 
  <h1>Edit Employee Details</h1>
  <header>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="login page.php"> <button class="logbtn">Log in</button></a></li> -->
            
            <li><a href="" >Reports</a></li>
            <li><a href="Admin FAQs.php" >FAQs</a></li>
            <li><a href="product_data.php">Product Data</a></li>
            <li><a href="employee_data.php">Employee Data</a></li>

            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="admin page.php" class="active" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   <form  method="post" id="form">
<div class="form-control">
<?php
   
   
   require_once "config.php";
   // $email = $_SESSION["username"];
   $id =  $_GET['id'];
   $sql = "SELECT * FROM employee_data WHERE emp_id= '$id' ";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               ?>
                <label for="email" id="label-email">
                    Employee Email
                </label>

                <!-- Input Type Email-->
                <input type="email" id="email" name="email" placeholder="Enter email" value ="<?php echo $row['email']; ?>"/>
            <br>
            <label for="full_name" id="name">
                    Employee Name
                </label>

                <!-- Input Type Email-->
                <input type="text" id="name" name="full_name"  value ="<?php echo $row['full_name']; ?>"/>
            <br>
            <label for="phone" id="phone">
                    Employee Phone
                </label>

              
                <input type="tel" id="phone" name="phone"  value ="<?php echo $row['phone']; ?>" />
           
<br>
            <label for="age" id="name">
                    Employee Age
                </label>

               
                <input type="text" id="age" name="age"  value ="<?php echo $row['age']; ?>"/>
                <br>
                <label for="DOB" id="name">
                    Date Of Birth
                </label>

              
                <input type="date" id="DOB" name="DOB" value ="<?php echo $row['DOB']; ?>"/>
                <br>
                <label for="address" id="address">
                    Employee Address
                </label>

                
                <input type="text" id="address" name="address" value ="<?php echo $row['address']; ?>" />
                <br>
            
            <button  type="submit" value="submit" name="submit">
                Update
            </button>
            </div>
        </form>
</body>
</html>
<?php 
   
    }

}
?>  
                            