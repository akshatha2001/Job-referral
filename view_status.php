<?php
include('alumni_interface.php');
include('connection.php');
echo"
	<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#status').addClass('active');
			});
		});
	</script>
";
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
	<button class="btn btn-primary float-right" data-toggle="modal" data-target="#'.$name.'">Edit</button><br>
	<div class="modal" id="'.$name.'">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button class="close" data-dismiss="modal">&times;</button>
	</div>
	<div class="modal-body">
	Status
	<form method="POST" action="status_update.php?email='.$row['email'].'&&jobpost_id='.$row['jobpost_id'].'">
	<div class="form-group">
	
	<select class="form-select" aria-label="Default select example" name="type">
		<option value="0">Applied</option>
          <option value="1">50% Completed</option>
          <option value="selected">Selected</option>
          <option value="rejected">Rejected</option>
	</select>
	</div>
	
	<button class="btn btn-primary">Submit</button>
	<button class="btn btn-danger" data-dismiss="modal">Cancel</button></form>
	</div>
	</div>
	</div>
	</div>

</div><br><br>';
}
?>