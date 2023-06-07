<?php
include('connection.php');
$res=$cn->query("SELECT q_id as q_id FROM questions ORDER BY q_id DESC LIMIT 1");
$r=$res->fetch_assoc();
$first=$_POST['first'];
$questions=$first.'-'.$r[q_id];
$dat=$_POST['dat'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$r=$cn->query("insert into test(`questions`, `date`, `start_time`, `end_time`) values('$questions','$dat','$start_time','$end_time')");

$sql=$cn->query("select * from student");
$sql1=$cn->query("SELECT t_id as t_id FROM test ORDER BY t_id DESC LIMIT 1");
$r1=$sql1->fetch_assoc();
while($row=$sql->fetch_assoc()){
	$result=$cn->query("insert into notification values('.$row[email].','.$r1[t_id].')");
}
?>