<html>
<head>
<?php
include('connection.php');
include('admin_interface.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				$('#navbardrop').addClass('active');
				$('#alumni').addClass('active');
			});
		});
	</script>
	</head>
<body>
	<center><h3 class='text-warning'>ALUMNI APPROVE/REJECT</h3></center>";
	$rslt=$cn->query("select * from alumni where status='pending'");
	if($rslt->num_rows>0){
		while($r=$rslt->fetch_assoc()){
			echo'

	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;">
		<center><table style="font-size: 25px;">
			<tr><td style="padding-right: 100px;padding-bottom: 20px;">Name</td><td>: '.$r['name'].'</td></tr>
			<tr><td>Email</td><td>: '.$r['email'].'</td></tr></table><br><br>
			<center><button class="btn btn-primary" style="width:100px;" onClick=location.href="approve_reject.php?email='.$r['email'].'&&on=alumni&&status=approve">Approve</button>&nbsp;<button class="btn btn-Danger"style="width:100px;" onClick=location.href="approve_reject.php?email='.$r['email'].'&&on=alumni&&status=reject">Reject</button></center>		</center></div><br><br>';

		}
	}
?>
	
</body>
</html>