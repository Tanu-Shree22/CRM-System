<?php
require_once 'config.php';
// sql to delete a record

		
	
$id = $_GET['id'];			


$sql = "DELETE FROM customer_data WHERE id= $id";
if (mysqli_query($conn, $sql) === TRUE) {
    
  echo ' <script>
    alert("Row deleted successfully.")
    window.location.href= "data.php"
    </script>';
   
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);


?>
