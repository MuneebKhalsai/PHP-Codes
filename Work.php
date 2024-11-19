<?php
$db= mysqli_connect("localhost","root","","work");
?>



<?php 
if (isset($_POST['btn'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($db,"SELECT * FROM `USER` WHERE Email = '$email' ");
if(mysqli_num_rows($query)>0)
{
  echo "Email Already Exist";
}

else{

$query = "INSERT INTO `work`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
$run = mysqli_query($db,$query);
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
  <h2>Registration</h2>
  <form method="POST">
  	  <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" placeholder="Enter Name" name="name">
    </div>

    <div class="form-group">
      <label>Email:</label>
      <input type="email" class="form-control" placeholder="Enter Email" name="email">
    </div>

    <div class="form-group">
      <label>Password:</label>
      <input type="password" class="form-control" placeholder="Enter Password" name="pass">
    </div>


    <p class="forgot-pass">Forgot password?</p>
            <button type="submit" class="submit">Sign In</button>
         
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Please Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
      </form>
                <div class="img__btn">
                    <span class="m--up">Login</span>
                    <span class="m--in">SignUP</span>
                </div>
            </div>


</body>
</html>