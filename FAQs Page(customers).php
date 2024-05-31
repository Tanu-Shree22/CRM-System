
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ PAGE</title>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/faq-style.css">
    <link rel="stylesheet" href="css/homepage.css">

</head>

<body>

    <main>

        <h1>FAQ'S</h1>
          
         <div class="faq-one">
         <?php
        require_once "config.php";
        $sql = "SELECT * FROM faqs ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                
                  ?>
              <!-- faq question -->
                <h3 class="faq-page"><?php echo $row['question']; ?></h3>

                <!-- faq answer -->
                <div class="faq-body">
                    <p><?php echo $row['answer']; ?>
                      </p>
                </div>
            </div>
            <hr class="hr-line">
<?php
                }}
                ?>
            
      
    </main>
   
</body>


</html>

