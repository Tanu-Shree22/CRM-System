<?php
 require_once 'config.php';
//  error_reporting(0);
   
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
	 
	$title = trim($_POST['title']);
	$product_type = ($_POST['product_type']);
	$details = trim($_POST['details']);
	$start = trim($_POST['start']);
	$due = trim($_POST['due']);
	$items = implode(',', $product_type);
	$filename = $_FILES["offer-logo"]["name"];
    $tempname = $_FILES["offer-logo"]["tmp_name"];    
        $folder = "img/". $filename;
      
   
	$sql = "INSERT INTO offers(title, image, product_type, details, start,due) VALUES( '$title', '$filename','$items', '$details' , '$start', '$due' )"; 
  
	$result = mysqli_query($conn, $sql);
	if ($result)
	{     
		// header("location: A-offer.php");
	
            // $_SESSION[''] = $answer;
            // $_SESSION['mail'] = $email_id;
                    require "login-system-main/Mail/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
    
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='mycrm2022@gmail.com';
                    $mail->Password='Gendustem';

					$sql = "SELECT * FROM target_customers ";
					$res = mysqli_query($conn, $sql);
				  if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_assoc($res)) {
							
                    $mail->setFrom('mycrm2022@gmail.com','MyCRM' );
                    $mail->addAddress($row['email']);
					}
                    $mail->isHTML(true);
                    $mail->Subject= $title;
                    $mail->Body= " <p>Your Today's Offer is here...</p> <br>
					<h2>" . $title . " </h2>  <br>
					 <h4>" . $details . "</h4>
								
					  
            
                 <br><br>
                    
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
                                    alert("<?php echo "offer sent to target customers. " ?>");
									window.location.href = "A-offer.php";
                                </script>
                              <?php
            }}
		  }
    
	// }
	else{
		echo"something went wrong". mysqli_error();
	}
}


       ?>
	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD OFFER</title>
    <link href="css/add-offer.css" type="text/css" rel="stylesheet">
</head>
<body>
<style>
   body {
        background-color: rgb(218, 217, 238);
    
    }
    </style>
	
<header>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="login page.php"> <button class="logbtn">Log in</button></a></li> -->
            
            <li><a href="offer_report.php" >Reports</a></li>
            <li><a href="Admin FAQs.php" >FAQs</a></li>
            <li><a href="product_data.php" >Product Data</a></li>
            <li><a href="employee_data.php">Employee Data</a></li>

            <li><a href="A-offer.php" class="active">Offers</a></li>
            <li><a href="admin page.php"  >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   <h1>Add New Offer</h1>
    <form  id="form"  method="post" enctype="multipart/form-data">
   

	

		
	
	
    <hr>
   
	<!-- Create Form -->


		<!-- Details -->
		
		<div class="form-control">
			<label for="title" id="label-name">
				Title
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="name" name="title"
				placeholder="Enter Title of offer" />
		</div>
		<div class="form-control">
			<label for="" id="label-name">
				Offer logo
			</label>

			<!-- Input Type Text -->
			<input type="file" id="myfile" onchange="#displaypic" name="offer-logo">
		</div>
		<div class="form-control">
			<label for="product" id="label-email">
				Product Category
			</label>

			<!-- Input Type Email-->
			<input type="checkbox" id ="Fashion "name="product_type[]" value="Fashion">
<label for="Fashion"> Fashion</label><br>
<input type="checkbox" id="Mobiles and Tablets" name="product_type[]" value="Mobiles and Tablets">
<label for="Mobiles and Tablets"> Mobiles and Tablets</label><br>
<input type="checkbox" id="Consumer Electronics" name="product_type[]" value="Consumer Electronics">
<label for="Consumer Electronics">Consumer Electronics</label><br>
<input type="checkbox" id="Books" name="product_type[]" value="Books">
<label for="Books">Books</label><br>
<input type="checkbox" id="Baby Products" name="product_type[]" value="Baby Products">
<label for="Baby Products"> Baby Products</label><br>
<input type="checkbox" id="Groceries" name="product_type[]" value="Groceries">
<label for="Groceries"> Groceries</label><br>



		<div class="form-control">
			<label for="details" id="label-email">
				Details
			</label>

			<!-- Input Type Email-->
			<input type="text"
				id="details" name="details"
				placeholder="Enter details of the offer" />
		</div>

		<div class="form-control">
			<label for="start" id="label-age">
				Start date
			</label>

			<!-- Input Type Text -->
			<input type="date"
				id="start" name="start"
				placeholder="Enter start date" />
		</div>
        <div class="form-control">
			<label for="end" id="label-age">
				Due date
			</label>

			<!-- Input Type Text -->
			<input type="date"
				id="end" name="due"
				placeholder="Enter due date" />
		</div>

		
				
	<!-- Multi-line Text Input Control -->
		<button type="submit" name="submit">
			Add
		</button>
		
	
	</form>
</body>

</html>

    </form>
	

	
