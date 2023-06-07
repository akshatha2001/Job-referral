<?php
include('connection.php');
if(isset($_POST['submit'])){
	$otp;
	$email=$_POST['email'];
	$type=$_POST['type'];
	session_start();
	if($type=="alumni"){
		$res=$cn->query("select * from alumni where email='$email'");
		if($res->num_rows>0){
			$otp=rand(1111,9999);
			$_SESSION['otp']=$otp;
			$_SESSION['email']=$email;
			$_SESSION['type']=$type;

		}
		else
		{
			echo"<script>alert('Invalid email');
			location.href='sendotp.php';</script>";
		}
	}
	else
	{
		$res=$cn->query("select * from student where email='$email'");
		if($res->num_rows>0){
			$otp=rand(1111,9999);
			$_SESSION['otp']=$otp;
			$_SESSION['email']=$email;
			$_SESSION['type']=$type;
		}
		else
		{
			echo"<script>alert('Invalid email');
			location.href='sendotp.php';</script>";
		}
	}
	if(isset($otp)){
		
		$data1 = array(
    "sender" => array("name" => "Job Referral", "email" => "jobreferral3s@gmail.com"),
    "to" => array(array("email" => "$email")),
    "subject" => "Forgot password!!!",
    "htmlContent" => "<p>Your one time password is <b>$otp</b></p>"
);


$jsonData = json_encode($data1);


$url = 'https://api.sendinblue.com/v3/smtp/email';


$apiKey = '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';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'api-key: ' . $apiKey,
    'Content-Type: application/json'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);


if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo '<script>alert("Email sent successfully!");
    window.location.href="confirmotp.php"</script>';
}


curl_close($ch);
	}
}
?>