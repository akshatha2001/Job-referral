<?php
include('student_interface.php');
$rslt=$cn->query("select * from student where email='$email'");
$r1=$rslt->fetch_assoc();
echo'
<body>
	<form method="POST" action="update_profile.php?from=student" enctype="multipart/form-data">
					<div class="container" style="width: 70%; background-color: lightcyan;border-radius: 20px; padding:10px;">
		<div class="form-group">
			<center><img src="'.$r1['image'].'" class="avatar"  width="200px" height="200px" style="border-radius: 80%;"></center>
			<center><input type="file" name="file" accept="image/*"><br><p style="color:green;" >Upload image</p></center>
			

			<div class="row">
				<div class="col"><label>Name</label><input type="text" class="form-control" name="name" value='.$r1['name'].' required></div>
				<div class="col"><label>Email</label><input type="email" class="form-control" name="email" value='.$r1['email'].' readonly></div>
			</div>
			<div class="row">
				<div class="col"><label>Username</label><input type="text" class="form-control" name="username" value='.$r1['username'].' required></div>
				<div class="col"><label>Phone</label><input type="number" class="form-control" min="1111111111" max="9999999999" name="phone" value='.$r1['phone'].' required></div>
			</div>
			<div class="row">
				<div class="col"><label>Address</label><input type="text" class="form-control" name="address" required value='.$r1['address'].' ></div>
				<div class="col"><label>Institute</label><input type="text" class="form-control" name="institute" required value='.$r1['institute'].' ></div>
			</div>
			<div class="row">
				<div class="col"><label>Class</label><input type="text" class="form-control" name="class" required value='.$r1['class'].' ></div>
				<div class="col"><label>Register no</label><input type="text" class="form-control" name="regino" required value='.$r1['regi_number'].'></div>
			</div>
			<br><button class="btn btn-primary float-right">Save Changes</button><br>
		</div>
		</div>
	</form>';
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#stud_profile').addClass('active');
			});
		});
	</script>
	</body>