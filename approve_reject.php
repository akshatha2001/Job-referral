<?php
include('connection.php');
$email=$_GET['email'];
$status=$_GET['status'];
echo $email;
if($status=='approve'){
if($_GET['on']=='student'){
	if($cn->query("update student set status='approve' where email='$email'"))
	{
		echo'<script>
			alert("student approved successfully");
			window.location.href="student_approvereject.php";
		</script>';
	}
}
else if($_GET['on']=='alumni'){
	if($cn->query("update alumni set status='approve' where email='$email'"))
	{
		echo'<script>
			alert("alumni approved successfully");
			window.location.href="alumni_approvereject.php";
		</script>';
	}
}
}
if($status=='reject'){
if($_GET['on']=='student'){
	if($cn->query("update student set status='reject' where email='$email'"))
	{
		echo'<script>
			alert("student rejected successfully");
			window.location.href="student_approvereject.php";
		</script>';
	}
}
else if($_GET['on']=='alumni'){
	if($cn->query("update alumni set status='reject' where email='$email'"))
	{
		echo'<script>
			alert("alumni rejected successfully");
			window.location.href="alumni_approvereject.php";
		</script>';
	}
}
}
?>