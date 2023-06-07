<?php
include('connection.php');
include('admin_interface.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				
				$('#refer').addClass('active');
				$('#detaile').hide();
				$('#desc').click(function(){
					$('#detaile').toggle(300);
					});
			});
		});
	</script>
	</head>
	<body>
	<center><h3 class='text-warning'>JOB POST forward</h3></center>";
	$rslt=$cn->query("select * from job_post where status='approve' and refer='no'");
	if($rslt->num_rows>0){
		while($r=$rslt->fetch_assoc()){
			echo'

	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
		<button class="btn btn-primary float-right" style="width:100px;" onClick=location.href="forward_students.php?jobpost_id='.$r['jobpost_id'].'">Forward</button>
		<h3 class="text-primary">'.$r['title'].'</h3>
		<h5 class="text-dark">'.$r['company_name'].'</h5><br>
		<b><p>Skills Required: </b>'.$r['skills'].'</p>
		<p><b>Company Website: </b>
		<a href="'.$r['website'].'" target="_blank">'.$r['website'].'</a>
		<p><b>Place: </b>'.$r['place'].'</p>
		<p><b>Package: </b>'.$r['ctc'].'lpa</p>
		<h5 id="desc">Job Description</h5>
			<p id="detaile">&nbsp;&nbsp;&nbsp;'.$r['description'].'</p></div><br><br>
			</div><br><br>';

		}
	}

?>