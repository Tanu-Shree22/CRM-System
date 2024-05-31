<?php 
if(!isset($_GET['id'])){
    // redirect to show page
    die('id not found.');
}
require_once('config.php');
$id =  $_GET['id'];
$sql = "SELECT * FROM offers where id = $id";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) <=0){
    // redirect to show page
    die('id is not in database');
}
$row = mysqli_fetch_assoc($result);
$a = $row['product_type'];
$b= explode(",", $a);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Offer</title>
    <link href="css/add-offer.css" type="text/css" rel="stylesheet">
</head>
<body>

<header>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="login page.php"> <button class="logbtn">Log in</button></a></li> -->
            
            <li><a href="" >Reports</a></li>
            <li><a href="Admin FAQs.php" >FAQs</a></li>
            <li><a href="product_data.php">Product Data</a></li>
            <li><a href="employee_data.php">Employee Data</a></li>

            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="admin page.php" class="active" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   <h1>Edit Offer Details</h1>
	<form id="form"  method="POST" enctype="multipart/form-data">

		<!-- Details -->
		
		<div class="form-control">
			<label for="title" id="label-name">
				Title
			</label>

			<!-- Input Type Text -->
			<input type="text"
				id="name" name="title"
				value= "<?= $row['title']?>" />
		</div>
		<div class="form-control">
			<label for="" id="label-name">
				Offer logo
			</label>
      <img src="img/<?php echo $row['image']; ?>"  width='100px' height='100px' >
      <input type="hidden" name="previous" value="<?php echo $row['image']?>"/>
							<!-- <h3>New Photo</h3> -->
							<input type="file" name="offer_logo" value="<?php echo $row['image']?>" required="required"/>
						
		</div>
		<div class="form-control">
			<label for="product" id="label-email">
				Product Category
			</label><input type="checkbox" id ="Fashion "name="product_type[]" value="Fashion">
      <?php
      if(in_array("Fashion", $b)){
        // echo "checked";
      }
      ?>
<label for="Fashion"> Fashion</label><br>
<input type="checkbox" id="Mobiles and Tablets" name="product_type[]" value="Mobiles and Tablets">
<?php
      if(in_array("Mobiles and Tablets", $b)){
        // echo "checked";
      }
      ?>
<label for="Mobiles and Tablets"> Mobiles and Tablets</label><br>
<input type="checkbox" id="Consumer Electronics" name="product_type[]" value="Consumer Electronics">
<?php
      if(in_array("Consumer Electronics", $b)){
        // echo "checked";
      }
      ?>
<label for="Consumer Electronics">Consumer Electronics</label><br>
<input type="checkbox" id="Books" name="product_type[]" value="Books">
<?php
      if(in_array("Books", $b)){
        // echo "checked";
      }
      ?>
<label for="Books">Books</label><br>
<input type="checkbox" id="Baby Products" name="product_type[]" value="Baby Products">
<?php
      if(in_array("Baby Products", $b)){
        // echo "checked";
      }
      ?>
<label for="Baby Products"> Baby Products</label><br>
<input type="checkbox" id="Groceries" name="product_type[]" value="Groceries">
<?php
      if(in_array("Groceries", $b)){
        // echo "checked";
      }
      ?>
<label for="Groceries"> Groceries</label><br>
		<div class="form-control">
			<label for="details" id="label-email">
				Details
			</label>

			<!-- Input Type Email-->
			<input type="text"
				id="details" name="details"
				value= "<?= $row['details'] ?>" />
		</div>

		<div class="form-control">
			<label for="start" id="label-age">
				Start date
			</label>

			<!-- Input Type Text -->
			<input type="date"
				id="start" name="start"
				value= "<?= $row['start'] ?>" />
		</div>
        <div class="form-control">
			<label for="end" id="label-age">
				Due date
			</label>

			<!-- Input Type Text -->
			<input type="date"
				id="end" name="due"
				value= "<?= $row['due'] ?>" />
		</div>

		
				
	<!-- Multi-line Text Input Control -->
		<button type="submit" name="edit">
			Edit
		</button>
		
	
	</form>
</body>
</html>
<?php
    require_once('config.php');

    if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_GET['id'];
        $title = trim($_POST['title']);
        $product_type = ($_POST['product_type']);
        $details = trim($_POST['details']);
        $start  = trim($_POST['start']);
        $due = trim($_POST['due']);
        $items = implode(',', $product_type);
        $previous = $_POST['previous'];
       
        $filename = $_FILES["offer-logo"]["name"];
        $tempname = $_FILES["offer-logo"]["tmp_name"];    
            $folder = "img/".$filename;
             unlink( $previous);
             move_uploaded_file($tempname, $folder);
        $sql = " UPDATE offers SET title = ' $title', image= ' $filename', details = ' $details ' , product_type = ' $items ' ,  start = '$start' , due = ' $due'  WHERE offers.id = '$id'";
    
$result = mysqli_query($conn, $sql);
if ($result){
            echo "<script>  alert('Offer updated successfully.');
            window.location.href= 'A-offer.php' ;</script>";
            // header('Location:A-offer.php');
        }else{
            echo mysqli_error($conn);
        }
        
    }
?>
<!-- $image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$previous = $_POST['previous'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		if(!is_dir("./upload"))
			mkdir("upload");
		$path = "upload/".$name;
 -->
