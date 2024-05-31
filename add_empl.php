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
<h1>Add Employee</h1>
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
  
 <!-- Create Form -->
        
 <!-- Details -->
<div class="form-control">

                <label for="email" id="label-email">
                    Employee Email
                </label>

                <!-- Input Type Email-->
                <input type="email" id="email" name="email" placeholder="Enter email" />
            <br>
            <label for="full_name" id="name">
                    Employee Name
                </label>

                <!-- Input Type Email-->
                <input type="text" id="name" name="full_name" placeholder="Enter  name" />
            <br>
            <label for="phone" id="phone">
                    Employee Phone
                </label>

              
                <input type="tel" id="phone" name="phone" placeholder="Enter mobile number" />
           
<br>
            <label for="age" id="name">
                    Employee Age
                </label>

               
                <input type="text" id="age" name="age" placeholder="Enter  age" />
                <br>
                <label for="DOB" id="name">
                    Date Of Birth
                </label>

              
                <input type="date" id="DOB" name="DOB" placeholder="Enter date of birth" />
                <br>
                <label for="address" id="address">
                    Employee Address
                </label>

                
                <input type="text" id="address" name="address" placeholder="Enter  address" />
                <br>
            
            <button  type="submit" value="submit" name="submit">
                ADD
            </button>
            </div>
        </form>
</body>
</html>
<?php 
    if(isset($_POST["submit"])){
        include('config.php');
        
        $full_name = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
       
        $age = trim($_POST['age']);
        $address = trim($_POST['address']);
        $DOB = trim($_POST['DOB']);
        
        if(!empty('$email') && !empty('$full_name ') && !empty('$phone') && !empty('$DOB') && !empty('$age') && !empty('$address') ) {
        $sql = "INSERT INTO employee_data( email, full_name, phone,DOB, age, address) VALUES(  '$email' ,'$full_name ', '$phone',   '$DOB' , '$age', '$address' )"; 
        $result = mysqli_query($conn, $sql);
        if ($result)
        { header("location: employee_data.php");
    }else{
        echo"something went wrong" . mysqli_error($conn);
    }
}
else {
    echo "something went wrong";
}

}
?>  
                            