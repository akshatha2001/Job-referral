<?php
include('connection.php');
$jobpost_id=$_GET['jobpost_id'];
$status=$_GET['status'];
$email=$_GET['email'];
if($status=='approve'){

	$res=$cn->query("insert into status values('$email','0','$jobpost_id'");
	if($cn->query("update applications set status='approve' where jobpost_id='$jobpost_id' and email='$email'"))
	{
		echo'<script>
			alert("applications approved successfully");
			window.location.href="applications.php";
		</script>';
	}
}

if($status=='reject'){

	if($cn->query("update applications set status='reject' where jobpost_id='$jobpost_id' and email='$email'"))
	{
		echo'<script>
			alert("applications rejected successfully");
			window.location.href="applications.php";
		</script>';
	}
}

?>