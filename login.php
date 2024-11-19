<?php 
include 'db.php';
session_start();

if (isset($_SESSION['email'])) {
	header('location:profile.php');
}

else{

	if (isset($_POST['login'])) {

	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$q = "SELECT * FROM `user` WHERE email = '$email' AND password = '$pwd' ";
	$run = mysqli_query($db,$q);
	$count = mysqli_num_rows($run);

	if ($count == 1) {
		$_SESSION['email'] = $email;
		header('location:profile.php');
	}
	else{
		echo "invalid user";
	}
}

}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title></title>
 </head>
 <body>
<!-- Button trigger modal -->
<center>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Login">
  Login 
</button>

<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Signup">
  SignUp 
</button>
</center>

<!-- Modal login -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="close">
      	<span aria-hidden="true">&times;</span>
      </button>
</div>
	<div class="modal-body">
      <div class="container-fluid">
  <form method="POST">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" width="50px;" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" width="50px;" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
   <button type="submit" name="login" class="btn btn-primary">Login</button>
  </form>
</div>
</div>  
  </div>
  </div>
  </div>
  		
  									<!-- LOGIN MODAL END -->







														<!-- SIGNUP MODAL START -->
<div class="modal fade" id="Signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <div class="container-fluid">
  <h2>Registration</h2>
  <form method="POST" enctype="multipart/form-data">
  	  <div class="form-group">
      <label>Name:</label>
      <input type="text" width="50px" class="form-control" placeholder="Enter Name" name="name">
    </div>

    <div class="form-group">
      <label>Email:</label>
      <input type="email" width="50px" class="form-control" placeholder="Enter Email" name="email">
    </div>

    <div class="form-group">
      <label>Password:</label>
      <input type="password" width="50px" class="form-control" placeholder="Enter Password" name="pass">
    </div>

 	<div class="form-group">
      <label>Contact Number:</label>
      <input type="number" width="50px" class="form-control" placeholder="Enter Contact Number" name="num">
    </div>

 	  <div class="form-group">
      <label>Date Of Birth:</label>
      <input type="date" width="50px" class="form-control" placeholder="Enter Date Of Birth" name="dob">
    </div>

     <div class="form-group">
      <label>Picture:</label>
      <input type="file" class="form-control" name="dp">
    </div>


    <button type="submit" class="btn btn-warning" name="btn">Submit</button>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

												<!-- SIGNUP MODAL END -->										
</body>
</html>


												<!-- SIGN UP MODAL PHP -->
<?php 
if (isset($_POST['btn'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$num = $_POST['num'];
$dob = $_POST['dob'];
$imgname = $_FILES ['dp']['name'];
$folder = "images/" . $imgname;
$loc = $_FILES['dp']['tmp_name'];
move_uploaded_file($loc,$folder);

$query = mysqli_query($db,"SELECT * FROM `USER` WHERE Email = '$email' ");
if(mysqli_num_rows($query)>0)
{
  echo "Email Already Exist";
}

else{

$query = "INSERT INTO `user`(`ID`, `Name`, `Email`, `Password`, `Contact Number`, `Date Of Birth`,`Picture`) VALUES ('','$name','$email','$password','$num','$dob','$folder')";
$run = mysqli_query($db,$query);
}
}
?>