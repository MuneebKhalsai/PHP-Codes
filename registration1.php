<?php 
include('db.php')
 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 	<title></title>
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

 	<div class="form-group">
      <label>Contact Number:</label>
      <input type="number" class="form-control" placeholder="Enter Contact Number" name="num">
    </div>

 	  <div class="form-group">
      <label>Date Of Birth:</label>
      <input type="date" class="form-control" placeholder="Enter Date Of Birth" name="dob">
    </div>

      <div class="form-group">
      <label>Picture:</label>
      <input type="file" class="form-control" name="dp">
    </div>

    <button type="submit" class="btn btn-default" name="btn">Submit</button>
  </form>
</div>
 </body>
 </html>

 <?php 
if (isset($_POST['btn'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$num = $_POST['num'];
$dob = $_POST['dob'];
$dp = $_POST['dp'];

$query = "INSERT INTO `user`(`ID`, `Name`, `Email`, `Password`, `Contact Number`, `Date Of Birth`, `Picture`) VALUES ('','$name','$email','$password','$num','$dob','$dp')";
$run = mysqli_query($db,$query);
}


  ?>