<?php

include "config.php";
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));

   $select_users = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:../backend/admin_page.php');

      }elseif($row['type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:airbnbHome.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="airbnb2.css">

</head>
<body>


<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<!-- <div class="form-container"> -->
<!-- <div class="form-container">

<form action="" method="post">
   <h3>login now</h3>
   <input type="email" name="email" placeholder="enter your email" required class="box">
   <input type="password" name="password" placeholder="enter your password" required class="box">
   <input type="submit" name="submit" value="login now" class="btn">
   <p>don't have an account? <a href="register.php">register now</a></p>
</form> -->

</div>

<div class="form-container">
   <div class="main">
   <div class="header1">
        <h2>Login Now</h2>
    </div>
      <form action="" method="post">
         <input type="email" name="email" placeholder="enter your email" required class="box">
         <input type="password" name="password" placeholder="enter your password" required class="box">
         <p class = "option2">don't have an account? <a href="signup.php">register now</a></p>
         <center> <input type="submit" name="submit" value="login now" class="btn"> </center>
      </form>
   </div>
</div>

</body>
</html>