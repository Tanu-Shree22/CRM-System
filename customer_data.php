<?php
 require_once 'config.php';
 error_reporting(0);
 $full_name = $email = $phone = $gender = $age = $address =$purchase_f = $avg = "";

 if ($_SERVER['REQUEST_METHOD'] == "POST"){
	 
	$full_name = trim($_POST['full_name']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$address = trim($_POST['address']);
	$purchase_f = trim($_POST['purchase_f']);
	$avg = trim($_POST['avg']);
	 
	$sql = "INSERT INTO customer_data( email, full_name, phone,gender, age, address,purchase_frequency	,avg_price) VALUES(  '$email' ,'$full_name ', '$phone',  '$gender', '$age', '$address', '$purchase_f',  '$avg')"; 
	$result = mysqli_query($conn, $sql);
	if ($result)
	{ header("location: data.php");
	}
	else{
		echo"something went wrong". mysqli_error();
	}
}
       ?>
	

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
    
       

    
   

	

	<header>
    <nav class="navbar">
        <ul>
        <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="#">About</a></li> -->
            <li><a href="FAQs Page(customers).php">FAQs</a></li>
            <li><a href="profiles.php">Customer Profiles</a></li>
            <li><a href="proreport_form.php">Reports</a></li>
            <li><a href="complaints.php"> Complaints</a></li>
            <li><a href="data.php"> Customer Data</a></li>
            <li><a href="target_data.php"> Target customers</a></li>
            <li><a href="emp_offer.php">Offers</a></li>
            <li><a href="#" class="active">Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>	
	
	<h1>Add  New Customer</h1>
	<form id="form" action="customer_data.php" method="post">
   
	<!-- Create Form -->
	<form >

		<!-- Details -->
		
		<div class="form-control">
			<label for="name" id="label-name">
				Name
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="name" name="full_name"
				placeholder="Enter  name" />
		</div>

		<div class="form-control">
			<label for="email" id="label-email">
				Email
			</label>

			<!-- Input Type Email-->
			<input type="email"
				id="email" name="email"
				placeholder="Enter  email" />
		</div>
		<div class="form-control">
			<label for="phne" id="label-email">
				Phone
			</label>

			<!-- Input Type Email-->
			<input type="tel"
				id="phne" name="phone"
				placeholder="Enter  phone number" />
		</div>

		<div class="form-control">
			<label for="age" id="label-age">
				Age
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="age" name="age"
				placeholder="Enter age" />
		</div>

		<div class="form-control">
			<label for="gender" id="label-role">
				Gender
			</label>
			
			<!-- Dropdown options -->
			<select name="gender" id="gender">
				<option 
				value="male">Male</option>
				<option value="female">FeMale</option>
				
				<option value="other">Other</option>
			</select>
		</div>
		<div class="form-control">
			<label for="address" id="label-age">
				Address
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="address" name="address"
				placeholder="Enter address" />
		</div>
		<div class="form-control">
			<label for="purchase_f" id="label-age">
				Purchase Frequency
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="purchase_f" name="purchase_f"
				placeholder="Enter Purchase Frequency" />
		</div>
		<div class="form-control">
			<label for="avg" id="label-age">
				Average rate
			</label>

			<!-- Input Type Text -->
			<input type="number"
				id="avg" name="avg"
				placeholder="Enter buying price" />
		</div>
		
		
		



		

		<!-- Multi-line Text Input Control -->
		<button type="submit" value="submit" name="submit">
			Add
		</button>
		
	
	</form>
</body>

</html>

    </form>
	
	
</body>
</html>