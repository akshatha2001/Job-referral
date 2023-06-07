<?php
include('connection.php');
$question=$_POST['question'];
$optiona=$_POST['optiona'];
$optionb=$_POST['optionb'];
$optionc=$_POST['optionc'];
$optiond=$_POST['optiond'];
$answer=$_POST['answer'];
if($cn->query("insert into questions(`question`,`option_a`,`option_b`,`option_c`,`option_d`,answer) values('$question','$optiona','$optionb','$optionc','$optiond','$answer')")){
}

?>