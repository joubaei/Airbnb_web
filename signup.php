<?php

include "config.php";

if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$pass = mysqli_real_escape_string($con, md5($_POST['password']));
$cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));
$user_type = $_POST['user_type'];

$select_users = mysqli_query($con, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

if(mysqli_num_rows($select_users) > 0){
   $message[] = 'user already exist!';
}else{
   if($pass != $cpass){
      $message[] = 'confirm password not matched!';
   }else{
      mysqli_query($con, "INSERT INTO `users`(name, email, password, type) VALUES('$name', '$email', '$cpass', '$type')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login.php');
   }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!--  css link  -->
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

<div class="form-container">
   <div class="main">
   <div class="header1">
      <h3>Register Now</h3>
    </div>
      <form action="" method="post">         
         <input type="text" name="name" placeholder="enter your name" required class="box">
         <input type="email" name="email" placeholder="enter your email" required class="box">
         <input type="password" name="password" placeholder="enter your password" required class="box">
         <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
         <div><center><select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
         </select></center></div>
         <p class = "option2">already have an account? <a href="login.php">login now</a></p>
         <center><input type="submit" name="submit" value="register now" class="btn"></center>
         
      </form>

</div>

</body>
</html>