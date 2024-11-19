<?php
$host = 'localhost';
$user = 'root';
$pass = '' ;
$database = 'test';


$connection = mysqli_connect($host,$user,$pass,$database);

if(isset($_POST['create'])){
  $email = $_POST['Email'];
  $pass = $_POST['Password'];

   $sql = "INSERT INTO `login`(`Email`, `Password`) VALUES (' $email','$pass')";

  if(mysqli_query($connection,$sql)){
    echo "Insert Successfully!";
  }
  else{
    echo "Connection Error!";
  }

  $connection->close();

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
  <form action="database.php" method = "Post" >
  <h3>Welcome To Login Page</h3>
  <div>
    <label for="Email">Email</label>
    <input type="email" name="Email" id="">
  </div><br>

<div>
  <label for="Password">Password</label>
<input type="password" name="Password" id="Password">
</div>

<div>
  <input type="Submit" value="Submit" name="create">
</div>

  </form>
</body>
</html>