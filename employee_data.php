
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
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
            <li><a href="product_data.php">Product Data</a></li>
            <li><a href="employee_data.php" class="active">Employee Data</a></li>

            <li><a href="A-offer.php">Offers</a></li>
            <li><a href="admin page.php"  >Home </a></li>
            <img src="img/crm-icon-png.png" alt="logo">
        </ul>
    </nav>
   </header>
   <h1><u>Employee Information</u></h1>
    <button class="add_btn" name="add" onclick="fun()">+Add</button>
    <script>
    function fun(){
        location.replace("add_empl.php");
    }
    </script>
    <input id="searchbar" onkeyup="search_animal()" type="text"
        name="search" placeholder="Search customer..">
    <br>
    <table class="container">
	
   <tr>
       <th>Customer Id</th>
       <th>E-mail</th>
       <th>Full Name</th>
       <th>Phone No.</th>
       <th>Age</th>
	   <th>DOB</th>
       <th>Address</th>
       <th>Action </th>
       
      
   </tr>
   <?php
	require_once "config.php";
    error_reporting(0);
	$sql = "SELECT * FROM employee_data ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
               
        echo"<tr class='element'><td>" .  $row['emp_id'] . "</td>
       <td>" . $row['email'] . "</td> 
       <td>" .  $row['full_name'] . "</td> <td>" . $row['phone'] . "</td>
       <td>" .  $row['age'] . "</td>
       <td>" .  $row['DOB'] . "</td>
      
       <td>" .  $row['address'] . "</td>
       
	   
       
      
      <td> <a ' href='update_emp.php?id=" .$row['emp_id']. "'><button class='del_btn'>Edit </button></a>
     <a onClick=\"javascript: return confirm('Are you sure to delete this record?');\" href='delete_emp.php?id=" .$row['emp_id']. "'> <button class='del_btn'>Delete </button></a>
       </td>
    </tr>";
    

	
}}
 else{
	echo mysqli_error($conn);
}
		


?> 

<script>

        </script>  
 <script src="js/search.js"></script>    

 </table>
</body>
</html>
   