<?php
include('connection.php');
$email=$_GET['email'];
echo $email;
if($_GET['on']=='student'){
	if($cn->query("update student set status='approve' where email='$email'"))
	{
		echo'<script>
			alert("student approved successfully");
			window.location.href="student_approvereject.php";
		</script>';
	}
}
?>