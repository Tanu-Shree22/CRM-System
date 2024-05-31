<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product </title>
    <link href="css/cutomer_data.css" type="text/css" rel="stylesheet">
</head>

<body>
<style>
   body {  background-color: #d1f1e9;
    
    }
    </style>
    <h1>Add New Product</h1>
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
 <form  method="post" id="form">
  
 <!-- Create Form -->
        
 <!-- Details -->
<div class="form-control">

                <label for="id" id="id">
                   Product Id
                </label>

                <!-- Input Type Email-->
                <input type="text" id="id" name="p_id" placeholder="product id" />
            <br>
            <label for="name" id="name">
                    Product Name
                </label>

                <!-- Input Type Email-->
                <input type="text" id="name" name="name" placeholder="product name" />
            <br>
            <label for="product_type" id="category">
                    Product Category
                </label>
<select name="product_type">
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

              
                <input type="number" id="price" name="price" placeholder="cost of product" />
           
<br>
           
            
            <button  type="submit" value="submit" name="submit">
                ADD
            </button>
            </div>
        </form>
</body>
</html>
<?php
require_once('config.php');
    if(isset($_POST["submit"])){
        
        $id= trim($_POST['p_id']);
        $name = trim($_POST['name']);
        $type =  trim($_POST['product_type']);
        $price = trim($_POST['price']);
       
        
        if(!empty('$id') && !empty('$name') && !empty('$product_type') && !empty('$price')) {
        $sql = "INSERT INTO product_data( product_id, product_name, category, price) VALUES(  '$id', '$name', '$type', '$price' )"; 
        $result = mysqli_query($conn, $sql);
        if ($result)
        { header("location: product_data.php");
    }else{
        echo"Data not inserted." . mysqli_error($conn);
    }
        }
        else {
            echo "something went wrong";
        }
}
?>  
                            