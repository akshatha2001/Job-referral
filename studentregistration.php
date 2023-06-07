<?php
include('connection.php');
$name=$_GET['name'];
$email=$_GET['email'];
$username=$_GET['username'];
$password=$_GET['password'];
if($cn->query("insert into student(name,email,username,password,status,image) values('$name','$email','$username','$password','pending','files/blank-profile.png')"))
{
	echo"<script>
		alert('Register successfully');
			window.location.href='login.php';
	</script>";
}
?>