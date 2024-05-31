<?php
 require_once('config.php');

 if( $_SERVER['REQUEST_METHOD'] == "POST"){
     $id = $_GET['id'];
    $p_id =   trim($_POST['p_id']);
        $name = trim($_POST['name']);
        $type =  trim($_POST['product_type']);
        $price = trim($_POST['price']);
    

     $sql = " UPDATE product_data SET product_id= '$p_id' ,  product_name= ' $name', category = ' $type ' , price = ' $price '  WHERE product_id = '$id'";

$result = mysqli_query($conn, $sql);
if ($result){
    header("location:product_data.php");
}
else{
    echo "something went wrong" . mysqli_error($conn);
}
 }
?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee data</title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>

<body>
<style>
   body {
        background-color: rgb(218, 217, 238);
    
    }
    </style>

  <h1>Edit Product Details</h1>
  <header>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="login page.php"> <button class="logbtn">Log in</button></a></li> -->
            
            <li><a href="offer_report.php" >Reports</a></li>
            <li><a href="Admin FAQs.php" >FAQs</a></li>
            <li><a href="product_data.php" class="active">Product Data</a></li>
            <li><a href="employee_data.php">Employee Data</a></li>

            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="admin page.php"  >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   <form  method="post" id="form">
<div class="form-control">
<?php
   
   
   require_once "config.php";
   // $email = $_SESSION["username"];
   $id =  $_GET['id'];
   $sql = "SELECT * FROM product_data WHERE product_id= '$id' ";
       $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               ?>
                 <label for="id" id="id">
                   Product Id
                </label>

                <!-- Input Type Email-->
                <input type="text" id="id" name="p_id"  value ="<?php echo $row['product_id']; ?>" />
            <br>
            <label for="name" id="name">
                    Product Name
                </label>

                <!-- Input Type Email-->
                <input type="text" id="name" name="name"  value ="<?php echo $row['product_name']; ?>" />
            <br>
            <label for="product_type" id="category">
                    Product Category
                </label>
<select name="product_type"  value ="<?php echo $row['category']; ?>">
    <option value="Fashion">Fashion</option>
    <option value="Mobiles and Tablets">Mobiles and Tablets</option>
    <option value="Consumer Electronics">Consumer Electronics</option>
    <option value="Books">Books</option>
    <option value="Baby Products">Baby Products</option>
    <option value="Groceries">Groceries</option>
</select>
<br>
            <label for="price" id="price">
                    Product Price
                </label>

              
                <input type="number" id="price" name="price"  value ="<?php echo $row['price']; ?>" />
           
<br>
           
            
            <button  type="submit" value="submit" name="submit">
                Update
            </button>
            </div>
        </form>
</body>
</html>
<?php 
   
    }

}
?>  
                            