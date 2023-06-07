<?php
include('connection.php');
include('admin_interface.php');
echo'
<link href="bootstrap5.css" rel="stylesheet">';
echo"
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js'></script>

<script>
		var first;
		$(document).ready(function(){
			var qty=0;
			var initial=1;
			$(function(){
				$('#navbardrop1').addClass('active');
				$('#mock').addClass('active');
				$('.question').hide();
				$('#disp').hide();
				$('#set_date').hide();
			});
			$('#btn').click(function(){
				qty=$('#no_of').val();
				if(qty==0){
					alert('Please fill the field');
				}
				else
				{
				$('.question').show();
				$('#disp').show();
				$('#no_of_qsn').hide();
				$('#initial').text(initial);
				$('#max').text(qty);
				";
				$res=$cn->query("SELECT q_id as q_id FROM questions ORDER BY q_id DESC LIMIT 1");
				$r=$res->fetch_assoc();
				
				echo"
				first='$r[q_id]';
				first++;
				
			}
				});
			$('#qsn_add').click(function(){

						var question = $('#question').val();
				        var optiona= $('#optiona').val();
				        var optionb= $('#optionb').val();
				        var optionc= $('#optionc').val();
				        var optiond= $('#optiond').val();
				        var answer=$('#ans').val();
				        
				        $.ajax({
				            type: 'POST',
				            url: 'add_question.php',
				            data: {
				                        question: question,
				                        optiona: optiona,
				                        optionb: optionb,
				                        optionc: optionc,
				                        optiond: optiond,
				                        answer: answer,
				                  },
				            
				            success: function(data) {
				                 
				                $('#initial').text(++initial);
				                $('#question').val('');
				                $('#optiona').val('');
				                 $('#optionb').val('');
				                  $('#optionc').val('');
				                   $('#optiond').val('');

				                if(initial>qty){
									$('.question').hide(1000);
									$('#disp').hide(1000);
									$('#set_date').show(1000);
											}				                
				                }
				        });

				
				});
				$('#conform').click(function(){

						var dat=$('#dat').val();
						var start_time=$('#start_time').val();
						var end_time=$('#end_time').val();

				        $.ajax({
				            type: 'POST',
				            url: 'add_test.php',
				            data: {
				            			first:first,
				                        dat:dat,
				                        start_time:start_time,
				                        end_time:end_time,
				                  },
				            
				            success: function(data) {
				                 
				                alert('test added successfully');
				                location.reload();

				                			                
				                }
				        });
				
				});
		});
		
	</script>
	<script>

	</script>
	</head><body>";
echo'
<div id="no_of_qsn">
	<div class="form-group" style="padding-left:100px;">
	<label>Enter the number of questions</label>
	<input type="number" class="form-control" style="width:200px;" min="0" id="no_of" required>
	<br><button id="btn" class="btn btn-primary">Submit</button>
	</div>

</div>
<div id="disp" class="text-primary"><h4 style="padding-left:90px;">Question <span id="initial"></span> of <span id="max"></span></h4></div>
<div class="question">


<div class="container">
		<div class="form-group">
			<label>Question</label>
			<input type="text" class="form-control" id="question" placeholder="Question" autofocus required><br>
			<div class="row">
				<div class="col"><input type="text" class="form-control" id="optiona" placeholder="Option A" required></div>
				<div class="col"><input type="text" class="form-control" id="optionb"  placeholder="Option B" required></div>
			</div><br>
			<div class="row">
				<div class="col"><input type="text" class="form-control" id="optionc" placeholder="Option C" required></div>
				<div class="col"><input type="text" class="form-control" id="optiond" placeholder="Option D" required></div>
			</div><br>
			<div class="row">
			<div class="col">
				<select class="form-select" name="answer" id="ans">
				<option value="a">a</option>
				<option value="b">b</option>
				<option value="c">c</option>
				<option value="d">d</option>
				</select>
			</div>
			<div class="col">
			<button class="btn btn-primary float-right" id="qsn_add">Next</button>
			</div>
			</div>
			
		</div>
	
</div></div>
<div class="container" style="width:500px;" id="set_date">
	<div class="form-group">
		Select date:
		<input type="date" class="form-control" id="dat" required><br>
		Select start time:
		<input type="time" class="form-control" id="start_time" required><br>
		Select end time:
		<input type="time" class="form-control" id="end_time" required><br>
		<input type="button" class="btn btn-primary float-right" id="conform" value="Conform">
	</div>
</div>';

?>