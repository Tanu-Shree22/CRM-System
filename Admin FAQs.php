<?php
// session_start();

// if (!isset($_SESSION["username"])) {
//     header("Location: login page.php");
// }
// error_reporting(0);
require_once "config.php";
$question = $answer = $date="";
$question_err = $answer_err = $date_err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //date
    if(empty(trim($_POST['date']))){
        $date_err = " xDate cannot be blank";
      }
      else{
        $date = trim($_POST['date']);
      }
    //question
    if(empty(trim($_POST['question']))){
        $question_err = " Question cannot be blank";
      }
      else{
        $question = trim($_POST['question']);
      }
      //answer
      if(empty(trim($_POST['answer']))){
        $answer_err = "Answer cannot be blank";
      }
      else{
        $answer = trim($_POST['answer']);
      }
    
  if(empty($question_err) && empty($answer_err) && empty($date_err)){
      $sql = "INSERT INTO faqs(date, question , answer) VALUES('$date', '$question','$answer')";
      $result = mysqli_query($conn, $sql);
      if ($result)
      { 
        header("location:FAQs Page(customers).php");
      }
      else{
        echo "Something went wrong... cannot redirect!" . mysqli_error($conn);
       
      }
    
      mysqli_close($conn);
    }}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <!-- <link href="css/homepage.css" rel="stylesheet" type="text/css"> -->
    <link href="css/faq.css" rel="stylesheet" type="text/css">
</head>
<body >

<header>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="login page.php"> <button class="logbtn">Log in</button></a></li> -->
            
            <li><a href="offer_report.php" >Reports</a></li>
            <li><a href="Admin FAQs.php" class="active" >FAQs</a></li>
            <li><a href="product_data.php">Product Data</a></li>
            <li><a href="employee_data.php">Employee Data</a></li>

            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="admin page.php"  >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   <h1>Frequently Asked Questions(FAQs)</h1>
  <a href="FAQs Page(customers).php"> <button class="viewbtn">Saved FAQs</button></a>
    <div class="faq">
    <form  method="post">
    <label > Date:</label><input type="date" name="date" >
    <div><br>
        <label > Add Question</label><div> <textarea name="question"  cols="40" rows="5" placeholder="Write Question"></textarea>
    </div></div>
    <br><label >Add Answer</label><div><textarea name="answer"  cols="40" rows="5" placeholder="Write Answer"></textarea>
            </div><br>
      <button class="faqbtn">Save</button>
      <!-- <input type="submit" value="Log in"/> -->
    </form>
</div>
</body>
</html>