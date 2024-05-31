<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/offer.css">
   <link rel="stylesheet" href="css/homepage.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Offers</title>
   </head>
<body>
    <style>
         body {
            background-image:url("img/wallpaper.jpeg");
            background-attachment: fixed;
            background-size: cover;
        } 
    </style>
    <header>
        <nav class="navbar">
            <ul>
                <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
                <!-- <li><a href="#">About</a></li> -->
                <li><a href = "customer Profile.php"> MyProfile</a></li>
               
                <li><a href="FAQs Page(customers).php">FAQs</a></li>

                <li><a href="Raise Complaint.php">Raise Complaint</a></li>

                <li><a href="cust-Offers.php" class="active">Offers</a></li>
                <li><a href="Customer Page.php" >Home </a></li>
                <img src="img/crm-icon-png.png" alt="logo">
            </ul>
        </nav>
    </header>
    
<?php
 require_once "config.php";
 error_reporting(0);
$sql = "SELECT image, title , date_format(due ,'%d/%m/%Y') as due_date FROM offers ";
 $result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) >= 0) {
   while ($row = mysqli_fetch_assoc($result)) {
 
  
  echo "<div class='crunchify-panel'>
 
  <a href='#'><img class='aligncenter size-full' src='img/" .  $row['image'] . "' alt='offer-logo' width='100' height='100' /></a>
  <h2 style='text-align: center;'> " . $row['title'] . "</h2>
 <a href='#'>Inside Details </a><br>
 
  <div class='crunchify-deals-coupon'> <p> Ending on:" .    $row['due_date'] . "</p>
  </div>
 </div>
 ";
           } 
          }
          else{
            echo"No results found";
          }
          ?>
         
    <!-- <div class="card">
        <div class="content">
          <div class="img">
            <img src="img/RDS.jpeg">
          </div>
          <div class="details">
            <div class="name">Republic Day Sale</div>
            <div class="duration">Jan 20th to Jan 24th</div>
            10% off on Rs.1500 and above
  garimasharma1782@gmail.com
  123456
  tsdoucs1008@gmail.com
          </div>
        </div>
       </div>
       <div class="card">
        <div class="content">
          <div class="img">
            <img src="img/EOSS.jpeg">
          </div>
          <div class="details">
            <div class="name">End of the Season Sale</div>
          <div class="duration">Feb 25th to Feb 27th</div>
          </div>
        </div>
       </div>
     </div>
     <div class="cards">
       <div class="card">
        <div class="content">
          <div class="img">
            <img src="img/SS.jpeg">
          </div>
          <div class="details">
            <div class="name">Spring Sale</div>
          <div class="duration">Mar 5th to Mar 8th</div>
          </div>
        </div>
       </div>
       <div class="card">
        <div class="content">
          <div class="img">
            <img src="img/BS.jpeg">
          </div>
          <div class="details">
            <div class="name">Beauty Sale</div>
            <div class="duration">Mar 6th to Mar 8th</div>
          </div>
        </div>
       </div>
       <div class="card">
        <div class="content">
          <div class="img">
            <img src="img/FS.jpeg">
          </div>
          <div class="details">
            <div class="name">Fitness Sale</div>
            <div class="duration">Mar 15th to Mar 18th</div>
          </div>
        </div>
       </div>
     </div>
   </div>
   <div class="button">
     <label for="one" class=" active one"></label>
     <label for="two" class="two"></label>
   </div> -->
 <!-- </div> -->
</body>
</html>
