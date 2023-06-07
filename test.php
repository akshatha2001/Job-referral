<?php
include('connection.php');
echo'<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
  <script src="bootstrap-4.6.2-dist\jQuery.js"></script>
  <script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>	';
session_start();
$email=$_SESSION['email'];
$_SESSION['email']=$email;
$test_id=$_GET['id'];
$quest=1;
$res=$cn->query("select * from test where t_id='$test_id'");
$r=$res->fetch_assoc();
$questions=$r['questions'];
$question=explode("-", $questions);
$start=$question[0];
$end=$question[1];
$resu=$cn->query("select * from student where email='$email'");
$row2=$resu->fetch_assoc();

echo"<div class='bg-primary' style='height:70px;background-color:;'>
<h4 class='text-dark float-right'>$row2[name]</h4>
</div><br>";
echo"<form method='POST'>";
for($i=$start;$i<=$end;$i++){
	$result=$cn->query("select * from questions where q_id='$i'");
	$row=$result->fetch_assoc();
	$name="ans".$i;
	echo"<div style='padding-left:40px;'><h5>Q.$quest $row[question]</h5>
	
	<div class='row'><div class='col'><input type='radio' name='$name' value='a'><lable for='$name'>$row[option_a]</lable></div>
	<div class='col'><input type='radio' name='$name' value='b'>$row[option_b]</div></div>
	<div class='row'><div class='col'><input type='radio' name='$name' value='c'>$row[option_c]</div>
	<div class='col'><input type='radio' name='$name' value='d'>$row[option_d]</div></div><br><br></div>";

$quest=$quest+1;
}
echo"<div style='padding-left:40px;'><input type='submit' class='btn btn-primary'  name='submit' value='submit'></div></from>";
if(isset($_POST['submit'])){
	$corr=0;
	$count=0;
	for($i=$start;$i<=$end;$i++){
		$count=$count+1;
		$name="ans".$i;
		if(isset($_POST[$name])){
			$answer=$_POST[$name];
		}
		else
		{
			$answer="none";
		}
		$res=$cn->query("select * from questions where q_id='$i'");
		$r=$res->fetch_assoc();
		if($answer==$r[answer]){
			$corr=$corr+1;
		}
	}
	$per=($corr*100)/$count;
	$per=round($per,2);
	if($cn->query("insert into result values('$test_id','$email','$count','$corr','$per')")){
		echo"<script>window.location.href='exam.php';</script>";
		
	}
}
?>