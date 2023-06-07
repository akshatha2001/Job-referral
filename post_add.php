<?php
include('connection.php');
session_start();
$email=$_SESSION['email'];
$company=$_POST['company'];
$_SESSION['email']=$email;
if($cn->query("insert into job_post(email,company_name,description,title,skills,website,place,ctc,status,refer) values('$email','$company','$_POST[description]','$_POST[title]','$_POST[skills]','$_POST[website]','$_POST[place]','$_POST[ctc]','pending','no')")){
	echo'<script>alert("job post uploaded");
	window.location.href="job_post.php"</script>';


}
?>