<?php
include('student_interface.php');
include('connection.php');
echo"

	<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#exam').addClass('active');
			});
		});
	</script>

";
$res=$cn->query("select * from test");
while($r1=$res->fetch_assoc())
	{
		date_default_timezone_set('Asia/Kolkata');
		$date=$r1['date'];
		$stime=$r1['start_time'];
		$etime=$r1['end_time'];
		$ptime=date("H:i");
		$today=date("Y-m-d");
		if($date==$today)
		{
			$stim=explode(":", $stime);
			$stime=$stim[0]*60;
			$stime=$stime+$stim[1];
 
			$etim=explode(":", $etime);
			$etime=$etim[0]*60;
			$etime=$etime+$etim[1];

			$ptim=explode(":",$ptime);
			$ptime=$ptim[0]*60;
			$ptime=$ptime+$ptim[1];
			if($stime>$etime)
			{
				$etime=$etime+1440;
			}
			if($ptime>=$stime&&$ptime<=$etime)
			{
					echo"<div class='container' style='box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;'>
						<centr><h3 class='text-primary'>TEST DETAILS</h3></center>
						<p>Date:$r1[date]</p><br>
						<p>Start time:$r1[start_time]</p><br>
						<p>End Time:$r1[end_time]</p><br>
						";
						$result=$cn->query("select * from result where t_id='$r1[t_id]' and email='$email'");
						if($result->num_rows>0){
							echo"<p>Already taken</p>";

						}
						else
						{
							echo'
						<button class="btn btn-info float-right" onClick=location.href="test.php?id='.$r1['t_id'].'">Take Test</button><br>';
						}
						echo'
					</div><br><br>';
			}
		}
	}
?>