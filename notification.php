<?php
include('student_interface.php');
include('connection.php');
echo"
	<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#noti').addClass('active');
			});
		});
	</script>
	<center><h2 class='text-primary'>Notifications</h2></center>
";

$res=$cn->query("select * from notification where email='$email'");
if($res->num_rows>0){
	while($r=$res->fetch_assoc()){
		$result=$cn->query("select * from test where t_id='$r[t_id]'");
		$row=$result->fetch_assoc();
		echo'<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
			<div class="row">
			<div class="col">
			Test ID
			</div>
			<div class="col">
			:'.$row['t_id'].'
			</div>
			</div>
			<div class="row">
			<div class="col">
			Date
			</div>
			<div class="col">
			:'.$row['date'].'
			</div>
			</div>
			<div class="row">
			<div class="col">
			Start time
			</div>
			<div class="col">
			:'.$row['start_time'].'
			</div>
			</div>
			<div class="row">
			<div class="col">
			End time
			</div>
			<div class="col">
			:'.$row['end_time'].'
			</div>
			</div>
		</div>';

			}

}
?>