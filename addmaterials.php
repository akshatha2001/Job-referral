<?php
include('connection.php');
$file = $_FILES['file']['name'];
$target = "files/".basename($file);
$description=$_POST['description'];
if($cn->query("insert into study_material(description,file) values('$description','$target')"))
{
	move_uploaded_file($_FILES['file']['tmp_name'], $target); 
	echo'<script>alert("file uploaded");
	window.location.href="studymaterial.php";</script>';
	
}
?>