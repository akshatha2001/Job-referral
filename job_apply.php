<?php
include('connection.php');
include('student_interface.php');
$id=$_GET['jobpost_id'];
$re=$cn->query("insert into applications(`email`, `jobpost_id`, `status`,forward) values('$email','$id','pending','no')");
echo"<script>window.location.href='apply.php';</script>";

?>