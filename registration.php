<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap-4.6.2-dist\css\bootstrap.min.css">
  <script src="bootstrap-4.6.2-dist\jQuery.js"></script>
  <script src="bootstrap-4.6.2-dist\js\bootstrap.min.js"></script>	
	<title></title>
	<script type="text/javascript">
		function load(){
			document.getElementById("moda").click();
			document.getElementById("alumni").hidden=true;
			document.getElementById("student").hidden=true;

		}
		function alumniregi(){
			document.getElementById("alumni").hidden=false;

		}
		function stundentregi(){
			document.getElementById("student").hidden=false;
			
		}
		function error(){
			var psw=document.getElementById("psw").value;
			var cpsw=document.getElementById("cpsw").value;
			if(psw!=cpsw){
				document.getElementById("regibtn").disabled=true;
				document.getElementById("error").innerHTML="Password should be match";

				
			}
			else{
				document.getElementById("regibtn").disabled=false;
				document.getElementById("error").innerHTML="";
			}
		}
		function error1(){
			var psw1=document.getElementById("psw1").value;
			var cpsw1=document.getElementById("cpsw1").value;
			if(psw1!=cpsw1){
				document.getElementById("regibtn1").disabled=true;
				document.getElementById("error1").innerHTML="Password should be match";

				
			}
			else{
				document.getElementById("regibtn1").disabled=false;
				document.getElementById("error1").innerHTML="";
			}
		}
	</script>
</head>
<body onload="load();" style="background-color: gray;">
	<a class="nav-link" id="moda" data-toggle="modal" data-target="#register"></a>
        <div class="modal" id="register">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h4 class="modal-text">Registration Page</h4>
        				<button class="close" data-dismiss="modal" onclick="window.location.href='login.php';">&times</button>
        			</div>
        				<div class="modal-body">
        					<form>
        						<div class="form-group">
        							<h3>Rgister as</h3><br>
        							<button class="btn btn-primary btn-block" data-dismiss="modal" onclick="alumniregi();">Alumni</button><br><label class="text-primary" style="padding-left: 45%;font-size: 25px; font-weight: 50px;">OR</label>
        							<br><br>
        							<button class="btn btn-primary btn-block" data-dismiss="modal" onclick="stundentregi();">Student</button>
        						</div>
        					</form>
        				</div>
        		</div>
        	</div>
        </div>
        <div id="alumni">
        	<div class="container" style="background-color:white;border-radius: 10px;width: 40%;padding: 50px;">
        	<form action="alumniregistration.php">
        		<div class="form-group">
        			<h3>Alumni Registration Form</h3><br>
        			<label>Name</label>
        			<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
        			<label>Email</label>
        			<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        			<label>Username</label>
        			<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
        			<label>Password</label>
        			<input type="Password" id="psw" class="form-control" name="password" onkeyup="error();"  placeholder="Enter Password" required>
        			<label>Confirm Password</label>
        			<input type="Password" id="cpsw" class="form-control" onkeyup="error();" placeholder="Re-Enter Password" required>
        			<span id="error" style="color:red;"></span><br></form>
        			<button class="btn btn-primary btn-block" id="regibtn">Register</button><br>
        			<a href="login.php">Already have an account? Login here...</a>
        		</div>
        	
        </div>        </div>
        <div id="student">
        	<div class="container" style="background-color:white;border-radius: 10px;width: 40%;padding: 50px;">
        	<form action="studentregistration.php">
        		<div class="form-group">
        			<h3>Student Registration Form</h3><br>
        			<label>Name</label>
        			<input type="text" class="form-control" placeholder="Enter name" name="name" required>
        			<label>Email</label>
        			<input type="email" class="form-control" placeholder="Enter Email" name="email" required>
        			<label>Username</label>
        			<input type="text" class="form-control" placeholder="Enter Username" name="username" required>
        			<label>Password</label>
        			<input type="Password" id="psw1" class="form-control" onkeyup="error1();" name="password" placeholder="Enter Password" required>
        			<label>Confirm Password</label>
        			<input type="Password" id="cpsw1" class="form-control" onkeyup="error1();" placeholder="Re-Enter Password" required>
        			<span id="error1" style="color:red;"></span><br></form>
        			<button class="btn btn-primary btn-block" id="regibtn1">Register</button><br>
        			<a href="login.php">Already have an account? Login here...</a>
        		</div>
        	
        </div>
        </div>
</body>
</html>