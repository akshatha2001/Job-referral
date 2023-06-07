<?php
include('student_interface.php');
include('connection.php');
echo"
	<script>
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#result').addClass('active');
			});
		});
	</script>
";
$res=$cn->query("select * from result where email='$email'");
if($res->num_rows>0){
while($r=$res->fetch_assoc()){
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
	echo"<p>There is no results</p>";

}
?>
