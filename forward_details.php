<?php
include('admin_interface.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				
				$('#details').addClass('active');
			});
		});
		</script>";
$rs=$cn->query("select * from applications where status='approve' and forward='no'");
echo"<center><h3 class='text-warning'>Forward Details</h3></center>";
while($r=$rs->fetch_assoc()){
	$res=$cn->query("select * from student where email='$r[email]'");
	$row=$res->fetch_assoc();
	$sql=$cn->query("select * from job_post where jobpost_id='$r[jobpost_id]'");
	$r1=$sql->fetch_assoc();
echo "<div class='container' style='box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;'>
<div class='row'>
<div class='col'>
Applicants Name
</div>
<div class='col'>
:$row[name]
</div>
</div>
<div class='row'>
<div class='col'>
Title of job
</div>
<div class='col'>
:$r1[title]
</div>
</div>
<button class='btn btn-primary float-right' onclick=location.href='forward.php?jobpost_id=$r[jobpost_id]&&email=$r[email]'>Forward</button><br><br>
</div>";

}
?>