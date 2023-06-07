<?php
include('alumni_interface.php');
include('connection.php');
$type=$_POST['type'];
$jobpost_id=$_GET['jobpost_id'];
$email=$_GET['email'];
if($cn->query("update status set status='$type' where jobpost_id='$jobpost_id' and email='$email'")){
	echo"<script>alert('Updated');
	window.location.href='view_status.php';</script>";
}

?>