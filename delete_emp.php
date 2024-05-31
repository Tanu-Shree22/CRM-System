<?php
require_once 'config.php';
// sql to delete a record
  
   

		
	
$id = $_GET['id'];			


$sql = "DELETE FROM employee_data WHERE emp_id= $id";
if (mysqli_query($conn, $sql) === TRUE) {
    
  echo ' <script>
    alert("Row deleted successfully.")
    window.location.href= "employee_data.php"
    </script>';
   
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);


?>
