<?php 
include('config.php');
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Rest-Password Form</title>
    <link href="resest_password.css" rel="stylesheet" type="text/css">
</head>
<body>    
<style>
        body{
            background: url("img/password.jpg");
        }
        </style>
              
    <div id="form">
    <h1>Reset Password</h1>
    <hr class="style1">
    <br> <form action="" method="POST" >

    <div>
    <label>User-name:</label><input type="password" name="username" placeholder="Email Id">
</div> 
<!-- <div> -->
     <!-- <br>
    <label>New-Password:</label><input type="password" name="password" placeholder="Password"> -->
<!-- </div>  -->
                        <br>
                      <button input type="submit" value="reset">Reset</buton>
                            </div>
                    </div>
                    </form>
                </div>
       
</body>
</html>
<?php
 $username = "";
    if(isset($_POST["reset"])){
        // include('config.php');
        $psw = $_POST["password"];

        // $token = $_SESSION['token'];
        $username = $_POST['username'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($conn, "SELECT * FROM register WHERE username='$username'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($username){
            $new_pass = $hash;
            mysqli_query($conn, "UPDATE register SET password='$new_pass' WHERE username='$username' ");
            ?>
            <script>
                window.location.replace("login page.php");
                alert("<?php echo "your password has been succesfully reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
