<?php
require_once 'config.php';
// sql to delete a record
  
   

		
	
$id = $_GET['id'];			


$sql = "DELETE FROM product_data WHERE product_id= $id";
if (mysqli_query($conn, $sql) === TRUE) {
    
  echo ' <script>
    alert("Row deleted successfully.")
    window.location.href= "product_data.php"
    </script>';
   
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);


?>
