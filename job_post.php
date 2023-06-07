<?php
include('alumni_interface.php');

?>
<body>
	<div class="container">
		<h3 class="text-primary">Please Enter the details</h3>
	<form method="POST" action="post_add.php">
		<div class="form-group">
			<label>Company Name</label><input type="text" name="company" class="form-control" required>
			<label>Job Description</label><input type="text" name="description" class="form-control" required>
			<label>Job Title</label><input type="text" name="title" class="form-control" required>
			<label>Skills Required</label><input type="text" name="skills" class="form-control" required>
			<label>Company website</label><input type="text" name="website" class="form-control" required>
			<label>Place</label><input type="text" name="place" class="form-control" required>
			<label>CTC(Enter in lakh)</label><input type="number" name="ctc" class="form-control" placeholder="Ex: 2" required><br>
			<button class="btn btn-primary float-right">Submit</button>
		</div>
	</form>
</div>
<script type="text/javascript">
		$(document).ready(function(){
			$(function(){
				//$('#navbardrop').addClass('active');
				$('#post').addClass('active');
			});
		});
	</script>