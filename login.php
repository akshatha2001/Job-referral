<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login Page</title>
  <script src="sweetalert.js"></script>
	<style>
		body {
   background-image: url("campus-hiring.png");

  /* Full height */
  
  background-size: 1550px 750px;
  background-repeat: no-repeat;
  
}
.div1{
	 
	  margin-top: 100px;
  margin-bottom: 40px;
  margin-right: 90px;
  margin-left: 520px;
	border: 5px outset #696969;
  text-align: center;
  width:400px;
  height:450px;
  border-radius: 12px;
    }
.myclass {
    height: 40px;
    position: relative;
    border: 2px solid #cdcdcd;
    background-color: rgba(255,255,255,0.17);
   
    font-size: 14px;
     border-radius: 5px;
     width: 270px;
     font-size: 20px;
     font-weight: 800px;
     font-family: sans-serif;
     color: #fff;
}
.btn{
	 position: absolute;
  left: 815px;
  top: 415px;
  font-size: 23px;
  border-radius: 12px;
  padding: 10px;

}
  .third, .btn3, .btn4 ,.btn5{
  border-color: #3498db;
  color: #fff;
  transition: all 150ms ease-in-out;
  background: transparent;
  padding-left: 15px;
  padding-right: 15px;
}
.third:hover, .btn3:hover{
  box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
}
.btn4:hover,.btn5:hover{
  color: red;
}
.btn2{
	 position: absolute;
  left: 30px;
  top: 30px;
  font-size: 20px;
  border-radius: 10px;
  border-color: #3498db;
  color: #fff;
  transition: all 150ms ease-in-out;
  background: transparent;
  padding: 10px;
  padding-left: 17px;
  padding-right: 17px;
 
}
.btn4{
   position: absolute;
  left: 620px;
  top: 365px;
  font-size: 16px;
  border-radius: 8px;
   background: transparent;
    padding-top: 10px;
   padding-bottom: 10px; 
}
.btn5{
   position: absolute;
  left: 550px;
  top: 480px;
  font-size: 18px;
  border-radius: 8px;
   background: transparent;
    padding-top: 10px;
   padding-bottom: 10px; 
}
.btn4:active, .btn5:active, .btn:active, .btn2:active, .btn3:active{
  
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.icon {
  padding: 10px;
  color: #fff;
  min-width: 30px;
  text-align: left;
  margin-left: 1px;

}
.btn2:hover{
     box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
}
h1{
  padding-top: 20px;
  color: #fff;
  font-size: 40px;

}
label{
  color: white;
  font-size: 25px;
  letter-spacing: 1px;
  text-align: left;
  padding-right: 15px;
}
.drop{
  position: absolute;
  padding-left: 40px;
  padding-top: 10px;

}
.drop select{
  background-color: rgba(255,255,255,0.17);
  font-size: 17px;
  color: white;
  padding: 5px;
  font-weight: 600px;

}
.drop option{
  color: white;
  background-color: rgb(70,70,70);

}
.l1{
  color: red;
  font-size: 20px;
}
</style>
</head>
<body>
	<div class="div1">
		<form  action="" method="POST">
	<h1>LOGIN &nbsp;HERE</h1><br>
	<i class="fa fa-user icon icon-4x"></i>
	<input type=text class="myclass" name=username  placeholder="Username"  required><br><br>
  <i class="fa fa-key icon"></i>
	<input type=password class="myclass" name=password  placeholder="Password" required><br><label>
 <span id="error" style="color:red;"></span>
<?php
session_start();
include('connection.php');
  if(isset($_POST['submit'])) 
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    if($type=='placement_officer')
    {
      
      if($username=='admin'&&$password=='admin')
      {
        /*echo"<script>Swal.fire({ 
                      icon: 'success',
                      title: 'successful login',
                      showConfirmButton: false,
                      timer: 1000
                    }).then((result) => { window.location.href='admin_interface.html' })</script>";*/
       echo'<script>window.location.href="admin_interface.php";</script>';
            
     }
      else
      {
        echo"<script>
        document.getElementById('error').innerHTML='Invalid username/password';
       </script>";  
      }
    }
    else if($type=='alumni')
    {
        $qry="select * from alumni where username='$username' and password='$password'";
        $rslt=$cn->query($qry);
        if($rslt->num_rows==0)
        {
         echo"<script>
        document.getElementById('error').innerHTML='Invalid username/password';
       </script>"; 
         }
        else
        {
          $r=$rslt->fetch_assoc();
          if($r['status']=='approve'){
            $_SESSION['email']=$r['email'];
            /*echo"<script>Swal.fire({ 
                      icon: 'success',
                      title: 'successful login',
                      showConfirmButton: false,
                      timer: 1000
                    }).then((result) => { window.location.href='staffinterface.php?staff_id=".$staff_id."' })</script>";*/
         echo'<script>window.location.href="alumni_interface.php";</script>';

          }
          else if($r['status']=='pending'){
            echo'<script>alert("pending");</script>';
          }
          else
          {
            echo'<script>alert("rejected");</script>';
          }
          
        }
        

    }
    else
    {
      $qry="select * from student where username='$username' and password='$password'";
      $rslt=$cn->query($qry);
      if($rslt->num_rows==0)
      {
       echo"<script>
        document.getElementById('error').innerHTML='Invalid username/password';
       </script>"; 
       }
      else
      {
          $r1=$rslt->fetch_assoc();
          if($r1['status']=='approve'){
            $_SESSION['email']=$r1['email'];
            /*echo"<script>Swal.fire({ 
                      icon: 'success',
                      title: 'successful login',
                      showConfirmButton: false,
                      timer: 1000
                    }).then((result) => { window.location.href='staffinterface.php?staff_id=".$staff_id."' })</script>";*/
         echo'<script>window.location.href="student_interface.php";</script>';

          }
          else if($r1['status']=='pending'){
            echo'<script>alert("pending");</script>';
          }
          else
          {
            echo'<script>alert("rejected");</script>';
          }
      }
    }
  }
  ?><br><br>
  <div class="drop"> <label>Type</label>
  <select name="type">
    <option value="placement_officer">Placement officer</option>
    <option value="alumni">Alumni</option>
    <option value="student">Student</option>
  </select></div>
  <br>
	<input type=submit name="submit" class="btn third" value="LOGIN">
	</form>
	
  <a href="sendotp.php" class="btn4">FORGOT PASSWORD</a>
  <a href="registration.php" class="btn5">Don't have account register here</a>

</div>

</body>
</html>
