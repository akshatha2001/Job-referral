<?php
include('connection.php');
$jobpost_id=$_GET['jobpost_id'];
$status=$_GET['status'];
if($status=='approve'){


	if($cn->query("update job_post set status='approve' where jobpost_id='$jobpost_id'"))
	{
		echo'<script>
			alert("Jobpost approved successfully");
			window.location.href="jobpost_approvereject.php";
		</script>';
	}
}

if($status=='reject'){

	if($cn->query("update job_post set status='reject' where jobpost_id='$jobpost_id'"))
	{
		echo'<script>
			alert("Jobpost rejected successfully");
			window.location.href="jobpost_approvereject.php";
		</script>';
	}
}

?>