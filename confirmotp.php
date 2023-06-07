<?php
if(isset($_POST['submit'])){
	session_start();
	$otp=$_SESSION['otp'];
	$email=$_SESSION['email'];
	$_SESSION['email']=$email;
	$type=$_SESSION['type'];
	$_SESSION['type']=$type;
	$cotp=$_POST['otp1'].$_POST['otp2'].$_POST['otp3'].$_POST['otp4'];
	if($otp==$cotp){
		echo"<script>alert('otp verifyed');
		window.location.href='changepassword.php'</script>";
	}
	else
	{
		echo"<script>alert('mismatch otp');</script>";
	}
}

?>
<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap-4.6.2-dist\bootstrap5.css">
  <script src="bootstrap-4.6.2-dist\jQuery.js"></script>
  <script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;margin-top: 100px;">
    <h3 class="text-primary">ENTER OTP SENT TO YOUR EMAIL</h3>
    <form method="POST">
      <div class="form-group">
      	<div class="row">
      		<div class="col">
        <input type="text" class="form-control" name="otp1" autofocus id="first" size="1" onkeyup="movetoNext(this, 'second')" maxlength="1"  />  </div>
       <div class="col"> <input type="text" class="form-control" name="otp2" id="second" size="1" onkeyup="movetoNext(this, 'third')" maxlength="1" /></div>
       <div class="col"> <input type="text" class="form-control" name="otp3" id="third" size="1" onkeyup="movetoNext(this, 'fourth')" maxlength="1" />  </div> 
        <div class="col"><input type="text" class="form-control" name="otp4" id="fourth" size="1" maxlength="1" />  </div></div>
      </div>
      <div class="">
        <input type='submit' name='submit' class='btn btn-primary' value='VERIFY'>
      </div></form>
      <script>
  function movetoNext(current, nextFieldID) {  
      if (current.value.length >= current.maxLength) {  
      document.getElementById(nextFieldID).focus();  
}  
}  
</script>  