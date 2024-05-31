
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Data</title>
    <link href="css/admin_table.css" type="text/css" rel="stylesheet">
</head>

<body>
    <h1><u>Product Data</u></h1>
   
        <header>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php"> <button class="logbtn">Log out</button></a></li>
            <!-- <li><a href="login page.php"> <button class="logbtn">Log in</button></a></li> -->
            
            <li><a href="" >Reports</a></li>
            <li><a href="Admin FAQs.php" >FAQs</a></li>
            <li><a href="product_data.php" class="active">Product Data</a></li>
            <li><a href="employee_data.php">Employee Data</a></li>

            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="admin page.php" class="active" >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
    <button class="add_btn" name="add" onclick="fun()">+Add</button>
    <script>
    function fun(){
        location.replace("add_product.php");
    }
    </script>
    <input id="searchbar" onkeyup="search()" type="text"
        name="search" placeholder="Search...">
    <br>
    <table class="container">
	
   <tr>
       <th>Product Id</th>
       <th>Product Name</th>
       <th>Category</th>
       <th>Price</th>
       
       <th>Action </th>
       
      
   </tr>
   <?php
	require_once "config.php";
    error_reporting(0);
	$sql = "SELECT * FROM product_data ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
               
        echo"<tr class='element'><td>" .  $row['product_id'] . "</td>
       <td>" . $row['product_name'] . "</td> 
       <td>" .  $row['category'] . "</td> 
       <td>" .  $row['price'] . "</td>
       
       
	   
       
      
      <td> <a ' href='edit_product.php?id=" .$row['product_id']. "'><button class='del_btn'>Edit </button></a>
     <a onClick=\"javascript: return confirm('Are you sure to delete this record?');\"href='delete_product.php?id=" .$row['product_id']. "'> <button class='del_btn'>Delete </button></a>
       </td>
    </tr>";
    

	
}}
 else{
	echo "something went wrong.";
}
		


?> 

<script>

        </script>  
 <script src="js/search.js"></script>    

 </table>
</body>
</html>
   