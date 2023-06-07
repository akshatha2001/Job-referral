<html>
<head>
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php
include('connection.php');
include('admin_interface.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				$('#navbardrop').addClass('active');
				$('#jobpost').addClass('active');
				
			});
		});

	</script>
	</head>
<body>
	<center><h3 class='text-warning'>JOB POST APPROVE/REJECT</h3></center>";
	$rslt=$cn->query("select * from job_post where status='pending'");
	if($rslt->num_rows>0){
		while($r=$rslt->fetch_assoc()){
			echo'

	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
		<h3 class="text-primary">'.$r['title'].'</h3>
		<h5 class="text-dark">'.$r['company_name'].'</h5><br>
		<div class="row"><div class="col"><b><p>Skills Required </b></div><div class="col">:'.$r['skills'].'</p></div></div>
		<div class="row"><div class="col"><p><b>Company Website: </b></div><div class="col">
		<a href="'.$r['website'].'" target="_blank">'.$r['website'].'</a></div></div>
		<div class="row"><div class="col"><p><b>Place </b></div><div class="col">:'.$r['place'].'</p></div></div>
		<div class="row"><div class="col"><p><b>Package </div><div class="col">:</b>'.$r['ctc'].'lpa</p></div></div>
			<center><button class="btn btn-primary" style="width:100px;" onClick=location.href="jobpostapprove_reject.php?jobpost_id='.$r['jobpost_id'].'&&status=approve">Approve</button>&nbsp;<button class="btn btn-Danger"style="width:100px;" onClick=location.href="jobpostapprove_reject.php?jobpost_id='.$r['jobpost_id'].'&&status=reject">Reject</button></center>
			<h5 id="desc"><b>Job Description</b></h5>
			<p id="detaile">&nbsp;&nbsp;&nbsp;'.$r['description'].'</p></div><br><br>
			';


		}
	}
?>
	
</body>
</html>