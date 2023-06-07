<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap5.css">
  <script src="bootstrap-4.6.2-dist\jQuery.js"></script>
  <script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>	
	<title></title>
</head>
<body>
	<div class="container" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;border-radius:10px;font-size:20px;width:600px;padding:20px;margin-top: 100px;">
		<form method="POST" action="otp.php">
			<div class="form-group">
				<label>Email</label>
				<input type="email" placeholder="enter the emil" name="email" class="form-control" required><br>
				<label>Type</label>
				<select class="form-select" name="type">
					<option value="alumni">Alumni</option>
					<option value="student">Student</option>
				</select><br>
				<input type="submit" class="btn btn-primary" vlaue="Send OTP" name="submit"><br>
				<a href="login.php" style="font-size: 20px;">Login</a><br>
			</div>
		</form>
	</div>
</body>
</html>