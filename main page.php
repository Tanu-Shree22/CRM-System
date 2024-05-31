<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>main page</title>
</head>
<body>
    <style>
  
    
 body{

     background:  url("img/concept1.jpg");
     background-size: cover;
     background-repeat: no-repeat;
     background-size: 1360px 750px; 
 }

 #txt{
   padding-top:0;
 color: black;
 text-align: center;
 font-size: 35px;
 font weight: 20px;
   font-family:  sans-serif;
}
#txt-small{
 color: black;
 text-align: center;
 font-size: 32px;
 position: absolute;
 left: 500px;
 bottom:41%;
 font-family: Georgia, 'Times New Roman', Times, serif;
}
.signup-btn{
    position: absolute;
    bottom: 41px;
   left: 480px;
 
     
  }
  .login-btn{
    position: absolute;
   left: 680px;
   bottom: 41px;

  }
.btn{
 
    width: 175px;
    height: 50px;
    background-color: rgb(224, 71, 0);
    border-radius: 10px;
    border: 2px rgb(233, 136, 80);
    color: rgb(247, 247, 247);
    font-size: 20px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-weight: 500;
    cursor: pointer;
   
}
#logo{
    position: absolute;
    left: 0;
    top: 0;
    height: 1px; 
    width: 12px;
    border-radius: 2%;
    /* filter: invert(100%) */
}
    </style>
    
        
       
  
   <div id="txt">
     <h1>
       Welcome to
</h1>
<!-- <div id="logo">
    <img src="img/crm-icon-png.png" alt="logo" height="67px" width="95px">
  </div> -->
   <div id ="txt-small">
    <p>We are here for you...</p>
   </div>
   <div class="signup-btn" > 
        <a href="register.php" ><input class="btn" type="submit" value="Sign Up Now"/></a>
      </form>
    </div>
    <div class="login-btn" >
      <!-- <form method="post" action="" -->
      <a href="login page.php" ><button class="btn" >Log in</button></a>
  </div>
    
</html>
</body>
</html>