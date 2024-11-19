 
<?php

$host = 'localhost';
$user = 'root';
$pass=  '';
$database = 'form';

$connection= mysqli_connect($host,$user,$pass,$database);

if(isset($_POST['create'])){
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $website = $_POST['Website'];
  $comment = $_POST['Comment'];
  $gender= $_POST['Gender'];

$sql = "INSERT INTO `login`(`Name`, `Email`, `Website`, `Comment`, `Gender`) VALUES (' $name','$email','$website','$comment',' $gender')";

if(mysqli_query($connection,$sql)){
  echo "Insert Successfully!";
}
else{
  echo "Connection Error!";
}

$connection->close();

}
?>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $commentErr= $websiteErr = "";
$name = $email = $gender = $comment =  $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if(!preg_match("/^[a-zA-Z' ]*$/",$name)){
      $nameErr = "Only text and white space are allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
 
 if(!filter_var($email, FILTER_VALIDATE_EMAIL )){
  $emailErr = "Invalid Email Formar";
 }
  }

  if (empty($_POST["website"])) {
    $websiteErr = "Website is required";
  } else {
    $website = test_input($_POST["website"]);

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
      $websiteErr = "Invalid Url";
    }
  }





  if (empty($_POST["comment"])) {
    $commentErr = "Comment is required";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<form action = "formvalidation.php" method= "Post"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>  
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<div>
  <label for="Name">Name</label>
   <input type="text" name="Name">
  <span class="error">* <?php echo $nameErr;?></span>
</div><br>
 <div>
   <label for="Email">Email</label>
  <input type="email" name="Email" id="">
  <span class="error">* <?php echo $emailErr;?></span>
</div><br>
<div> 
<label for="Website">Website</label>
<input type="text" name="Website">
  <span class="error">* <?php echo $websiteErr;?></span>
</div><br>
 <div>
 <label for="Comment">Comment</label> 
 <textarea name="Comment" rows="5" cols="40"></textarea>
  <span class = "error">* <?php echo $commentErr;?></span>
</div><br>
 <div> 
  <label for="Gender">Gender</label>
  <input type="radio" name="Gender" value="female">Female
  <input type="radio" name="Gender" value="male">Male
  <input type="radio" name="Gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
</div><br>
 <div> 
  <input type="Submit" value="Submit" name="create"> 
</div>
</form>
</body>
</html>
