<?php
include('connection.php');
session_start();
$email=$_SESSION['email'];
$_SESSION['email']=$email;
if($_GET['from']=='student'){
	$username=$_POST['username'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$class=$_POST['class'];
$regino=$_POST['regino'];
$inst=$_POST['institute'];$target="";
	if($file==""){
		$rslt=$cn->query("select * from student where email='$email'");
		$r=$rslt->fetch_assoc();
		$target=$r['image'];
	}
	else
	{
		$target = "files/".basename($file);
		move_uploaded_file($_FILES['file']['tmp_name'], $target);

	}
$institute=mysqli_real_escape_string($cn,$inst);
if($cn->query("update student set username='$username',name='$name',phone='$phone',address='$address',class='$class',regi_number='$regino',institute='$institute',image='$target' where email='$email'")){
	

	echo"<script>alert('profile updated');
	window.location.href='student_profile.php';</script>";
}


}
else if($_GET['from']=='alumni'){
	$file = $_FILES['file']['name'];
	$target="";
	if($file==""){
		$rslt=$cn->query("select * from alumni where email='$email'");
		$r=$rslt->fetch_assoc();
		$target=$r['image'];
	}
	else
	{
		$target = "files/".basename($file);
		move_uploaded_file($_FILES['file']['tmp_name'], $target);

	}

if($cn->query("update alumni set username='$_POST[username]',name='$_POST[name]',phone='$_POST[phone]',designation='$_POST[designation]',qualification='$_POST[qualification]',image='$target' where email='$email'")){
	 

	echo"<script>alert('profile updated');
	window.location.href='alumni_profile.php';</script>";

}

}

?>