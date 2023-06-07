<?php
include('connection.php');
$jobpost_id=$_GET['jobpost_id'];
$email=$_GET['email'];
if($cn->query("update applications set forward='yes' where jobpost_id='$jobpost_id' and email='$email'")){
	echo'<script>alert("Details forwarded successfully");
	window.location.href="forward_details.php";</script>';
}
?>