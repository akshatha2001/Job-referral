<html>
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
  <script src="bootstrap-4.6.2-dist\jQuery.js"></script>
  <script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>	
	</head>
	<script type="text/javascript">
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				//$('#student').addClass('active');
			});
		});
	</script>
	<body>
		<?php
include('connection.php');
session_start();
if(isset($_SESSION['email'])){
$email=$_SESSION['email'];
$_SESSION['email']=$email;
$r=$cn->query("select * from student where email='$email'");
$r1=$r->fetch_assoc();
$name=$r1['name'];

echo'
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><b>Job Referral</b></a>&nbsp;&nbsp;

  <!-- Links -->
  <ul class="navbar-nav">
  	<li class="nav-item">
      <a class="nav-link" id="stud_profile" href="student_profile.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="apply" href="apply.php">Apply</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="exam" href="exam.php">Examination</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="result" href="result.php">View Result</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="noti" href="notification.php">Notification</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="logout.php">Logout</a>
    </li>
    
  </ul>
  <div class="collapse navbar-collapse justify-content-end"><b>'.$name.'</b></div>
</nav>
<br>
  

		
	</body>
</html>

';
}
?>