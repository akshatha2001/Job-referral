<?php
include('connection.php');
include('student_interface.php');
echo"
	<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#apply').addClass('active');
				
			});
		});
	</script>

	
	<center><h3 class='text-warning'>Applications</h3></center>";
	$rslt=$cn->query("select * from job_post where refer='yes'");
	if($rslt->num_rows>0){
		while($r=$rslt->fetch_assoc()){
			echo'

	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
		<h3 class="text-primary">'.$r['title'].'</h3>
		<h5 class="text-dark">'.$r['company_name'].'</h5><br>
		<div class="row"><div class="col"><b><p>Skills Required </b></div><div class="col">:'.$r['skills'].'</p></div></div>
		<div class="row"><div class="col"><p><b>Company Website </b>
		</div><div class="col">:<a href="'.$r['website'].'" target="_blank">'.$r['website'].'</a></div></div>
		<div class="row"><div class="col"><p><b>Place </b></div><div class="col">:'.$r['place'].'</p></div></div>
		<div class="row"><div class="col"><p><b>Package </b></div><div class="col">'.$r['ctc'].'lpa</p></div></div>
			
			<h5 id="desc">Job Description</h5>';
			$res=$cn->query("select * from applications where email='$email' and jobpost_id='$r[jobpost_id]' and status='pending'");
			echo'
			<p id="detaile">&nbsp;&nbsp;&nbsp;'.$r['description'].'</p>
			';
			if(mysqli_num_rows($res)>0){
				echo"<h4 class='text-info float-right'>Applied</h4><br><br>";
			}
			else
			{
				echo'
				<button class="btn btn-primary float-right" style="width:100px;" onClick=location.href="job_apply.php?jobpost_id='.$r['jobpost_id'].'">Apply</button><br><br>';
				
			}

			echo'</div><br><br>';
		}
	}

?>