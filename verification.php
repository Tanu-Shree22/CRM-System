<?php session_start() ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verification</title>
    <link href="css/verification.css" rel="stylesheet" type="text/css">
</head>
<body>
<style>
        body{
            background: url("img/password.jpg");
        }
        </style>
    <div class="cotainer">

              <div id="form">
              <h1>We sent your OTP!!</h1>
              <hr class="style1">
              <h5>Enter the verification 6-digit code below.</h5>
              
              <br> <form action="" method="POST" >

                   <br>
                   <label>OTP-Code:</label><input type="text" id="otp" name="otp_code" required autofocus>
</dvi>          
                   <br>
                           
                                <button type="submit" value="Verify" name="verify">Verify</button>
</div>
                              </div>
                              </form>
                          </div>
 
                   
</body>
</html>
<?php 
    include('config.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($conn, "UPDATE register SET status = 1 WHERE username = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you can change password now");
                   window.location.replace("Forgot password (2).php");
             </script>
             <?php
        }

    }

?>