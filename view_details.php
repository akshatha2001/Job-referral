<?php
include('alumni_interface.php');
include('connection.php');
echo"
	<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#details').addClass('active');
			});
		});
	</script>
";
$result=$cn->query("select * from applications where forward='yes'");
$count=0;
while($r=$result->fetch_assoc()){
	$name="name".$count;
	$count=$count+1;
	$res=$cn->query("select * from student where email='$r[email]'");
	$row=$res->fetch_assoc();
	$sql=$cn->query("select * from job_post where jobpost_id='$r[jobpost_id]'");
	$row1=$sql->fetch_assoc();
		echo'
	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
		<div class="row">
		<div class="col">
		Name
		</div>
		<div class="col">
		:'.$row['name'].'
		</div>
		</div>
		<p class="text-primary float-right">Applied for the job post <b>'.$row1['title'].'</b></p><br>
		<button class="btn btn-primary" data-toggle="modal" data-target="#'.$name.'">View details</button><br>
		<div class="modal fade" id='.$name.'>
		<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
		<h4>Student Profile</h4>
		<button class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
		<form method="POST" action="update_profile.php?from=student" enctype="multipart/form-data">
					<div class="container" style="width: 70%; background-color: lightcyan;border-radius: 20px; padding:10px;">
		<div class="form-group">
			<center><img src="'.$row['image'].'" class="avatar"  width="200px" height="200px" style="border-radius: 80%;"></center>
			
			

			<div class="row">
				<div class="col"><label>Name</label><input type="text" class="form-control" name="name" value='.$row['name'].' readonly required></div>
				<div class="col"><label>Email</label><input type="email" class="form-control" name="email" value='.$row['email'].' readonly></div>
			</div>
			<div class="row">
				<div class="col"><label>Username</label><input type="text" class="form-control" name="username" value='.$row['username'].' readonly required></div>
				<div class="col"><label>Phone</label><input type="number" class="form-control" min="1111111111" max="9999999999" name="phone" value='.$row['phone'].' readonly required></div>
			</div>
			<div class="row">
				<div class="col"><label>Address</label><input type="text" class="form-control" name="address" required value='.$row['address'].' readonly ></div>
				<div class="col"><label>Institute</label><input type="text" class="form-control" name="institute" required value='.$row['institute'].' readonly ></div>
			</div>
			<div class="row">
				<div class="col"><label>Class</label><input type="text" class="form-control" name="class" required value='.$row['class'].' readonly></div>
				<div class="col"><label>Register no</label><input type="text" class="form-control" name="regino" required value='.$row['regi_number'].' readonly></div>
			</div>
			<br>
		</div>
		</div>
	</form>
	<button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
		</div>
		</div>
		</div>
		</div>
	</div><br><br>
		';
}
?>