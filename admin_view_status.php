<?php
include('admin_interface.php');
include('connection.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#status').addClass('active');
			});
		});
	</script>";
	$res=$cn->query("select * from status");
$count=0;
while($row=$res->fetch_assoc()){
$name='status'.$count;
$count=$count+1;
$result=$cn->query("select * from student where email='$row[email]'");
$r1=$result->fetch_assoc();
$result2=$cn->query("select * from job_post where jobpost_id='$row[jobpost_id]'");
$r2=$result2->fetch_assoc();
echo'<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
	<div class="row">
	<div class="col">
	Student name
	</div>
	<div class="col">
	:'.$r1['name'].'
	</div>
	</div>
	<div class="row">
	<div class="col">
	Email
	</div>
	<div class="col">
	:'.$row['email'].'
	</div>
	</div>
	<div class="row">
	<div class="col">
	Job Title
	</div>
	<div class="col">
	:'.$r2['title'].'
	</div>
	</div>';
	$sql=$cn->query("select * from status where email='$row[email]' and jobpost_id='$row[jobpost_id]'");
	$row1=$sql->fetch_assoc();
	
		echo"<br><div class='progress border' style='height:20px;'>";
if($row1['status']=="selected"){
	echo"
		<div class='progress-bar progress-bar-striped progress-bar-animated bg-success' style='width:100%;'>SELECTED</div>";
}
else if($row1['status']=="rejected")
{
	echo"
	<div class='progress-bar progress-bar-striped progress-bar-animated bg-danger' style='width:100%;'>Rejected</div>";
}
else if($row1['status']==0){
	echo"
	<div class='progress-bar progress-bar-striped progress-bar-animated bg-info' style='width:10%;'>Applied</div>";

}
else
{
	echo"
	<div class='progress-bar progress-bar-striped progress-bar-animated bg-info' style='width:50%;'>50% Completed</div>";

}
echo"
		</div>";
		
	echo'<br>
	<button class="btn btn-primary float-right" data-toggle="modal" data-target="#'.$name.'">View Profile</button><br>
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
			<center><img src="'.$r1['image'].'" class="avatar"  width="200px" height="200px" style="border-radius: 80%;"></center>
			
			

			<div class="row">
				<div class="col"><label>Name</label><input type="text" class="form-control" name="name" value='.$r1['name'].' readonly required></div>
				<div class="col"><label>Email</label><input type="email" class="form-control" name="email" value='.$r1['email'].' readonly></div>
			</div>
			<div class="row">
				<div class="col"><label>Username</label><input type="text" class="form-control" name="username" value='.$r1['username'].' readonly required></div>
				<div class="col"><label>Phone</label><input type="number" class="form-control" min="1111111111" max="9999999999" name="phone" value='.$r1['phone'].' readonly required></div>
			</div>
			<div class="row">
				<div class="col"><label>Address</label><input type="text" class="form-control" name="address" required value='.$r1['address'].' readonly ></div>
				<div class="col"><label>Institute</label><input type="text" class="form-control" name="institute" required value='.$r1['institute'].' readonly ></div>
			</div>
			<div class="row">
				<div class="col"><label>Class</label><input type="text" class="form-control" name="class" required value='.$r1['class'].' readonly></div>
				<div class="col"><label>Register no</label><input type="text" class="form-control" name="regino" required value='.$r1['regi_number'].' readonly></div>
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

</div><br><br>';
}

?>