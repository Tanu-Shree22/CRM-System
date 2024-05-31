<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login page.php");
}
    require_once('config.php');

    if( $_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_GET['id'];
        $email = trim($_POST['email']);
        $full_name = trim($_POST['full_name']);
        $gender = trim($_POST['gender']);
        $age = trim($_POST['age']);
        $state = trim($_POST['state']);
        $phone = trim($_POST['phone']);
        $DOB = trim($_POST['DOB']);
        $address = trim($_POST['address']);
        $filename = $_FILES["profile_pic"]["name"];
    $tempname = $_FILES["profile_pic"]["tmp_name"];    
        $folder = "img/".$filename;
  
        $sql = " UPDATE customer_profile SET profile_pic = ' $filename', full_name= ' $full_name', email = ' $email ' , phone = ' $phone ' ,  DOB = '$DOB' , gender = ' $gender' , age= '$age' , address= '$address', state = '$state' WHERE customer_profile.id= '$id' ";
        move_uploaded_file($tempname, $folder)  ;
$result = mysqli_query($conn, $sql);
if ($result){
   
        header("location: View_Profile.php ");
     }
            // echo "<script>  alert('Profile updated successfully.');
            // window.location.href= 'customer Profile.php' ;
            // </script>";
            // // header('Location:A-offer.php');
        else{
            echo "something went wrong";
        }
        
    }
    else{
       echo mysqli_error($conn);
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
    
    <div id="profile-form">
    <?php
   
   
    require_once "config.php";
    // $email = $_SESSION["username"];
    $sql = "SELECT * FROM customer_profile WHERE email='{$_SESSION["username"]}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
        <h1>My Profile</h1>
    <form  method="post" enctype="multipart/form-data">
    
        <div class="profile-icon">
        <img src="img/<?php echo $row['profile_pic']; ?>" name="old_image" width='125px'; height='145px'; alt='profile-picture' border='1'>
        <input type="file" id="myfile"  name="profile_pic"> 
    </div><br>
        <div><br>
        <label>Full Name:</label>
        <input type="text" name="full_name" value ="<?= $row['full_name']?> " >
    </div>
    <div><br>
        <label>Email Id:</label>
        <input type="email" name="email" value ="<?= $row['email']?>">
    </div>
    <div><br>
        <label>Phone Number:</label>
        <input type="text" name="phone"value ="<?= $row['phone']?>">
    </div><div><br>
        <label>Date Of Birth:</label>
        <input type="date" name="DOB" value ="<?= $row['DOB']?>" >
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
    <!-- </div> -->
    <div><br>
        <label>Age:</label>
        <input type="text" name="age" value ="<?= $row['age']?>">
    </div>
    <div><br>
        <label>Address:</label>
        <input type="text" name="address" value ="<?= $row['address']?>">
    </div> <div><br>
        <label>State:</label>
        <input type="text" name="state" value ="<?= $row['state']?>">
    </div>
    
     <div><br>
        <button input type="submit" name ="submit">Save</button>
     </div>
      
    </form>
    </div>
    <!-- <script>src = "image-preview.js"</script> -->
    <?php
            }
        }
        ?>
    
        
</body>
</html>