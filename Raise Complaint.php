<?php
session_start();

// if (!isset($_SESSION["username"])) {
//     header("Location: login page.php");
// }
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
 $full_name =  ($_POST['full_name']);
 $email_id = ($_POST['email_id']);
 $phone =  ($_POST['phone']);
 $concern = ($_POST['concern']);

 $sql = "INSERT INTO complaints (full_name, email_id, phone, concern) VALUES(' $full_name', '$email_id', '$phone', '$concern' )";
 
 
 if(mysqli_query ($conn, $sql)){

  
    // $email_id = $_POST['email'];
    // $name = $_POST['full_name'];

   
    //     $answer = $_POST["answer"];
        // $_SESSION['answer'] = $answer;
        $_SESSION['mail'] = $email_id;
                require "login-system-main/Mail/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                $mail->Username='mycrm2022@gmail.com';
                $mail->Password='Gendustem';

                $mail->setFrom('mycrm2022@gmail.com', 'Complaint Answer');
                $mail->addAddress($_POST["email_id"]);

                $mail->isHTML(true);
                $mail->Subject="My CRM";
                $mail->Body="<h4>Dear ".$full_name .", </h4> <p>we have received your query. we will sort your problem shortly, and will let you know via email or Phone number that you have registered.   <br></p>
                <br><br>
                <p>With regrads,</p>
                <b>Your CRM</b>
               ";

                        if(!$mail->send()){
                            ?>
                                <script>
                                    alert("<?php echo " Failed, Invalid Email "?>");
                                </script>
                            <?php
                        }else{
                            ?>
                            <script>
                                alert( "Thanks! Your complaint has been sent, we will solve your problem soon.  ");
                                window.location.replace('cust_complaint.php');
                            </script>
                          <?php
        }
    

   
 }
 else{
    //  echo("something went wrong..");
     mysqli_error();
 }
 mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>rase cmplant</title>
    <!-- <link href="css/homepage.css" rel="stylesheet"  type="text/css" > -->
    <link href="css/raise cmplaint.css" rel="stylesheet" type="text/css">
</head>
    
  
       <body>
       <header>
       <header>
        <nav class="navbar">
            <ul>
                <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
                <!-- <li><a href="#">About</a></li> -->
                <li><a href = "customer Profile.php"> MyProfile</a></li>
               
                <li><a href="FAQs Page(customers).php">FAQs</a></li>

                <li><a href="Raise Complaint.php" class="active">Raise Complaint</a></li>

                <li><a href="cust-Offers.php">Offers</a></li>
                <li><a href="Customer Page.php" >Home </a></li>
                <img src="img/crm-icon-png.png" alt="logo">
            </ul>
        </nav>
    </header>
    <h1 >Complaints</h1>
    <h3>We welcome your feedback!</h3>
    <a href="cust_complaint.php"><button class="Ans-btn">My Complaints </button></a>
    <div id="form">
    <form   method="post">
     
    <div><br>
        <label >Full Name:</label>
        <input type="text" name="full name"  placeholder="Enter full name" >
    </div>
   <div ><br>
   <label >E-mail:</label> 
   <input type="email" name="email_id" placeholder="user@example.com" >
</div><div  ><br>
  <label>Phone:</label>
   <input type="tel" name="phone" placeholder="phone number">
</div><div ><br>
<label>What issue did you experienced?</label> <br><textarea name="concern"  cols="60" rows="10" placeholder="Compose your problem"></textarea>
</div>
<div >
    <br><button  type="submit">Send</button> </a>
</div> 

</form>
</div>  


    </body>
</html>