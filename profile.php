<?php 
error_reporting(0);
include 'db.php';
session_start();
if (!isset ($_SESSION['email'])) {
	header('location:login.php');
}


else{
$email = $_SESSION['email'];
$query = "SELECT * FROM `user` WHERE email = '$email' ";
$run = mysqli_query($db,$query);
$user_info = mysqli_fetch_assoc($run);
$name = $user_info['Name'];
$dp = $user_info['Picture'];
echo "Hello Dear <b>$name</b>";
}
?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <div>
 <img src="<?php echo $dp ?>" width="350px;" alt="image">
 <p>WordPress Web Hosting at Affordable Prices
As low as 99/- PKR per month for 5 GB SSD Plan</p>
<p>Jazzcash, Easypaisa, Bank Transfer, PayPal & Credit/Debit Card payment options</p>
<a href="https://vibrahost.com/hosting/shared-hosting/">Click Here For Order</a><br><br>
<a href="logout.php">Logout</a>

 </div>
 </body>
 </html>