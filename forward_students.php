<?php
include('connection.php');
$jobpost_id=$_GET['jobpost_id'];
if($cn->query("update job_post set refer='yes' where jobpost_id='$jobpost_id'")){
	echo'<script>alert("Forwarded");
	window.location.href="refer.php";
	</script>';
}
?>