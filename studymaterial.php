<?php
include('connection.php');
include('admin_interface.php');
echo"<script>
		$(document).ready(function(){
			$(function(){
				$('#navbardrop1').addClass('active');
				$('#study').addClass('active');
			});
		});
	</script>
	</head><body>";


	echo'
<div class="container" style="background-color: lightskyblue;padding: 30px;width: 65%;border-radius: 20px;">
	<form method="POST" action="addmaterials.php" enctype="multipart/form-data">
		<div class="form-group">
			<label>Upload files</label>
			<input type="file" class="form-control" name="file" required><br>
			<label>Description</label>
			<textarea class="form-control" name="description" required></textarea><br><br>
			<button class="btn btn-primary float-right" name="submit" style="width: 200px;">Submit</button>
		</div>
	</form>
</div>
';
?>

