<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap5.css">
  <script src="bootstrap-4.6.2-dist\jQuery.js"></script>
  <script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>	
<?php
include('connection.php');
session_start();
$email=$_SESSION['email'];
$type=$_SESSION['type'];
echo'
<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;margin-top: 100px;">
<form method="POST">
<div class="form-group">
Email
<input type="text" value="'.$email.'" class="form-control" name="email">
New Password
<input type="password" class="form-control" name="password" placeholder="Enter new password"><br>
<input type="submit" name="submit" value="Change password" class="btn btn-primary">
</div>
</form>
</div>';
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	if($type=="student"){
		if($cn->query("update student set password='$password' where email='$email'")){
			echo'<script>alert("Password changed");
			window.location.href="login.php";</script>';
		}
	}
	else
	{
		if($cn->query("update alumni set password='$password' where email='$email'")){
			echo'<script>alert("Password changed");
			window.location.href="login.php";</script>';
		}

	}
	
}
?>