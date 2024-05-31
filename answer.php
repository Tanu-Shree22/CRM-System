<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
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
 <form  method="post">
  <h1>Complaint Answer </h1>
 <!-- Create Form -->
        <form id="form">
 <!-- Details -->
 <div class="form-control">
                <label for="id" id="label-email">
                    Customer ID
                </label>

                <!-- Input Type Email-->
                <input type="NUMBER" id="email" name="id" placeholder="Enter CustomerID" />
<div class="form-control">
                <label for="email" id="label-email">
                    Customer Email
                </label>

                <!-- Input Type Email-->
                <input type="email" id="email" name="email" placeholder="Enter Customer email" />
            </div>
            <div class="form-control">
            <label for="full_name" id="name">
                    Customer Name
                </label>

                <!-- Input Type Email-->
                <input type="text" id="name" name="full_name" placeholder="Enter Customer name" />
            </div>
<div class="form-control">
                <label for="address" id="label-age">
                    Answer
                </label>

                <!-- Input Type Text -->
                <textarea name="answer" cols="60" rows="10" placeholder="Answer...."></textarea>

            </div>

            <!-- Multi-line Text Input Control -->
            <button type="submit" value="submit" name="submit">
                Send
            </button>
        </form>
</body>
</html>
<?php 
    if(isset($_POST["submit"])){
        include('config.php');
        $id = $_POST['id'];
        $email_id = $_POST['email'];
        $name = $_POST['full_name'];

       
            $answer = $_POST["answer"];
            $_SESSION['answer'] = $answer;
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
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your Complaint Answer";
                    $mail->Body="<p>Dear ".$name .", </p> <h5>$answer <br></h5>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Your CRM</b>
                    https://www.youtube.com/channel/UCKRZp3mkvL1CBYKFIlxjDdg";
    
                            if(!$mail->send()){
                                ?>
                                    <script>
                                        alert("<?php echo " Failed, Invalid Email "?>");
                                    </script>
                                <?php
                            }else{
                                $sql= "UPDATE complaints SET status = 1 where id = '$id' ";
                                $result = mysqli_query($conn, $sql);
                                if($result){
                                ?>
                                <script>
                                    alert("<?php echo "Query answered Successfully, sent to " . $email_id ?>");
                                    window.location.replace('complaints.php');
                                </script>
                              <?php
            }
                            }
    }


?>  
                            