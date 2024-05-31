<?php
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $target = "img/". basename($_FILES['profile_pic']['name']);
$email = trim($_POST['email']);
$full_name = trim($_POST['full_name']);
$gender = trim($_POST['gender']);
$age = trim($_POST['age']);
$state = trim($_POST['state']);
$phone = trim($_POST['phone']);
$DOB = trim($_POST['DOB']);
$address = trim($_POST['address']);
$profile_pic = $_FILES['profile_pic']['name'];

        
        $sql = "INSERT INTO customer_profile(  profile_pic ,full_name, email,  phone,  DOB,  gender, age, address,  state)  VALUES ( '$profile_pic', '$full_name', '$email',  '$phone',  '$DOB',  '$gender',  '$age',  '$address',  '$state')";
  
 

    // $sql = "INSERT INTO customer_profile(  profile_pic ,full_name, email,  phone,  DOB,  gender, age, address,  state)  VALUES ( '".$image."', '$full_name', '$email',  '$phone',  '$DOB',  '$gender',  '$age',  '$address',  '$state')";
    $result = mysqli_query($conn, $sql);
if (!$result)
{ 
    echo "Something went wrong... cannot redirect!" . mysqli_error($conn);
}
else{

 header("location:FAQs Page(customers).php");
}
if(move_uploaded_file( $_FILES['tmp_name']['name'])){
   echo "succesful"; 
}
else{
    echo "unsuccesfull";
}
}

    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/profile.css" rel="stylesheet" type="text/css">
    <title>Customer Profile</title>
</head>

<body>
    
    <div id="profile">
        <h1>My Profile</h1>
    <form action="#" method="post">
    
        <div class="profile-icon">
        <input type="file" id="myfile" name="profile_pic">
    </div>
        <div><br>
        <label>Full Name:</label>
        <input type="text" name="full_name" placeholder="Enter Full name" >
    </div>
    <div><br>
        <label>Email Id:</label>
        <input type="email" name="email" placeholder="user@xyz.com" required>
    </div>
    <div><br>
        <label>Phone Number:</label>
        <input type="text" name="phone" placeholder="Enter mobile number">
    </div><div><br>
        <label>Date Of Birth:</label>
        <input type="date" name="DOB" >
    </div>
    <div ><br>
        <label>Gender:</label>
        <div class="style= display : inline">
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="FeMale">FeMale
        <input type="radio" name="gender" value="other">Other
</div>
    </div>
    <div><br>
        <label>Age:</label>
        <input type="text" name="age" placeholder="Enter age in years ">
    </div>
    <div><br>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter permanent address">
    </div> <div><br>
        <label>State:</label>
        <input type="text" name="state" placeholder="Domicile state">
    </div>
    
     <div><br>
        <button input type="submit">Save</button>
     </div>
      
    </form>
    </div>

</body>
</html>