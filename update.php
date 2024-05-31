<?php
    require_once('config.php');

    if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_GET['id'];
        $title = trim($_POST['title']);
        $product_type = array($_POST['product_type']);
        $details = trim($_POST['details']);
        $start  = trim($_POST['start']);
        $due = trim($_POST['due']);
        $items = implode(',', $product_type);
        $filename = $_FILES["offer-logo"]["name"];
        $tempname = $_FILES["offer-logo"]["tmp_name"];    
            $folder = "img/".$filename;
          
        $sql = " UPDATE offers SET title = ' $title', image= ' $filename', details = ' $details ' , product_type = ' $items ' ,  start = '$start' , due = ' $due'  WHERE offers.id = '$id'";
      $run =  move_uploaded_file($tempname, $folder);
$result = mysqli_query($conn, $sql);
if ($result && $run){
            echo "<script>  alert('Offer updated successfully.');
            window.location.href= 'A-offer.php' ;</script>";
            // header('Location:A-offer.php');
        }else{
            echo "something went wrong";
        }
        
    }else{
        echo "invalid id";
    }
?>

