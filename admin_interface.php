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
	<style type="text/css">
		a{

		}
	</style>
	<body>
		<header >
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><b>Job Referral</b></a>&nbsp;&nbsp;

  <!-- Links -->
  <ul class="navbar-nav">
  	<!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Approve/Reject
      </a>
      <div class="dropdown-menu" style="background-color: lightblue;">
        <a class="dropdown-item" id="student" href="student_approvereject.php">Student</a>
        <a class="dropdown-item" id="alumni" href="alumni_approvereject.php">Alumni</a>
        <a class="dropdown-item" id="jobpost" href="jobpost_approvereject.php">Job Post</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="refer" href="refer.php">Refer</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="application" href="applications.php">Applications</a>
    </li>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop1" data-toggle="dropdown">
        Examination
      </a>
      <div class="dropdown-menu" style="background-color: lightblue;">
        <a class="dropdown-item" id="study" href="studymaterial.php">Study Material</a>
        <a class="dropdown-item" id="mock" href="mocktest.php">Mock test</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="forward_details.php" id="details">Forward Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="status" href="admin_view_status.php">View Status</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Logout</a>
    </li>
    
  </ul>
</nav></header>
<br>
  

		
	</body>
</html>
<?php
include('connection.php');

?>