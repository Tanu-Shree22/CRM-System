 <?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login page.php");
}
error_reporting(0);

require_once "config.php";

$profile_pic = $full_name = $email = $phone = $DOB = $gender = $age = $address = $state = "";
$name_err = $email_err = $gender_err = $age_err = $state_err = "";

$sql = "SELECT * FROM customer_profile  WHERE email= '{$_SESSION["username"]}' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
 
  header("location: View_Profile.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "email cannot be blank";
    }
    else{
        $sql = "SELECT id FROM customer_profile  WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {mysqli_stmt_bind_param($stmt, "s", $param_email);

          // Set the value of param username
          $param_email = trim($_POST['email']);

          // Try to execute this statement
          if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt) == 1)
              {
                  $email_err = "This username is already taken"; 
              }
              else{$email = trim($_POST['email']);
                 
              
          }}
          else{
              echo "Something went wrong";
          }
        }
    }        

          
         
  
      mysqli_stmt_close($stmt);
  }
     
//   name check
$email = trim($_POST['email']);
  if(empty(trim($_POST['full_name']))){
    $name_err = "Name cannot be blank";
  }
  else{
    $full_name = trim($_POST['full_name']);
  }
  //role name check
 
    // ($gender = trim($_POST['gender']);
  
  //age checked
  if(empty(trim($_POST['age']))){
    $age_err = " age cannot be blank";
  }else{
    $age = trim($_POST['age']);
  }
  //state checked
  if(empty(trim($_POST['state']))){
    $state_err = " state cannot be blank";
  }else{
    $state = trim($_POST['state']);
  }
  
  $filename = $_FILES["profile_pic"]["name"];
    $tempname = $_FILES["profile_pic"]["tmp_name"];    
        $folder = "img/".$filename;
        // $phone = trim($_POST['phone']);
        //  $DOB = trim($_POST['DOB']);
        //  $address = trim($_POST['address']);
//   If there were no errors, go ahead and insert into the database
  if( empty($name_err) && empty($gender_err) && empty($age_err) && empty($state_err) && ($phone = trim($_POST['phone'])) && ($DOB = trim($_POST['DOB'])) && ($address = trim($_POST['address'])) && ($gender = trim($_POST['gender'])) )
{
    
    $sql = "INSERT INTO customer_profile(  profile_pic ,full_name, email,  phone,  DOB,  gender, age, address,  state)  VALUES ( '$filename', '$full_name', '$email',  '$phone',  '$DOB',  '$gender',  '$age',  '$address',  '$state')";
    $result = mysqli_query($conn, $sql);
    // $run = move_uploaded_file($tempname, $folder);
if (!$result)
{ 
    echo "Something went wrong... cannot redirect!" . mysqli_error($conn);
}
else{
  if (move_uploaded_file($tempname, $folder))  {
    header("location: View_Profile.php ");
 }else{
     echo"Failed to upload image";
}

}



mysqli_close($conn);
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
<!-- action="View_Profile.php" -->
<header>
        <nav class="navbar">
            <ul>
                <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
                <!-- <li><a href="#">About</a></li> -->
                <li><a href = "customer Profile.php"> MyProfile</a></li>
               
                <li><a href="FAQs Page(customers).php">FAQs</a></li>

                <li><a href="Raise Complaint.php">Raise Complaint</a></li>

                <li><a href="cust-Offers.php">Offers</a></li>
                <li><a href="Customer Page.php" class="active">Home </a></li>
                <img src="img/crm-icon-png.png" alt="logo">
            </ul>
        </nav>
    </header>
    <div id="profile-form">
        <h1>My Profile</h1><br>
    <form  method="post" enctype="multipart/form-data">
    
        <div class="profile-icon"><br>
        <input type="file" id="myfile" onchange="#displaypic" name="profile_pic">
    </div>
        <div><br>
        <label>Full Name:</label>
        <input type="text" name="full_name" placeholder="Enter Full name"  required>
    </div>
    <div><br>
        <label>Email Id:</label>
        <input type="email" name="email" placeholder="user@xyz.com" required>
    </div>
    <div><br>
        <label>Phone Number:</label>
        <input type="text" name="phone" placeholder="Enter mobile number">
    </div><div><br>
        <label>Date Of Birth:</label><br>
        <input type="date" name="DOB" >
    </div>
    <div ><br>
        <label>Gender:</label><br>
        
           <label class="container">Male
  <input type="radio" name="gender" value="Male">
  <span class="checkmark"></span>
</label>
<label class="container">Female
  <input type="radio" name="gender" value="Female">
  <span class="checkmark"></span>
</label>
<label class="container">Other
  <input type="radio" name="gender" value="Other">
  <span class="checkmark"></span>
</label>
</div>
    <br>
    <div>
        <label>Age:</label>
        <input type="number" name="age" placeholder="Enter age in years ">
    </div>
    <div><br>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter permanent address">
    </div> <div><br>
        <label>State:</label><br>
        <input type="text" name="state" placeholder="Domicile state">
    </div>
    
     <div><br>
        <button input type="submit" name ="submit">Save</button>
     </div>
      
    </form>
    </div>
    <script>src = "image-preview.js"</script>
</body>
</html>