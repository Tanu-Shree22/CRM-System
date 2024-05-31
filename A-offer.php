
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
    <link href="css/admin_table.css" type="text/css" rel="stylesheet">
</head>

<body>
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
    <h1><u>Promotions</u></h1>
    
    <button class="add_btn" name="add" onclick="fun()">+ Add</button>
    <script>
    function fun(){
        location.replace("add-offer.php");
    }
    </script>
    <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search offer..">
    <br>
    <table class="container">
	
   <tr>
   <th>Id</th>
       <th>Title</th>
       <th>Product Category</th>
       <th>Details</th>
       <th>Start Date</th>
       <th>Due Date</th>
	   <th>Action</th>
      
       
      
   </tr>
   <?php
	require_once "config.php";
    error_reporting(0);
	$sql = "SELECT id, title, product_type, details, start,due FROM offers ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
			
        echo"<tr class='element'><td>" . $id . "</td>
       <td>" . $row['title'] . "</td> 
       <td>" .  $row['product_type'] . "</td> 
       <td>" .  $row['details'] . "</td>
       <td>" .  $row['start'] . "</td>
       <td>" .  $row['due'] .  "</td>
       
      
      <td> 
       <a ' href='update_offer.php?id=" .$row['id']. "' ><button class='delete'>Edit  </button></a> 
     <a onClick=\"javascript: return confirm('Are you sure to delete this record?');\"href='delete_offer.php?id=" .$row['id']. "'> <button class='delete'>Delete </button></a>
       </td><br>
    </tr> ";
    

	
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
   