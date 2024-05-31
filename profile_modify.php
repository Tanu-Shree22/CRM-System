<?php
    require_once('config.php');

    if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == "POST"){
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
  
        $sql = " UPDATE customer_profile SET profile_pic = ' $filename', full_name= ' $full_name', email = ' $email ' , phone = ' $phone ' ,  DOB = '$DOB' , gender = ' $gender' , age= '$age' , address= '$address', state = '$state' WHERE customer_profile.id = '$id'";

$result = mysqli_query($conn, $sql);
if ($result){
            echo "<script>  alert('Profile updated successfully.');
            window.location.href= 'Veiw_Profile.php' ;</script>";
            // header('Location:A-offer.php');
        }else{
            echo "something went wrong";
        }
        
    }else{
        echo "invalid id";
    }


    ?>