<?php
include('connection.php');
include('admin_interface.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#application').addClass('active');
			});
		});
	</script>
	</head>";
	$rs=$cn->query("select * from applications where status='pending'");
	$count=0;
	while($r=$rs->fetch_assoc()){
		$name="name".$count;
		$count=$count+1;
		$jobpost_id=$r['jobpost_id'];
		$email=$r['email'];
		$rs1=$cn->query("select * from job_post where jobpost_id='$jobpost_id'");
		$rs2=$cn->query("select * from student where email='$email'");
		$r1=$rs1->fetch_assoc();
		$r2=$rs2->fetch_assoc();

		echo'<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
		<h3 class="text-primary">'.$r1['title'].'</h3>
		<h5 class="text-dark">'.$r1['company_name'].'</h5><br>
		<div class="row"><div class="col"><b><p>Skills Required </b></div><div class="col">:'.$r1['skills'].'</p></div></div>
		<div class="row"><div class="col"><p><b>Company Website: </b></div><div class="col">
		<a href="'.$r1['website'].'" target="_blank">'.$r1['website'].'</a></div></div>
		<div class="row"><div class="col"><p><b>Place </b></div><div class="col">:'.$r1['place'].'</p></div></div>
		<div class="row"><div class="col"><p><b>Package </div><div class="col">:</b>'.$r1['ctc'].'lpa</p></div></div>

		<div><p class="text-success float-right" style="font-size:20px;">Applied by <b>'.$r2['name'].'</b></p><button class="btn btn-info" data-toggle="modal" data-target="#'.$name.'">View Details</button></div><br>
			<center><button class="btn btn-primary" style="width:100px;" onClick=location.href="applicationapprove_reject.php?jobpost_id='.$r['jobpost_id'].'&&status=approve&&email='.$email.'">Approve</button>&nbsp;<button class="btn btn-Danger"style="width:100px;" onClick=location.href="applicationapprove_reject.php?jobpost_id='.$r['jobpost_id'].'&&status=reject&&email='.$email.'">Reject</button></center>
			<b><h5 id="desc">Job Description</h5></b>
			<p id="detaile">&nbsp;&nbsp;&nbsp;'.$r1['description'].'</p></div><br><br>
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
			<center><img src="'.$r2['image'].'" class="avatar"  width="200px" height="200px" style="border-radius: 80%;"></center>
			
			

			<div class="row">
				<div class="col"><label>Name</label><input type="text" class="form-control" name="name" value='.$r2['name'].' readonly required></div>
				<div class="col"><label>Email</label><input type="email" class="form-control" name="email" value='.$r2['email'].' readonly></div>
			</div>
			<div class="row">
				<div class="col"><label>Username</label><input type="text" class="form-control" name="username" value='.$r2['username'].' readonly required></div>
				<div class="col"><label>Phone</label><input type="number" class="form-control" min="1111111111" max="9999999999" name="phone" value='.$r2['phone'].' readonly required></div>
			</div>
			<div class="row">
				<div class="col"><label>Address</label><input type="text" class="form-control" name="address" required value='.$r2['address'].' readonly ></div>
				<div class="col"><label>Institute</label><input type="text" class="form-control" name="institute" required value='.$r2['institute'].' readonly ></div>
			</div>
			<div class="row">
				<div class="col"><label>Class</label><input type="text" class="form-control" name="class" required value='.$r2['class'].' readonly></div>
				<div class="col"><label>Register no</label><input type="text" class="form-control" name="regino" required value='.$r2['regi_number'].' readonly></div>
			</div>
			<br>
		</div>
		</div>
	</form><br>
	<h3> Results</h3>';

	$sresult=$cn->query("select * from result where email='$email'");
if($sresult->num_rows>0){
while($r=$sresult->fetch_assoc()){
echo'
	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
	<div class="row">
	<div class="col">
		Test ID
	</div>
	<div class="col">
		:Test'.$r['t_id'].'
	</div>
	</div>
	<div class="row">
	<div class="col">
		Total Questions
	</div>
	<div class="col">
		:'.$r['total_qsn'].'
	</div>
	</div>
	<div class="row">
	<div class="col">
		Correct Answer
	</div>
	<div class="col">
		:'.$r['crr_ans'].'
	</div>
	</div><br><br>
	<div class="progress" style="height:30px;">

    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:'.$r['percentage'].'%">'.$r['percentage'].'%</div>
  </div>
	</div><br><br>

';
}
}
else
{
	echo"<p>There is no results</p><br><br>";

}echo'
	<button class="btn btn-danger float-right" data-dismiss="modal">Close</button>
		</div>
		</div>
		</div>
		</div><br><br>';
	}


	
?>